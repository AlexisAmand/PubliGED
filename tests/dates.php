<?php

/* page de test sur les dates */

/* str to sate perso */
/* fonctionne mais sans la prise en compte de l'approx */
class Dates {
	public $jour;
	public $mois;
	public $annee;
	public $approx;
}

echo "<p>test de transformation du chaine en date:</p>";

$chaine = "15 october 2005";

$tab = explode ( " ", $chaine );

$approx = array (
		"vers",
		"avant",
		"calculée",
		"aprés"
);

if (in_array ( $tab [0], $approx )) {
	for($i = 0; $i < count ( $tab ) - 1; $i ++) {
		$tab [i] = $tab [i + 1];
	}
}

echo var_dump ( $tab );

$timestamp = strtotime ( $chaine );

echo $chaine . " > " . date ( 'd m Y', $timestamp ) . "<br />";

/* dates en ordre chrono */
/* la table de test est temp dans la base publiged */

echo "<p>test de classement des dates:</p>";

try {
	$pdo = new PDO ( 'mysql:host=localhost;dbname=publiged', 'root', '' );
	// $pdo = new PDO('mysql:charset=utf8mb4');
	$pdo->exec ( 'SET NAMES utf8' );
} 
catch ( Exception $e ) {
	die ( 'Erreur: ' . $e->getMessage () );
}

$req = "select * from temp order by datesql";
$res = $pdo->prepare ( $req );
$res->execute ();

while ( $data = $res->fetch () ) {
	echo $data ['datesql'] . "<br />";
}

?>