<?php

$array = array("a", "b", "c", "d");

var_dump($array);

$chaine = serialize($array);

echo '<br /><br /><br />';

var_dump($chaine);

$tableau = unserialize($chaine);

echo '<br /><br /><br />';

var_dump($tableau);

echo '<a href="index.php?'.$chaine.'">test</a>';

?>