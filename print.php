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
	
	<!-- Fontawesome via npm -->
	<link href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
	
	<!--  style perso -->
	<link href="style/style.css" rel="stylesheet">
	<link rel="icon" type="image/gif" href="img/icon.jpg" />
	
	<!-- Jquery via npm -->
	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	
	<!-- OpenStreetMap et Leaflet via npm -->
	<link href="node_modules/leaflet/dist/leaflet.css" rel="stylesheet">
	<script src="node_modules/leaflet/dist/leaflet.js"></script>

</head>

<body onload="window.print()"> 

<?php

/* récupération de l'article */

$sqlArticle = "SELECT * FROM articles where publication = '1' AND ref='{$_GET['id']}'";
$reqArticle = $pdo->prepare($sqlArticle);
$reqArticle->execute();

while ($data = $reqArticle->fetch(PDO::FETCH_ASSOC)) {
	echo "<h1>".$data['titre']."</h1>".$data['article'];
}

?>	
	
</body>
</html>