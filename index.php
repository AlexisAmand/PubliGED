<?php
require ('content/fonctions.php');
include ('config.php');
include ('include/langue.php');
include ('class/class.php');

// $GLOBALS['InfoPage'] = PageTop($pdo);

$InfoPage = new Pages($pdo);

require_once 'vendor/autoload.php';

?>

<!DOCTYPE html>

<html lang="fr">
<head>

	<?php 
	
	/* récupération du meta description et du title de la page en cours en fonction de ce qui est dans la base de données sinon on met les trucs par défaut */
	
	/*
	 *  - switch pour type de page
	 *  - recherche dans la BD en fonction du type de page 
	 *  - attichage du title et de la meta
	 */
	
	?>
	
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php $InfoPage->AfficherMeta($pdo); ?>

	<?php $InfoPage->AfficherCSS($pdo); ?>
		
	<!-- OpenStreetMap et Leaflet via npm -->
	<link href="node_modules/leaflet/dist/leaflet.css" rel="stylesheet">
	<script src="node_modules/leaflet/dist/leaflet.js"></script>

	<!-- Leaflet basemap -->

	<link href="node_modules/leaflet-basemaps/L.Control.Basemaps.css" rel="stylesheet">
	<script src="node_modules/leaflet-basemaps/L.Control.Basemaps.js"></script>

	<!-- Voir si Fontawesome fonctionne aussi quand il est dans le footer -->
	<link href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

</head>

<body>

<div class="container-lg container-fluid fixed-top">

	<div class="row">

		<div class="col-md-12">
		
			<?php $InfoPage->AfficherPillmenu(); ?>
		
		</div>

	</div>

</div>

<div class="container-lg container-fluid">

	<header class="row" style="background-image: url('https://via.placeholder.com/2560x1560.png');">

		<div class="col-12">

			<?php $InfoPage->AfficherHeader($pdo); ?>
		
		</div>
					
	</header>	

	<div class="row" style="margin-top: 10px;">

		<div class="col-md-12">

			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php?page=blog" title="Accueil"><?php echo HERE;?></a></li>
				<li class="breadcrumb-item"><a href=""><?php echo $InfoPage->rubrique; ?></a></li>
				<li class="breadcrumb-item active"><?php echo $InfoPage->titre; ?></li>
			</ol>

		</div>

	</div>

	<section class="row">
           
        <?php $InfoPage->AfficherAside($pdo); ?>
              	
    	<?php $InfoPage->AfficherContenu($pdo); ?>		
    	
	</section>

	<footer class="row">

    	<?php $InfoPage->AfficherFooter(); ?>
                	        
	</footer>

</div>

	<?php /* TODO: regrouper tous les trucs si dessous dans une méthode de la classe page ? */ ?>

	<!-- Jquery via npm -->
	<script src="node_modules/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap 4.4.1 -->
	<script src="templates/system/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- librairie datatables pour tableaux bootstrap 4 -->
  	<script src="js/datatables/datatables/js/jquery.datatables.min.js"></script>
  	<script src="js/datatables/datatables/js/dataTables.bootstrap4.min.js "></script>

  	<!-- Ce script contient l'initialisation du plugin datatables de jquery-->
 	<script src="administration/js/demo/datatables-demo.js"></script>
  	
	<!-- TinyMCE via npm -->
	<script src="node_modules/tinymce/tinymce.min.js"></script>
	
	<!-- Divers Javascript -->
	<script src="js/scripts.js"></script>

</body>
</html>