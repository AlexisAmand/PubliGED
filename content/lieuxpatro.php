<?php
$req_lieux = $pdo2->query ( "select * from lieux WHERE lieux.ref = " . $_GET ['id'] );

while ( $coord = $req_lieux->fetch ( PDO::FETCH_ASSOC ) ) {
	$ville = $coord ['ville'];
}

echo "<h1>" . $ville . "</h1>";

$req = $pdo2->query ( "select * from individus, evenements, lieux where evenements.lieu = '" . $_GET ['id'] . "' and evenements.n_indi = individus.ref group by individus.surname" );

while ( $data = $req->fetch ( PDO::FETCH_ASSOC ) ) {
	echo "<a href='index.php?page=liste_patro_lieu&nom=" . urlencode ( $data ['surname'] ) . "'>" . $data ['surname'] . "</a><br />";
}

?>