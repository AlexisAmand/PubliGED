<?php
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">
	
	<?php include('include/head.php');?>
	
	<title><?php echo SITE_TITLE." - ".TITRE_RUB_ADMIN_2; ?></title>
<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>
			
<div style="witdh: 100%; height: 20px; border: 0px solid black;">
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="#"><?php echo ASIDE_ADMIN_2; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="effacer_gedcom.php"><?php echo TITRE_RUB_ADMIN_2; ?></a>
		</span>
	</div>

	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc'); ?></div>

	<div id="contenu">

		<h1><?php echo TITRE_RUB_ADMIN_2; ?></h1>

		<form action="suppr_gedcom.php" method="post">
			<input type="submit" name="validerdel"
				value="Confirmer la suppression des tables">
		</form>

	</div>

<?php include('include/endheader.php');?>