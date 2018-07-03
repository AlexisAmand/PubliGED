<?php 

require ('content/fonctions.php');
include ('config.php');
// include ('include/langue.php');
include ('langues/fr.php');
include ('class/class.php');

/* librairie pdf */

require_once 'lib/mpdf/autoload.php';

?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<title> </title>
		<meta name="description" content=" ">
				
		<!-- Bootstrap 4.1.1 -->
		
		<link href="style/bootstrap/css/bootstrap.simplex.css" rel="stylesheet">	
		<script src="style/bootstrap/js/bootstrap.min.js"></script>
		
		<!-- Font Awesome Free 5.1 -->
		
    	<link href="style/fontawesome/css/all.css" rel="stylesheet">
    	
    	<!--  style perso -->
    	
    	<link href="style/style.css" rel="stylesheet">	
    	<link rel="icon" type="image/gif" href="img/icon.jpg" />
    	   		
    	<!-- Jquery 3.3.1 -->
    	
    	<script src="js/jquery-3.3.1.min.js"></script>
    			
        <!-- OpenStreetMap et Leaflet 1.3.1 -->
		
        <link rel="stylesheet" href="js/leaflet/leaflet.css">
        <script src="js/leaflet/leaflet.js"></script>
        
        <!-- TinyMCE 4.7.13 -->
        
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

<?php

/* récupération de l'article */

$req = "select * from articles where ref='{$_GET['id']}'";
$res = $pdo->prepare ($req);
$res->execute ();

/* affichage du pdf */

while ( $data = $res->fetch () ) 
	{
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML("<h1>".$data['titre']."</h1>".$data ['article']);
		$mpdf->Output();
	}
	
	?>

</body>
</html>