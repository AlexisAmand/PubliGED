<?php

/* --------------------------------------------- */
/* Affichage d'un article et de ses commentaires */
/* --------------------------------------------- */

/* Si un commentaire a été envoyé par qqn, on le récupére ici pour le mettre dans la BD */

if (!empty($_POST['pseudo']) and !empty($_POST['email']) /* and !empty($_POST['site']) */ and !empty($_POST['message'])) 
	{
	
	$commentaire = new commentaires ();
	
	$commentaire->article = $_GET['id'];
	$commentaire->nom_auteur = $_POST['pseudo'];
	$commentaire->email_auteur = $_POST['email'];
	$commentaire->url_auteur = $_POST['site'];
	$commentaire->contenu = $_POST['message'];
	$commentaire->today = date( "Y-m-d H:i:s" ); // (le format DATETIME de MySQL)
	
	$sqlCommentaires = "INSERT INTO commentaires (id_article, nom_auteur, email_auteur, url_auteur, contenu, date_com)
    VALUES (:article, :nom, :email, :url, :contenu, :today)";
	
	$reqCommentaires = $pdo2->prepare ($sqlCommentaires);
	$reqCommentaires->bindparam (':article', $commentaire->article, PDO::PARAM_STR);
	$reqCommentaires->bindparam (':nom', $commentaire->nom_auteur, PDO::PARAM_STR);
	$reqCommentaires->bindparam (':email', $commentaire->email_auteur, PDO::PARAM_STR);
	$reqCommentaires->bindparam (':url', $commentaire->url_auteur, PDO::PARAM_STR);
	$reqCommentaires->bindparam (':contenu', $commentaire->contenu, PDO::PARAM_STR);
	$reqCommentaires->bindparam (':today', $commentaire->today, PDO::PARAM_STR);
	$reqCommentaires->execute();
	}
	
/* Récupération de l'article */

$article = new articles ();
$commentaire = new commentaires();

$article->ref = $_GET['id'];

$sqlArticle = $pdo2->query("SELECT * FROM articles WHERE ref='$article->ref'");

/* pagination */

$total = $sqlArticle->rowCount ();
$nrpp = 3; /* TODO : nombre d'articles par page, devra être récupérer via l'admin */

$nb_pages = round($total / $nrpp);

if (isset ( $_GET ['p'] ))
{
	$page = $_GET ['p'];
	if ($page > $nb_pages)
	{
		$page = $nb_pages;
	}
}
else
{
	$page = 1;
}

$max = 	($page - 1 ) * $nrpp;

/* fin pagination */

while ($row = $sqlArticle->fetch(PDO::FETCH_ASSOC))
	{
	$article->auteur = $row['auteur'];
	$article->titre = $row['titre'];
	$article->date = $row['date'];
	$article->categorie = $row['id_cat'];
	$article->contenu = $row['article'];
	}

/* Auteur de l'article */

$sqlAuteur = $pdo2->prepare("select * from membres where id=:id");
$sqlAuteur->bindValue("id", $article->auteur, PDO::PARAM_INT);
$sqlAuteur->execute();

while ($row = $sqlAuteur->fetch(PDO::FETCH_ASSOC))
	{
	$article->auteur = $row['login'];
	}

/* Date de l'article */

if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $article->date ))
	{
	$article->date = substr ( $article->date, 8, 2 ) . " " . MoisEnLettres(substr ( $article->date, 5, 2 )) . " " . substr ( $article->date, 0, 4 );
	}

$article->Afficher($pdo2);
$commentaire->AfficheCommentaire($article->ref, $pdo2);

/* pagination */

echo "<ul class='pagination justify-content-center'>";

echo "<li class='page-item'><a class='page-link' href='".previousArticle($article->ref, $pdo2)."'>Précédent</a></li>";
echo "<li class='page-item'><a class='page-link' href='".nextArticle($article->ref, $pdo2)."'>Suivant</a></li>";

echo "</ul>";

/* fin pagination */

?>