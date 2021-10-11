<?php

/* L'utilisateur a choisi de se deconnecter */
/* il est redirigé vers la page de login */

session_start();
session_unset();
session_destroy();

require ('../content/fonctions.php');

/* Enregistrement de l'action dans le journal */
/*
$moment = date("F j, Y, g:i ");
file_put_contents("logs/blog.log", $moment."Fermeture d'une session pour l'utilisateur ".$_SESSION['login']."\n" , FILE_APPEND);
*/
putOnLogB("Fermeture d'une session pour l'utilisateur ".$_SESSION['login']);

header('Location: login.php');
exit();
?>