

<!DOCTYPE html>

<html lang="fr">
<head>

		
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>test d'affichage de la page blog</title>
<meta name='description' content='>description de la page blog'>
	
			
	<link href="templates/bootstrap/css/bootstrap.cerulean.css" rel="stylesheet">
		
	<!-- Obligatoire - importe les css de Font Awesome et Leaflet -->
	
	<link href="templates/css/commons.css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
	<link href="js/datatables/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	
	<!-- OpenStreetMap et Leaflet 1.6 -->
	
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	

	<!-- Perso -->

	<link rel="icon" type="image/gif" href="img/icon.jpg" />
		
</head>

<body>

<div class="container fixed-top">

	<div class="col-md-12">
	
		
<nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-primary pillmenu navbar-fixed-top" style="position: absolute;top: 0;right: 0;left: 0;z-index: 1030;">

	<div class="collapse navbar-collapse">

		<ul class="navbar-nav mr-auto">
	        <li class="nav-item active"><a class="nav-link" href="index.php?page=blog">Mon blog</a></li><li class="nav-item"><a class="nav-link" href="index.php?page=patro">Ma généalogie</a></li><li class="nav-item"><a class="nav-link" href="administration/index.php">Administration</a></li><li class="nav-item"><a class="nav-link" href="index.php?page=contact">Me contacter</a></li>		</ul>

		<form class="form-inline my-2 my-lg-0" method="POST" action="index.php?page=search">
			<input class="form-control mr-sm-2" type="text"	placeholder="Recherche" name="recherche" value="recherche" onclick="this.value = '';">
			<button class="btn btn-secondary my-2 my-sm-0" type="submit" value="ok">
				<i class="fa fa-search"></i>
			</button>
		</form>

	</div>
</nav>	
	</div>

</div>

<div class="container">

	<header class="row">

		<div class="col-12">

			<div class="hgroup text-center" style="padding: 100px 0;">
	<h1>
		<a href="index.php?page=blog">PubliGED</a>
	</h1>
	<p>Site de demonstration du projet</p>
</div>
		
		</div>
					
	</header>	

	<div class="row" style="margin-top: 10px;">

		<div class="col-md-12">

			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php?page=blog" title="Accueil">Accueil</a></li>
				<li class="breadcrumb-item"><a href="">Le blog</a></li>
				<li class="breadcrumb-item active">test d'affichage de la page blog</li>
			</ol>

		</div>

	</div>

	<section class="row">
           
        	<aside class="col-md-3"><!-- MODULE QUI AFFICHE UN MENU -->
<!-- (non actif pour le moment) -->

<div class="card bg-light border-secondary mb-3">

	<div class="card-header">Le blog</div>

	<ul class='list-group'>
		<li class='list-group-item'><a href="index.php?page=blog">Sommaire</a></li>
	</ul>

</div><!-- MODULE QUI AFFICHE LA LISTE DES CATEGORIES -->


<div class="card bg-light border-secondary mb-3">

	<div class="card-header">Rubriques</div>

	<ul class='list-group'><li class='list-group-item d-flex justify-content-between align-items-center'><a href='index.php?page=categories&id=1'>categorie_A</a><span class='badge badge-primary badge-pill'>2</span></li><li class='list-group-item d-flex justify-content-between align-items-center'><a href='index.php?page=categories&id=2'>categorie_B</a><span class='badge badge-primary badge-pill'>6</span></li><li class='list-group-item d-flex justify-content-between align-items-center'><a href='index.php?page=categories&id=3'>Nouvelle catégorie n°1</a><span class='badge badge-primary badge-pill'>2</span></li><li class='list-group-item d-flex justify-content-between align-items-center'><a href='index.php?page=categories&id=4'>Nouvelle catégorie n°2</a><span class='badge badge-primary badge-pill'>1</span></li></ul>
</div><!-- MODULE QUI AFFICHE LE5 5 DERNIERS ARTICLES -->

<div class="card bg-light border-secondary mb-3">

	<div class="card-header">Derniers articles</div>

	<ul class='list-group'><li class='list-group-item'><a href='index.php?page=article&id=42'>Article de demo n°1</a></li><li class='list-group-item'><a href='index.php?page=article&id=44'>Article de demo n°3</a></li><li class='list-group-item'><a href='index.php?page=article&id=43'>Article de demo n°2</a></li><li class='list-group-item'><a href='index.php?page=article&id=41'>Test de mysql</a></li><li class='list-group-item'><a href='index.php?page=article&id=12'>test de l'admin</a></li></ul>    

</div><!-- EXEMPLE DE MODULE AVEC DES CREDITS -->

<div class="card bg-light border-secondary mb-3">

	<div class="card-header">Crédits</div>

	<ul class='list-group'>
		<li class='list-group-item'><a href="index.php?page=credits">Crédits</a></li>
	</ul>

</div><!-- MODULE SOCIAL -->

<div class="card bg-light border-secondary mb-3">

	<div class="card-header">Réseaux sociaux</div>
	
	<div class="text-center">
	
	<a href=""><i class="la la-facebook-square fa-3x"></i></a><a href=""><i class="fab fa-twitter-square fa-3x"></i></a><a href=""><i class="fab fa-vimeo-square  fa-3x"></i></a><a href=""><i class="fab fa-linkedin fa-3x"></i></a><a href=""><i class="fas fa-rss-square fa-3x"></i></a><a href=""><i class="fab fa-pinterest-square fa-3x"></i></a><a href=""><i class="fab fa-instagram fa-3x"></i></a><a href=""><i class="fab fa-youtube-square fa-3x"></i></a>
	</div>

</div></aside>              	
    		<article class="col-md-9">
    		
    			<div class="col-8" id="mapid" style="width: 100%; height: 60vh;"></div>
	
				<script>
				
					var mymap = L.map('mapid').setView([51.505, -0.09], 13);
				
					L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
						maxZoom: 18,
						attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
							'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
							'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
						id: 'mapbox/streets-v11',
						tileSize: 512,
						zoomOffset: -1
					}).addTo(mymap);
				
				</script>
			    		
    		</article>		
    	
	</section>

	<footer class="row">

		<div class="col-md-12 text-center">
    	
    		Site propulsé par <a href="http://publiged.genealexis.fr" title="site officiel du PubliGED">PubliGED</a><br />                	        
        </div>

	</footer>

</div>

	<!-- Jquery 3.4.1 -->

	<script src="js/jquery-3.4.1.min.js"></script>

	


	<!-- Bootstrap 4.4.1 -->
	
	<script src="templates/bootstrap/js/bootstrap.min.js"></script>
	
	
	<!-- librairie datatables 1.10.20 pour tableaux bootstrap 4 -->
	
  	<script src="js/datatables/datatables/js/jquery.datatables.min.js"></script>
  	<script src="js/datatables/datatables/js/dataTables.bootstrap4.min.js "></script>

  	<!-- Ce script contient l'initialisation du plugin datatables de jquery-->
  	
  	<script src="administration/js/demo/datatables-demo.js"></script>
  	
	<!-- OpenStreetMap et Leaflet 1.6 -->
	
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	
	<!-- TinyMCE 5.1.5 -->
	
	<script src="js/tinymce/tinymce.min.js"></script>
	
	<!-- Divers Javascript -->
	
	<script src="js/scripts.js"></script>

</body>
</html>