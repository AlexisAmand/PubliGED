<?php 

require ('content/fonctions.php');
include ('config.php');
// include ('include/langue.php');
include ('langues/fr.php');
include ('class/class.php');

$InfoPage = PageTop($pdo); 

?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<title><?php echo $InfoPage->titre(); ?></title>
		<meta name="description" content="<?php echo $InfoPage->description; ?>">
				
		<!-- Bootstrap 4.1.1 -->
		
		<link href="css/bootstrap.publiged.css" rel="stylesheet">	
		<script src="js/bootstrap.min.js"></script>
		
		<!-- Font Awesome Free 5.0.7 -->
		
    	<link href="css/fontawesome-all.css" rel="stylesheet">
    	
    	<!--  style perso -->
    	
    	<link href="css/style.css" rel="stylesheet">	
    	   		
    	<!-- Jquery 3.2.1 -->
    	
    	<script src="js/jquery.min.js"></script>
    			
        <!-- OpenStreetMap et Leaflet 1.3.1 -->
		
        <link rel="stylesheet" href="js/leaflet/leaflet.css">
        <script type="text/javascript" src="js/leaflet/leaflet.js"></script>
        
        <!-- TinyMCE 4.7.13 -->
        
        <script src="js/tinymce/tinymce.min.js"></script>

        <script>
            tinymce.init({
                /* ajouter un tableau dans tinymce */
                /*plugins: "table", */
               
                /* ajouter une image
                plugins: "image", */
                /* par défaut */
                
               
                selector: 'textarea',
                menubar:false,
                language: "fr_FR",
            });
        </script>
		
	</head>
	
<body>

<div class="container">

 	<div class="row">
 		
 		<header class="col-md-12">
 		
 			<?php include('include/header.inc');?>
 						
 		</header>
 		
 	</div>
	
 	<!-- div class="row">

		<div class="col-sm-12" id="bandeau"></div>
        
	</div -->

 	<div class="row">
 					
 			<?php include ('include/pillmenu.inc'); ?>
 		 		
 	</div>
 	
    <div class="row">

		<div class="col-md-12">

		<ol class="breadcrumb">
  			<li class="breadcrumb-item"><a href="index.php?page=blog" title="Accueil"><?php echo HERE;?></a></li>
  			<li class="breadcrumb-item"><a href="">XXXXXXXXX</a></li>
  			<li class="breadcrumb-item active"><?php echo $InfoPage->titre; ?></li>
		</ol>

		</div>
        
	</div>
	        
    <div class="row">
         
        <aside class="col-md-3">
            
        	<?php $InfoPage->AfficherAside($pdo); ?>
            
        </aside>
        
        <section  class="col-md-9">
    	
    		<?php $InfoPage->AfficherContenu($pdo); ?>		
    	
        </section>
    
    </div>

	<div class="row">

    	<footer class="col-md-12 text-center">
    	
    		<?php $InfoPage->AfficherFooter(); ?>
                	        
        </footer>
    
    </div>

</div>

</body>
</html>