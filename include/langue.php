<?php

/* -------------------------------------------------------------------- */
/* Test sur la langue utilisée par le navigateur                        */
/* selonla langue qui est détectée, le fichier correspondant est inclus */
/* -------------------------------------------------------------------- */

$language = explode(',' , $_SERVER['HTTP_ACCEPT_LANGUAGE']);

switch($language[0])
	{
	case 'fr':
		include('langues/'.$language[0].'.php');
		break;
	case 'en':
		include('langues/'.$language[0].'.php');
		break;
	default:
		include('langues/'.$language[0].'.php');
		break;
	}

?>