<?php

/* test avec les cases à cocher */

if(isset($_POST['parfum']) or isset($_POST['cone']))
{
	var_dump($_POST['parfum']);
	
	$tabcone = explode(",",$_POST['cone']);
	
	var_dump($tabcone);
}

?>

<html>

<head>

</head>

<body>

<form method="POST" action="cases.php">
	
	parfum<br />
	
    <INPUT type="radio" name="parfum" value="vanille"> vanille<br />
    <INPUT type="radio" name="parfum" value="chantilly"> chantilly<br />
    <INPUT type="radio" name="parfum" value="chocolat"> chocolat<br />
    <INPUT type="radio" name="parfum" value="fraise"> fraise<br />
	
	cone<br />
	
	<INPUT type="radio" name="cone" value="8,pot"> pot<br />
    <INPUT type="radio" name="cone" value="9,biscuit"> biscuit<br />
	
	<input type="submit">

</form>

</body>

</html>