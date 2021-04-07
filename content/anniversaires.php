<?php

/* ----------------------- */
/* LISTE DES ANNIVERSAIRES */
/* ----------------------- */

?>

<h3><?php echo $GLOBALS['InfoPage']->titre; ?></h3>

<?php

if (VerifGedcom($pdo2)=="1") 
	{
	echo '<p>'.SOON.'</p>';
	}
else 
	{
	echo NO_GEDCOM;
	}

?>