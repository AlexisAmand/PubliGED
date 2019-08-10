<?php

$sqlModulesGenealogie = "SELECT * FROM modules WHERE visible='1' AND type='genealogie' ORDER BY position";
$reqModulesGenealogie = $pdo2->query($sqlModulesGenealogie);

while ( $row = $reqModulesGenealogie->fetch(PDO::FETCH_ASSOC)) 
	{
	include ("modules/genealogie/".$row ['nomdumodule'].".php");
	}
	
?>