<?php

$article = new articles();

$article->ref = $_GET['id'];

$sqlArticle = $pdo2->query("SELECT * FROM articles WHERE ref='$article->ref'");
$row = $sqlArticle->fetch(PDO::FETCH_ASSOC);
	
$article->auteur = $row['auteur'];
$article->titre = $row['titre'];
$article->date = $row['date'];
$article->categorie = $row['id_cat'];
$article->contenu = $row['article'];
			
/* Auteur de l'article */

$sqlAuteur = $pdo2->prepare("select * from membres where id=:id");
$sqlAuteur->bindValue("id", $article->auteur, PDO::PARAM_INT);
$sqlAuteur->execute();
$row = $sqlAuteur->fetch(PDO::FETCH_ASSOC);

$article->auteur = $row['login'];

/* Date de l'article */

if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $article->date ))
	{
	$article->date = substr ( $article->date, 8, 2 ) . " " . MoisEnLettres(substr ( $article->date, 5, 2 )) . " " . substr ( $article->date, 0, 4 );
	}

$article->Afficher($pdo2);

/* Commentaires de l'article */

$commentaire = new Commentaires();
 
$commentaire->AfficheCommentaire($article->ref, $pdo2);

?>
