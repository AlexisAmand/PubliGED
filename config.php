<?php

/* TODO : Je me demande si ce fichier ne devrait pas plutôt être un DB.php qui serait includé partout. */

/* --------------- */
/* connexion à SQL */
/* --------------- */

try {	
	
	$pdo = new PDO ('mysql:host=localhost;dbname=publiged', 'root', '');
	
	// $pdo = new PDO('mysql:charset=utf8mb4');
	$pdo->exec ( 'SET NAMES utf8' );
} 
catch ( Exception $e ) {
	die ( 'Erreur: '.$e->getMessage () );
}

/* ---------------------- */
/* activation des erreurs */
/* ---------------------- */

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* TODO: l'adresse du site sera une variable dont on récupére la valeur dans la base de données. 
 * Ensuite, on utilise define(), pour mettre la valeur de variable dans la constante. (LOL)
 */

define("URL_SITE", "http://127.0.0.1/PubliGED/");

// Reporte toutes les erreurs PHP

error_reporting ( E_ALL );

?>