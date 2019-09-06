<?php

/* ---------------------------------------------- */
/* AFFICHAGE DES ARTICLES SOUS LA FORME D'UN BLOG */
/* ---------------------------------------------- */

/* Efface le FLUX RSS s'il existe */

if (file_exists ( "content/rss.xml" ))
{
	unlink ( "content/rss.xml" );
}

/* ouverture du fichier */

$fp = fopen ( "content/rss.xml", 'a' );

/* creation du code du fichier RSS */

$rss = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE xml><rss version="2.0">
<channel>
<title>' . RSS_TITLE . '</title>
<description>' . RSS_DESCRIPTION . '</description>
<lastBuildDate>' . date ( "r", time () ) . '</lastBuildDate>
<link>' . URL_SITE . '</link>
';

$req = $pdo2->query ( "SELECT * FROM articles" );

while ( $row = $req->fetch (PDO::FETCH_ASSOC) )
{
	$rss = $rss . '<item>';
	$rss = $rss . '<title>' . $row ['titre'] . '</title>';
	$rss = $rss . '<description>' . substr ( $row ['article'], 0, 125 ) . '...</description>';
	
	/* transformation de la date SQL en date PHP au format RFC 822 */
	
	$rss = $rss . '<pubDate>' . date ( "r", strtotime ( $row ['date'] ) ) . '</pubDate>';
	$url = URL_SITE . "index.php?page=article&id=" . $row ['ref'];
	$rss = $rss . '<link>' . $url . '</link>';
	$rss = $rss . '</item>';
}

$rss = $rss . "</channel></rss>";

/* enregistrement du code dans le fichier */

fwrite ( $fp, $rss );

$req_intro = "SELECT * FROM articles ORDER BY date DESC";
$resultat = $pdo2->prepare( $req_intro );
$resultat->execute();

/* pagination */

$total = $resultat->rowCount ();
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

$resultat = $pdo2->query ( $req_intro . " LIMIT " . $max . "," . $nrpp );

while ( $data = $resultat->fetch(PDO::FETCH_ASSOC) )
{
	
	$article = new articles();
	$commentaire = new commentaires();
	
	/* ref de l'article */
	
	$article->ref = $data['ref'];
		
	/* Auteur de l'article */
	
	$res_membres = $pdo2->prepare( "select * from membres where id=:id" );
	$res_membres->bindValue ( "id", $data['auteur'], PDO::PARAM_INT );
	$res_membres->execute();
	
	while ( $data_membres = $res_membres->fetch(PDO::FETCH_ASSOC) ) {
		$article->auteur = $data_membres['login'];
	}
	
	/* titre de l'article */
	
	$article->titre = $data['titre'];
	
	/* date de l'article */
	
	if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $data ['date'] )) {
		$article->date = substr ( $data ['date'], 8, 2 ) . " " . MoisEnLettres(substr ( $data ['date'], 5, 2 )) . " " . substr ( $data ['date'], 0, 4 );
	}
	
	/* catégorie de l'article */
	
	$article->categorie = $data['id_cat'];
	
	/* contenu de l'article */
	
	$article->contenu = $data['article'];
	
	/* contenu de l'article */
	
	$article->Afficher($pdo2);
	$commentaire->AfficheLien($article->ref, $pdo2);
		
}

/* pagination */

echo "<ul class='pagination justify-content-center'>";

if ($page == 1)
	{	
	echo "<li class='page-item disabled'><a class='page-link' href='#'>Précédent</a></li>";
	}
else
	{
	$p = $page - 1;
	echo "<li class='page-item'><a class='page-link' href='index?page=blog&p=".$p."'>Précédent</a></li>";
	}

if ($page == $nb_pages)
{
	echo "<li class='page-item disabled'><a class='page-link' href='#'>Suivant</a></li>";
}
else
{
	$p = $page + 1;
	echo "<li class='page-item'><a class='page-link' href='index?page=blog&p=".$p."'>Suivant</a></li>";
}

echo "</ul>";

/* fin pagination */

?>