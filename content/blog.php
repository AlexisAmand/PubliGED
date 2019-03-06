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
	$url = URL_SITE . "index.php?page=see_comments&id=" . $row ['ref'];
	$rss = $rss . '<link>' . $url . '</link>';
	$rss = $rss . '</item>';
}

$rss = $rss . "</channel></rss>";

/* enregistrement du code dans le fichier */

fwrite ( $fp, $rss );

/* affichage des articles du blog */

$req_intro = "SELECT * FROM articles ORDER BY date DESC";
$resultat = $pdo2->prepare ( $req_intro );
$resultat->execute ();

while ( $data = $resultat->fetch () ) 
	{

	$req_comms = "select * from commentaires where id_article='{$data['ref']}'";
	$res_comms = $pdo2->prepare ( $req_comms );
	$res_comms->execute ();

?>

<div class="row">
	<div class="col-md-12">
		<?php echo "<h3><a href='index.php?page=see_comments&id=".$data['ref']."'>" . html_entity_decode ( $data ['titre'] ) . "</a></h3>"; ?>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		
	<?php

	/* Auteur de l'article */

	echo "<p>" . AUTHOR;

	$res_membres = $pdo2->prepare ( "select * from membres where id=:id" );
	$res_membres->bindValue ( "id", $data ['auteur'], PDO::PARAM_INT );
	$res_membres->execute ();

	while ( $data_membres = $res_membres->fetch () ) {
		echo $data_membres ['login'];
	}
	
	/* Date de l'article */
	
	echo DATE;

	if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $data ['date'] )) {
		echo substr ( $data ['date'], 8, 2 ) . " " . MoisEnLettres(substr ( $data ['date'], 5, 2 )) . " " . substr ( $data ['date'], 0, 4 );
	}

	echo RUBRIC;

	echo "<a href='index.php?page=categories&id=" . $data ['id_cat'] . "'>" . get_category_name ( $pdo2, $data ['id_cat'] ) . "</a>";

	?>

	</div>
	<div class="col-md-2 offset-md-2">
	
	<?php

	/* affichage des boutons d'export : pdf, mail, print */

	echo "<p>";

	echo "<a href='pdf.php?id=" . $data ['ref'] . "'><i class='far fa-file-pdf fa-2x'></i></a>&nbsp;&nbsp;";
	echo "<a href='print.php?id=" . $data ['ref'] . "'><i class='fas fa-print fa-2x'></i></a>&nbsp;&nbsp;";
	echo "<a href='send.php?id=" . $data ['ref'] . "'><i class='fas fa-envelope-square fa-2x'></i></a>&nbsp;&nbsp;";

	echo "</p>";

	?>

	</div>
</div>

<div class="row">
	<div class="col-md-12">
		
	<?php

	/* Contenu de l'article */

	echo $data ['article'];

	echo "<div id='commentaires'><a href='index.php?page=see_comments&id=" . $data ['ref'] . "'>[" . SEECOMS . "] (" . $res_comms->rowCount () . ")</a></div>";
	}

	?>  
	  
	</div>
</div>