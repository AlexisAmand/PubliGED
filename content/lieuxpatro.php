<?php
$reqLieux = $pdo2->query ( "select * from lieux WHERE lieux.ref = " . $_GET ['id'] );

while ( $coord = $reqLieux->fetch ( PDO::FETCH_ASSOC ) ) {
	$ville = $coord ['ville'];
}

echo "<h3>" . $ville . "</h3>";

$req = $pdo2->query ( "select * from individus, evenements, lieux where evenements.lieu = '" . $_GET ['id'] . "' and evenements.n_indi = individus.ref group by individus.surname" );

while ( $data = $req->fetch ( PDO::FETCH_ASSOC ) ) {
	echo "<a href='index.php?page=liste_patro&nom=" . urlencode ( $data ['surname'] ) . "'>" . $data ['surname'] . "</a><br />";
}

?>