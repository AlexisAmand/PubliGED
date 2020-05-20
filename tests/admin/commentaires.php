<?php
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
include ('fonctions.php')?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">
	
	<?php include('include/head.php');?>
	
	<title>Modérer les commentaires</title>
<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>
		
		
<div style="witdh: 100%; height: 20px; border: 0px solid black;">
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="index.php"><?php echo ASIDE_ADMIN_6; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php"><?php echo TITRE_RUB_ADMIN_12; ?></a>
		</span>
	</div>

	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc');	?></div>

	<div id="contenu">

		<h1><?php echo TITRE_RUB_ADMIN_12; ?></h1>

<?php

$req_comm = "SELECT * FROM commentaires";
$res_comm = $pdo->prepare ( $req_comm );
$res_comm->execute ();

?>        
     
<table id='EveT'>
			<thead>
				<tr>
					<td>#</td>
					<td>date</td>
					<td>auteur</td>
					<td>article</td>
					<td>début du comm'</td>
					<td></td>
			<?php /* un lien permet de voir tout le comm' */ ?>			
		</tr>
			</thead>
			<tbody>   
        
	<?php

	while ( $data_comm = $res_comm->fetch () ) {
		echo "<tr>";
		echo "<td>" . $data_comm ['ref'] . "</td>";
		echo "<td>" . $data_comm ['date_com'] . "</td>";
		echo "<td>" . $data_comm ['nom_auteur'] . "</td>";
		echo "<td>" . RecupTitreArticle ( $pdo, $data_comm ['id_article'] ) . "</td>";
		// echo "<td>" . $data_comm ['id_article'] . "</td>";
		echo "<td>" . $data_comm ['contenu'] . "</td>";

		?>
	  
	  <td>

					<form action="" method="POST">
						<input type="button" value="éditer">
					</form>

					<form action="" method="POST">
						<input type="button" value="supprimer">
					</form>

				</td>
	  
	  <?php echo "</tr>"; } ?>
              
   </tbody>
		</table>

	</div>
		
<?php include('include/endheader.php');?>