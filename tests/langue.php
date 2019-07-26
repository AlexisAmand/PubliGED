<?php

/* ------------------------------------------------------- */
/* Test sur la langue utilisée par le navigateur           */
/* selon le cas, il faut inclure le fichier qui correspond */
/* ------------------------------------------------------- */

$language = explode(',' , $_SERVER['HTTP_ACCEPT_LANGUAGE']);
include('langues/'.$language[0].'.php');

?>