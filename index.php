<?php
require ('content/fonctions.php');
include ('config.php');
// include ('include/langue.php');
include ('langues/fr.php');
include ('class/class.php');



$GLOBALS['InfoPage'] = PageTop ($pdo);


require_once 'vendor/autoload.php';
?>

<!DOCTYPE html>

<html lang="fr">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?php echo $InfoPage->titre(); ?></title>
	<meta name="description" content="<?php echo $InfoPage->description; ?>">

	<!-- Bootstrap 4.3.1 -->

	<link href="style/bootstrap/css/bootstrap.perso.css" rel="stylesheet">
	<script src="style/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Font Awesome Free 5.9.0 -->

	<link href="style/fontawesome/css/all.css" rel="stylesheet">

	<!--  style perso -->

	<link href="style/style.css" rel="stylesheet">
	<link rel="icon" type="image/gif" href="img/icon.jpg" />
	
	<!-- Jquery 3.4.1 -->

	<script src="js/jquery-3.4.1.min.js"></script>
	
	<!-- librairie datatables 1.10.18 pour tableaux bootstrap 4 -->
	
	<link href="js/datatables/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  	<script src="js/datatables/datatables/js/jquery.datatables.min.js"></script>
  	<script src="js/datatables/datatables/js/dataTables.bootstrap4.min.js "></script>

  	<!-- Ce script contient l'initialisation du plugin datatables de jquery -->
  	
  	<script src="administration/js/demo/datatables-demo.js"></script>

	<!-- OpenStreetMap et Leaflet 1.5.1 -->
	
	<link rel="stylesheet" href="js/leaflet/leaflet.css">
	<script src="js/leaflet/leaflet.js"></script>
	
	<!-- TinyMCE 5.0.1 -->
	
	<script src="js/tinymce/tinymce.min.js"></script>

	<script>
    	tinymce.init({
        	selector: 'textarea',
            menubar:false,
            language: "fr_FR",
            });
    </script>

</head>

<body>

<div class="container">

	<div class="row">
 					
 		<?php include ('include/pillmenu.inc'); ?>
 		 		
 	</div>

	<div class="row">

		<header class="col-md-12">
 		
 			<?php include('include/header.inc');?>
 						
 		</header>

	</div>

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

		<aside class="col-md-3">
            
        	<?php $InfoPage->AfficherAside($pdo); ?>
            
        </aside>

		<article class="col-md-9">
    	
    		<?php $InfoPage->AfficherContenu($pdo); ?>		
    	
        </article>

	</section>

	<footer class="row">

		<div class="col-md-12 text-center">
    	
    		<?php $InfoPage->AfficherFooter(); ?>
                	        
        </div>

	</footer>

</div>

</body>
</html>