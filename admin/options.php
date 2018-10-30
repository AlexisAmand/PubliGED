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
	
	<title><?php echo SITE_TITLE." - ".TITRE_RUB_ADMIN_7; ?></title>
<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>

<div style="witdh: 100%; height: 20px; border: 0px solid black;">
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="index.php"><?php echo ASIDE_ADMIN_4; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php"><?php echo TITRE_RUB_ADMIN_7; ?></a>
		</span>
	</div>

	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc');	?></div>

	<div id="contenu">

<?php

if (isset ( $_POST ['top'] ) and isset ( $_POST ['nrpp'] )) {

	$valeur = "top";

	$stmt = $pdo->prepare ( "UPDATE configuration SET valeur = :valeur WHERE nom=:nom" );

	$stmt->bindParam ( ':nom', $valeur, PDO::PARAM_STR );
	$stmt->bindParam ( ':valeur', $_POST ['top'], PDO::PARAM_STR );
	$stmt->execute ();

	$valeur = "nrpp";

	$stmt->bindParam ( ':nom', $valeur, PDO::PARAM_STR );
	$stmt->bindParam ( ':valeur', $_POST ['nrpp'], PDO::PARAM_STR );
	$stmt->execute ();

	echo "Les options ont bien été enregistrées !.<br />";
}

?>

<h1>Options</h1>

		<form method="POST" action="options.php">


			<fieldset>

				<legend>Généralités</legend>

				<label for=" ">Activer le blog</label> <input type="checkbox" id=" "
					name=" " value=" "> <br /> <label for=" ">Activer le partie
					généalogie</label> <input type="checkbox" id=" " name=" " value=" ">

			</fieldset>


			<fieldset>

				<legend>Partie généalogie</legend>

				<label>Nombre de resultats par pages</label> <input type="text"
					value="12" name="nrpp"> <br /> <label>Valeur des tops</label> <input
					type="text" value="10" name="top">

			</fieldset>

			<fieldset>

				<legend>Partie blog</legend>

				<label for="subscribeNews">Activer les commentaires</label> <input
					type="checkbox" id=" " name=" " value=" ">

			</fieldset>

			<input type="submit">

		</form>

	</div>	
	
<?php include('include/endheader.php');?>