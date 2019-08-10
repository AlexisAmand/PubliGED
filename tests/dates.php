<?php

/* -------------------------- */
/* Page de test sur les dates */
/* -------------------------- */

class Dates {
	public $jour;
	public $mois;
	public $annee;
	public $approx;
}

$approx = array ("vers", "avant", "calculée", "aprés");

$DateExemple = "vers 15 october 2005";

/* connexion à mysql */

try {
	$pdo = new PDO ( 'mysql:host=localhost;dbname=publiged', 'root', '' );
	$pdo->exec ( 'SET NAMES utf8' );
	}
catch ( Exception $e ) 
	{
	die ( 'Erreur: ' . $e->getMessage () );
	}
		
echo "Test de transformation de la chaine en date<br />";

/* on commence par vérifier si la chaine contient une approx.
 * Si oui, on la met de côté, puis on la supprime (l'approx.. pas la date) */ 

$tab = explode ( " ", $DateExemple);

$DateFinale = new Dates();

if (in_array ( $tab [0], $approx)) 
	{
	$DateFinale->approx = $tab[0];
	array_shift($tab);
	$DateExemple = implode(" ", $tab);
	}
	
$test = date_parse($DateExemple);

$DateFinale->jour = $test['day'];
$DateFinale->mois = $test['month'];
$DateFinale->annee = $test['year'];

echo $DateFinale->approx." ".$DateFinale->jour."/".$DateFinale->mois."/".$DateFinale->annee."<br />";

/* -------------------------- */
/* Test dates en ordre chrono */
/* -------------------------- */

/* NB: La table de test est temp dans la base publiged */

echo "Test de classement des dates<br />";

$req = "select * from temp order by datesql";
$res = $pdo->prepare ( $req );
$res->execute ();

while ( $data = $res->fetch(PDO::FETCH_ASSOC)) {
	
	$DateChrono = new Dates();
	$test = date_parse($data ['datesql']);

	$DateChrono->jour = $test['day'];
	$DateChrono->mois = $test['month'];
	$DateChrono->annee = $test['year'];

	echo $DateChrono->jour."/".$DateChrono->mois."/".$DateChrono->annee."<br />";

}

/* --------------------------------------------------------- */
/* trouver la première lettre du premier nom par ordre alpha */
/* --------------------------------------------------------- */

$sql = "SELECT * FROM individus GROUP BY surname ORDER BY surname ";
$resultat = $pdo->prepare ( $sql );
$resultat->execute();

$i = 0;

while ($row = $resultat->fetch(PDO::FETCH_ASSOC))
{
	var_dump($row);
	$tabsurname[$i] = $row['surname'];
	$i++;
}

$premier = array_shift($tabsurname);
var_dump($premier);
echo substr($premier, 0, 1);
?>