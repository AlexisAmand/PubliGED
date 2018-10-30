<?php
require ('../content/fonctions.php');
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">
	
	<?php include('include/head.php');?>
	
	<title><?php echo SITE_TITLE." - ".TITRE_RUB_ADMIN_3; ?></title>
<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>

<div style="witdh: 100%; height: 20px; border: 0px solid black;">
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="#"><?php echo ASIDE_ADMIN_2; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="selectgedcom.php"><?php echo TITRE_RUB_ADMIN_3; ?></a>
		</span>
	</div>

	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc');	?></div>

	<div id="contenu">

		<h1><?php echo TITRE_RUB_ADMIN_3; ?></h1>

		<p style='text-align: justify;'>Vous pouvez utiliser ce formulaire
			pour envoyer votre gedcom. Si vous avez d&eacute;jà envoy&eacute; un
			gedcom sur le site, celui-ci sera effac&eacute; et remplacé par le
			nouveau.</p>

		<form method="POST" action="lecture.php" enctype="multipart/form-data">
			<p style="text-align: center;">
				<br> <br> <input type="hidden" name="MAX_FILE_SIZE"
					value="100000000"> Fichier : <input type="file" name="avatar"><br>
				<br> <br> <input type="submit" name="envoyer"
					value="Envoyer le fichier">
			</p>
		</form>

	</div>	

<?php include('include/endheader.php');?>