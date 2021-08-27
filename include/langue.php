<?php

/* -------------------------------------------------------------------- */
/* Test sur la langue utilisée par le navigateur                        */
/* selon la langue qui est détectée, le fichier correspondant est inclus */
/* -------------------------------------------------------------------- */

$language = explode(',' , $_SERVER['HTTP_ACCEPT_LANGUAGE']);

// var_dump($_SERVER['HTTP_ACCEPT_LANGUAGE']);

switch($language[0])
	{
	case 'fr-FR':
		include('langs/fr.php');
		break;
	case 'en-GB':
		include('langs/en.php');
		break;
	default:
		include('langs/fr.php');
		break;
	}

?>