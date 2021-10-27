<?php

/* L'utilisateur a choisi de se deconnecter */
/* il est redirigé vers la page de login */

session_start();
session_unset();
session_destroy();

require ('../content/fonctions.php');

/* Enregistrement de l'action dans le journal */

putOnLogB(CLOSE_SESSION." ".$_SESSION['login']);

header('Location: login.php');
exit();
?>