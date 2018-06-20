<?php
require ('fonctions.php');
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>

	<meta charset="utf-8">
	
	<title><?php echo SITE_TITLE." - ".TITRE_RUB_13; ?></title>
    <meta name="description" content=" ">
	
	<link href="../css/bootstrap.css" rel="stylesheet">	
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">	
    
    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>	
	
</head>
<body>

<div class="container">

 	<div class="row">
 	
 		<header class="col-sm-12">
 		
 			<?php include('../include/header.inc');?>
 		
 		</header>
 		
 	</div>
 	
 	<div class="row">

		<div class="col-sm-12" id="bandeau">
		
		</div>
        
	</div>

 	<div class="row">
 					
 		<nav class="col-sm-12 navbar navbar-default">
 		
 			<?php include ('../include/pillmenu.inc'); ?>
 		 		
		</nav> 
 		
 	</div>

    <div class="row">

		<div class="col-sm-12">

		<ol class="breadcrumb">
  			<li><a href="index.php?page=blog" title="Accueil"><?php echo HERE;?></a></li>
  			<li><?php echo TITRE_RUB_1; ?></li>
  			<li class="active"><?php echo TITRE_RUB_13; ?></li>
		</ol>

		</div>
        
	</div>
        
    <div class="row">
         
    <aside class="col-sm-3">
        
    	<?php include ('../include/sidebar.inc'); ?>
        
    </aside>
    	
    <section  class="col-sm-9">
    	
    	<h3><?php echo TITRE_RUB_13; ?></h3>

	<p>Prochainement...</p>

     </section>
     
    </div>

	<div class="row">

	<footer class="col-sm-12 text-center">
        
    	<?php include ('../include/footer.inc'); ?>
        
    </footer>
    
    </div>

</div>

</body>
</html>