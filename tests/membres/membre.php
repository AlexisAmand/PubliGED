<?php

session_start();

/* Si la personne se connecte, elle arrive sur l'espace membre */

if (isset($_SESSION['login']))
	{
	echo "Bienvenue ".$_SESSION['login'];
	echo '<a href="logout.php">Se déconnecter</a>';
	}
else 
	{
	echo "Oups... tu es pas connecté";
	echo '<a href="login.php">Se connecter</a>';
	}

?>

