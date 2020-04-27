<?php
require ('../content/fonctions.php');
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
?>

<?php

if (! empty ( $_POST ['b-aside-1'] )) {

	$sql = "SELECT * FROM modules WHERE type='blog'";
	$req = $pdo->query ( $sql );

	/* mise à jour des positions */

	while ( $row = $req->fetch () ) {
		$temp = $row ['nomdumodule'];
		// echo $temp."<br />";
		// cette requête fonctionne
		// $mod = "UPDATE modules SET position ='".$_POST[$temp]."' WHERE nomdumodule = '".$temp."' AND type='genealogie'";

		$mod = "UPDATE modules SET position ='" . $_POST [$temp] . "' WHERE nomdumodule = '" . $temp . "' AND type='blog'";

		// echo $mod."<br />";
		$res = $pdo->prepare ( $mod );
		$res->execute ();
	}

	/* mise à jour de visible */

	foreach ( $_POST ['visible'] as $valeur ) {
		$mod = "UPDATE modules SET visible ='" . $valeur . "' WHERE nomdumodule = '" . $temp . "' AND type='blog'";
		// echo $mod."<br />";
		$res = $pdo->prepare ( $mod );
		$res->execute ();
	}
}

?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">
	
	<?php include('include/head.php');?>
	
	<title><?php echo SITE_TITLE." - ".TITRE_RUB_ADMIN_5; ?></title>
<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>

<div style="witdh: 100%; height: 20px; border: 0px solid black;">
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="index.php"><?php echo ASIDE_ADMIN_4; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php"><?php echo TITRE_RUB_ADMIN_5; ?></a>
		</span>
	</div>

	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc');	?></div>

	<div id="contenu">

		<h1><?php echo TITRE_RUB_ADMIN_5; ?></h1>

		<form method="POST" action="modules_blog.php">

<?php

$stat = "SELECT * FROM modules WHERE nomdumodule LIKE 'b-aside%'";
$res_stat = $pdo->query ( $stat );

?>

<table id='EveT'>
				<thead>
					<tr>
						<td>Nom du module</td>
						<td>Description</td>
						<td>Position</td>
						<td>Visible</td>
					</tr>
				</thead>
				<tbody> 

<?php

while ( $data = $res_stat->fetch () ) {
	echo "<tr>";
	echo "<td>" . $data ['nomdumodule'] . "</td>";
	echo "<td>" . $data ['description'] . "</td>";

	echo '<td><input type="text" value="' . $data ['position'] . '" name="' . $data ['nomdumodule'] . '"></td>';

	if ($data ['visible'] == 0) {
		/* si non visible - le name de l'input est $data['nomdumodule']."_chk" */
		echo '<td><INPUT type="checkbox" name="visible[]" value="0"></td>';
	} else {
		/* si visible - le name de l'input est $data['nomdumodule']."_chk" */
		echo '<td><INPUT type="checkbox" name="visible[]" value="1" checked></td>';
	}

	echo "</tr>";
}

?> 

</tbody>
			</table>

			<input type='submit' value='Enregistrer'>

		</form>

	</div>
	
<?php include('include/endheader.php');?>