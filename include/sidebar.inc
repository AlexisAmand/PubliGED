<?php

$sql = "SELECT * FROM modules WHERE visible='1' AND type='genealogie' ORDER BY position";
$req = $pdo2->query ( $sql );

while ( $row = $req->fetch () ) {
    
    echo "<br />";
    
	include ("modules/genealogie/" . $row ['nomdumodule'] . ".php");
}

?>