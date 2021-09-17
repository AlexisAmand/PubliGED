<?php 

/* test enregistrement d'un truc avec une date */

$moment = date("F j, Y, g:i ");
file_put_contents("test.log", $moment." plop la foule\n", FILE_APPEND);

?>