<?php

/* --------------- */
/* connexion à SQL */
/* --------------- */
try {
	$pdo = new PDO ( 'mysql:host=hostingmysql46.amen.fr;dbname=testpubliged', 'cm263003', '66R4HBBH' );
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

define ( "URL_SITE", "http://demo.genealexis.fr/" ); 

?>