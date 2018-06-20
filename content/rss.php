<?php
require ('fonctions.php');
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
?>

<!doctype html>
<html lang="fr">
<head>

	<meta charset="utf-8">
	
	<title>Flux RSS</title>
	<meta name="description" content=" ">
	
	<link href="../css/bootstrap.css" rel="stylesheet">	
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">	
    
    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>	

</head>
<body>

<div class="container">

 	<div class="row">
 	
 		<header class="col-sm-12">
 		
 			<?php include('../include/header.inc');?>
 		
 		</header>
 		
 	</div>

 	<div class="row" style="margin-top:5px;">
 					
 		<nav class="col-sm-12 navbar navbar-default">
 		
 			<?php include ('../include/pillmenu.inc'); ?>
 		 		
		</nav> 
 		
 	</div>

    <div class="row">

		<div class="col-sm-12">

		<ol class="breadcrumb">
  			<li><a href="index.php?page=blog" title="Accueil"><?php echo HERE;?></a></li>
  			<li><?php echo TITRE_RUB_1; ?></li>
  			<li class="active"><?php echo TITRE_RUB_13; ?></li>
		</ol>

		</div>
        
	</div>
        
    <div class="row">
         
    <aside class="col-sm-3">
        
    	<?php include ('../include/sidebar.inc'); ?>
        
    </aside>
    	
    <section  class="col-sm-9">

	<h3>test RSS</h3>

	<?php

	/* ouverture du fichier */

	if (file_exists ( "rss.xml" )) {
		unlink ( "rss.xml" );
		echo "le fichier a bien été éffacé<br />";
		}

	$fp = fopen ( "rss.xml", 'a' );

	/* creation du code du fichier RSS */

	$rss = '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0">
		    <channel>
        	<title>' . RSS_TITLE . '</title>
        	<description>' . RSS_DESCRIPTION . '</description>
    		<lastBuildDate>' . date ( "r", time () ) . '</lastBuildDate>	
        	<link>' . URL_SITE . '</link>
			';

	$req = $pdo->query ( "SELECT * FROM articles" );

	while ( $row = $req->fetch () ) {
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

	?>
	
       </section>
    </div>

	<div class="row">

	<footer class="col-sm-12 text-center">
        
    	<?php include ('../include/footer.inc'); ?>
        
    </footer>
    
    </div>

</div>

</body>
</html>