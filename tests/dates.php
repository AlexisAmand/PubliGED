<?php

/* page de tests divers */

class Dates
    {
    public $jour;
    public $mois;
    public $annee;
    public $approx;
    }
 
$chaine = "15 october 2005";
    
$tab = explode(" ",$chaine);

$approx = array("vers");    

if (in_array($tab[0], $approx))
    {
    // $chaine = $chaine - tab[0]
    }

$timestamp = strtotime($chaine);
echo $chaine." > ".date('d m Y', $timestamp)."<br />";

?>