<h3><?php echo $GLOBALS['Page']->titre; ?></h3>

<?php

if (VerifGedcom( $pdo2 ) == "1") {
	echo '<p>Exemple <br />Abscon 59215 - Nord - Nord-Pas-de-Calais - FRANCE : <br />AMAND ; MIZERA</p>';
} else {
	echo NO_GEDCOM;
}

?>  