<?php
$sql = "SELECT * FROM modules WHERE visible='1' AND type='blog' ORDER BY position";
$req = $pdo2->query ( $sql );

while ( $row = $req->fetch () ) {

	echo "<br />";

	include ("modules/blog/" . $row ['nomdumodule'] . ".php");
}

?>