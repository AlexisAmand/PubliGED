<?php
session_start();
echo "Déco de ".$_SESSION['login'];
session_destroy();
unset($_SESSION['login']);

header('Location: membre.php');
?>