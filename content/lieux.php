
<h3><?php echo $GLOBALS['InfoPage']->titre; ?></h3>

<?php

if (VerifGedcom ( $pdo2 ) == "1") {
	$req_pays = "SELECT * FROM lieux GROUP BY pays";

	$resultat_pays = $pdo2->prepare ( $req_pays );
	$resultat_pays->execute ();

	while ( $data_pays = $resultat_pays->fetch () ) {
		echo "<ul>";
		echo "<li>" . utf8_decode ( $data_pays ['pays'] ) . "</li>";

		$req_dep = "SELECT * FROM lieux WHERE pays = '{$data_pays['pays']}' GROUP BY dep";
		$resultat_dep = $pdo2->prepare ( $req_dep );
		$resultat_dep->execute ();

		echo "<ul>";
		while ( $data_dep = $resultat_dep->fetch () ) {
			echo "<li>" . utf8_decode ( $data_dep ['dep'] ) . "</li>";

			$req_ville = "SELECT * FROM lieux WHERE dep = '{$data_dep['dep']}' GROUP BY ville";
			$resultat_ville = $pdo2->prepare ( $req_ville );
			$resultat_ville->execute ();
			echo "<ul>";
			while ( $data_ville = $resultat_ville->fetch () ) {
				/*
				 * $ville = explode(" ",$data_ville['ville']);
				 * echo "<li>".$ville[2]."</li>";
				 */
				echo "<li><a href='index?page=lieuxpatro&id=" . $data_ville ['ref'] . "'>" . $data_ville ['ville'] . "</a></li>";
			}
			echo "</ul>";
			echo "<br />";
		}
		echo "</ul>";
		echo "<br />";

		echo "</ul>";
	}
} else {
	echo NO_GEDCOM;
}
?>
	