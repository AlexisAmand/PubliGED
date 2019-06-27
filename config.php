<?php

/* TODO : Je me demande si ce fichier ne devrait pas plutôt être un DB.php qui serait includé partout. */

/* --------------- */
/* connexion à SQL */
/* --------------- */

try {	
	$pdo = new PDO ( 'mysql:host=localhost;dbname=publiged', 'root', '' );
	// $pdo = new PDO('mysql:charset=utf8mb4');
	$pdo->exec ( 'SET NAMES utf8' );
} 
catch ( Exception $e ) {
	die ( 'Erreur: ' . $e->getMessage () );
}

/* ---------------------- */
/* activation des erreurs */
/* ---------------------- */

$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
define ( "URL_SITE", "http://127.0.0.1/PubliGED/" );

error_reporting ( E_ALL );

?>