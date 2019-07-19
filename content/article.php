<?php

/* --------------------------------------------- */
/* Affichage d'un article et de ses commentaires */
/* --------------------------------------------- */

/* Si un commentaire a été envoyé, on le récupére ici */

if (! empty ( $_POST ['pseudo'] ) and ! empty ( $_POST ['email'] ) /* and !empty($_POST['site']) */ and ! empty ( $_POST ['message'] )) {
	
	$commentaire = new commentaires ();
	
	$commentaire->article = $_GET ['id'];
	$commentaire->nom_auteur = $_POST ['pseudo'];
	$commentaire->email_auteur = $_POST ['email'];
	$commentaire->url_auteur = $_POST ['site'];
	$commentaire->contenu = $_POST ['message'];
	$commentaire->today = date ( "Y-m-d H:i:s" ); // (le format DATETIME de MySQL)
	
	$req = "INSERT INTO commentaires (id_article, nom_auteur, email_auteur, url_auteur, contenu, date_com)
    VALUES (:article, :nom, :email, :url, :contenu, :today)";
	
	$res = $pdo2->prepare ( $req );
	$res->bindparam ( ':article', $commentaire->article, PDO::PARAM_STR );
	$res->bindparam ( ':nom', $commentaire->nom_auteur, PDO::PARAM_STR );
	$res->bindparam ( ':email', $commentaire->email_auteur, PDO::PARAM_STR );
	$res->bindparam ( ':url', $commentaire->url_auteur, PDO::PARAM_STR );
	$res->bindparam ( ':contenu', $commentaire->contenu, PDO::PARAM_STR );
	$res->bindparam ( ':today', $commentaire->today, PDO::PARAM_STR );
	$res->execute ();
}

/* Récupération de l'article */

$article = new articles ();
$commentaire = new commentaires();

$article->ref = $_GET ['id'];

$resultat = $pdo2->query ( "SELECT * FROM articles WHERE ref='$article->ref'" );

while ( $data = $resultat->fetch () )
{
	$article->auteur = $data ['auteur'];
	$article->titre = $data ['titre'];
	$article->date = $data ['date'];
	$article->categorie = $data ['id_cat'];
	$article->contenu = $data ['article'];
}

/* Auteur de l'article */

$res_membres = $pdo2->prepare ( "select * from membres where id=:id" );
$res_membres->bindValue ( "id", $article->auteur, PDO::PARAM_INT );
$res_membres->execute ();

while ( $data_membres = $res_membres->fetch () )
{
	$article->auteur = $data_membres ['login'];
}

/* Date de l'article */

if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $article->date ))
{
	$article->date = substr ( $article->date, 8, 2 ) . " " . MoisEnLettres(substr ( $article->date, 5, 2 )) . " " . substr ( $article->date, 0, 4 );
}

$article->Afficher($pdo2);
$commentaire->AfficheCommentaire($article->ref, $pdo2);

?>