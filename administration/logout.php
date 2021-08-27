<?php

/* L'utilisateur a choisi de se deconnecter */
/* il est redirigé vers la page de login */

session_start();
session_unset();
session_destroy();
header('Location: login.php');
exit();
?>