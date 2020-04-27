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
	
	<title><?php echo SITE_TITLE." - ".TITRE_RUB_ADMIN_11; ?></title>
<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>
		
		
<div style="witdh: 100%; height: 20px; border: 0px solid black;">
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="index.php"><?php echo ASIDE_ADMIN_4; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php"><?php echo TITRE_RUB_ADMIN_11; ?></a>
		</span>
	</div>

	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc');	?></div>

	<div id="contenu">

		<h1><?php echo TITRE_RUB_ADMIN_11; ?></h1>

<?php

try {
	if (isset ( $_POST ['texte'] )) {
		/*
		 * $valeur_contenu = htmlentities($_POST['texte'], ENT_QUOTES);
		 * $req="UPDATE configuration SET valeur = '$valeur_contenu' WHERE nom = 'textintro'";
		 * $resultat = $pdo->exec($req);
		 *
		 * $valeur_titre = htmlentities($_POST['texte'], ENT_QUOTES);
		 * $req="UPDATE configuration SET valeur = '$valeur_titre' WHERE nom = 'titreintro'";
		 * $resultat = $pdo->exec($req);
		 *
		 * echo "<p style='background-color:#dbff67;'>Votre nouveau texte a bien été enregistré !</p>";
		 */
	}

	echo '<p>Ce formulaire permet de changer le titre et le slogan du site</p>';
	echo "<p>Titre du site <input type='text' name='titre' size='72'></p>";
	echo "<p>Slogan du site <input type='text' name='titre' size='72'></p>";
	echo '<input type="submit" value="Enregistrer" style="margin-top:15px;">';
	echo '</form>';
} catch ( Exception $e ) {
	echo 'Erreur : ', $e->getMessage (), "\n";
}

?>

</div>
		
<?php include('include/endheader.php');?>