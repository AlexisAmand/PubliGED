<?php
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="utf-8">
	
	<?php include('include/head.php');?>
	
	<title><?php echo SITE_TITLE." - Page de contact" ?></title>
<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>

<div style="witdh: 100%; height: 20px; border: 0px solid black;">
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="index.php">lorem ipsum</a>
			<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php">lorem
				ipsum</a>
		</span>
	</div>
	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('../include/sidebar.inc');	?></div>

	<div id="contenu">

		<h1>Historique des versions</h1>


	</div>	

<?php include('include/endheader.php');?>

