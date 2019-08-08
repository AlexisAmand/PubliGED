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

while ( $row = $req->fetch () )
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

/* affichage des articles du blog */

if (!isset($_GET['p']))
	{
	$p = 1;
	}
else 
	{
	$p = $_GET['p'];	
	}
	
$x = 3; /* nbre d'articles par page */
$y = 1 + ($p - 1) * $x; /* point de départ */

$req_intro = "SELECT * FROM articles ORDER BY date DESC LIMIT $y, $x";
$resultat = $pdo2->prepare( $req_intro );
$resultat->execute();

while ( $data = $resultat->fetch() )
{
	
	$article = new articles();
	$commentaire = new commentaires();
	
	/* ref de l'article */
	
	$article->ref = $data['ref'];
		
	/* Auteur de l'article */
	
	$res_membres = $pdo2->prepare( "select * from membres where id=:id" );
	$res_membres->bindValue ( "id", $data['auteur'], PDO::PARAM_INT );
	$res_membres->execute();
	
	while ( $data_membres = $res_membres->fetch() ) {
		$article->auteur = $data_membres['login'];
	}
	
	/* titre de l'article */
	
	$article->titre = $data['titre'];
	
	/* date de l'article */
	
	if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $data ['date'] )) {
		$article->date = substr ( $data ['date'], 8, 2 ) . " " . MoisEnLettres(substr ( $data ['date'], 5, 2 )) . " " . substr ( $data ['date'], 0, 4 );
	}
	
	/* catégorie de l'article */
	
	$article->categorie = $data['ref'];
	
	/* contenu de l'article */
	
	$article->contenu = $data['article'];
	
	/* contenu de l'article */
	
	$article->Afficher($pdo2);
	$commentaire->AfficheLien($article->ref, $pdo2);
	
}

?>

<nav aria-label="Page navigation example">
	<ul class="pagination">
	
		<?php if ($p == 1) { echo '<li class="page-item disabled">'; } else { echo '<li class="page-item">'; } ?><a  class="page-link" href="#">Previous</a></li>
		<li class="page-item"><a  class="page-link" href="index.php?page=blog&p=<?php if ($p == 1) { echo $p; } else { echo $p - 1; } ?>">1</a></li>
		<li class="page-item"><a  class="page-link" href="index.php?page=blog&p=<?php if ($p == 1) { echo $p + 1; } else { echo $p; } ?>">2</a></li>
		<li class="page-item"><a  class="page-link" href="index.php?page=blog&p=<?php echo $p + 1; ?>" >3</a></li>
		<?php if ($p == 1) { echo '<li class="page-item disabled">'; } else { echo '<li class="page-item">'; } ?><a  class="page-link" href="#">Next</a></li>

	</ul>
</nav>