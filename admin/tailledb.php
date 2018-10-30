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
	
	<title><?php echo SITE_TITLE." - ".TITRE_RUB_ADMIN_9; ?></title>
<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>

<div style="witdh: 100%; height: 20px; border: 0px solid black;">
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="index.php"><?php echo ASIDE_ADMIN_3; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php"><?php echo TITRE_RUB_ADMIN_9; ?></a>
		</span>
	</div>
	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc');	?></div>

	<div id="contenu">

		<h1><?php echo TITRE_RUB_ADMIN_9; ?></h1>

<?php

try {

	$stat = "SHOW TABLE STATUS";
	$res_stat = $pdo->query ( $stat );

	echo "<table border='1'>";
	echo "<tr><td>Nom</td><td>Taille (en kio)</td><td>Taille (en octet)</td></tr>";

	while ( $data = $res_stat->fetch () ) {
		echo "<tr>";
		echo "<td>" . $data ['Name'] . "</td>";

		$tailletable = $data ['Data_length'] + $data ['Index_length'];

		// echo "<td>" . round ( $tailletable / 1000, 2 ) . "</td>";

		echo "<td>" . $tailletable . "</td>";

		$temp = $tailletable / 1000 * 1024;
		echo "<td>" . $temp . "</td>";
		echo "</tr>";
	}

	echo "</table>";
} catch ( Exception $e ) {
	echo 'Erreur : ', $e->getMessage (), "\n";
}

?>

</div>
	
<?php include('include/endheader.php');?>