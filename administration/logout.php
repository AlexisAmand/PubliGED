<?php

/* L'utilisateur a choisi de se deconnecter */

session_start();
session_unset();
session_destroy();
header('Location: login.php');
exit();
?>