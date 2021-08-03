<?php

require('sql.php');

/* TODO : Je me demande si ce fichier ne devrait pas plutôt être un DB.php qui serait includé partout. */
/* Ce fichier sera créé de façon dynamique au moment de l'installation */

/* ----------- */ 
/* Nom du site */
/* ----------- */

// $GLOBALS['NomduSite'] = "Site de démo de PubliGED (constante)";

/* --------------- */
/* connexion à SQL */
/* --------------- */

try 
	{	
	// $pdo = new PDO ('mysql:host=localhost;dbname=publiged', 'root', '');
	$pdo = new PDO ('mysql:host='.PUBLIGED_SRV.';dbname='.PUBLIGED_DB, PUBLIGED_LOG, PUBLIGED_PWD);
	// $pdo = new PDO('mysql:charset=utf8mb4');
	$pdo->exec ( 'SET NAMES utf8' );
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec ( "SET sql_mode = ''" );
	$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);	
	} 
catch ( Exception $e ) 
	{
	die ( 'Erreur: '.$e->getMessage () );
	}

/* ---------------------- */
/* activation des erreurs */
/* ---------------------- */

/* cette ligne empêche le bug ONLY_FULL_GROUP_BY que j'ai rencontré lors du passage à Laragon */

/* TODO: l'adresse du site sera une variable dont on récupére la valeur dans la base de données. 
 * Ensuite, on utilise define(), pour mettre la valeur de variable dans la constante. (LOL)
 */

define("URL_SITE", "/");

// Reporte toutes les erreurs PHP

error_reporting ( E_ALL );

?>