<?php
require ('content/fonctions.php');
include ('config.php');
include ('include/langue.php');
include ('class/class.php');
?>

<!DOCTYPE html>

<html lang="fr">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title>Export d'un article au format pdf</title>
	<meta name="description" content=" ">

	<!-- Bootstrap 4.4.1 -->

	<link href="style/bootstrap/css/bootstrap.perso.css" rel="stylesheet">
	<script src="style/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Font Awesome Free 5.10.0 -->
	
	<link href="style/fontawesome/css/all.css" rel="stylesheet">
	
	<!--  style perso -->
	
	<link href="style/style.css" rel="stylesheet">
	<link rel="icon" type="image/gif" href="img/icon.jpg" />
	
	<!-- Jquery 3.4.1 -->
	<!-- Peut-être pas utile ici -->

	<script src="js/jquery-3.4.1.min.js"></script>
	
	<!-- OpenStreetMap et Leaflet 1.6 -->
	<!-- Peut-être pas utile ici -->
	
	<link rel="stylesheet" href="js/leaflet/leaflet.css">
	<script src="js/leaflet/leaflet.js"></script>

</head>

<body onload="window.print()"> 

<?php

/* récupération de l'article */

$sqlArticle = "select * from articles where ref='{$_GET['id']}'";
$reqArticle = $pdo->prepare($sqlArticle);
$reqArticle->execute();

while ($data = $reqArticle->fetch(PDO::FETCH_ASSOC)) {
	echo "<h1>".$data['titre']."</h1>".$data['article'];
}

?>	
	
</body>
</html>