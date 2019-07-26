<?php

$sqlModulesBlog = "SELECT * FROM modules WHERE visible='1' AND type='blog' ORDER BY position";
$reqModulesBlog = $pdo2->query($sqlModulesBlog);

while ( $row = $reqModulesBlog->fetch()) 
	{
	include ("modules/blog/".$row ['nomdumodule'].".php");
	}
	
?>