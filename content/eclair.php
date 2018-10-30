	<?php

	/* ------------ */
	/* LISTE ECLAIR */
	/* ------------ */
	?>

<h3><?php echo TITRE_RUB_10; ?></h3>

<?php

if (VerifGedcom ( $pdo2 ) == "1") {

	/* affichage tableau */

	if (! empty ( $_GET ['tri'] )) {
		switch ($_GET ['tri']) {
			case "lieu-a" :
				$trisql = " ORDER BY L.ville ASC ";
				break;
			case "lieu-d" :
				$trisql = " ORDER BY L.ville DESC ";
				break;
			case "nom-a" :
				$trisql = " ORDER BY I.surname ASC ";
				break;
			case "nom-d" :
				$trisql = " ORDER BY I.surname DESC ";
				break;
			case "region-a" :
				$trisql = " ORDER BY L.region ASC ";
				break;
			case "region-d" :
				$trisql = " ORDER BY L.region DESC ";
				break;
			case "pays-a" :
				$trisql = " ORDER BY L.pays ASC ";
				break;
			case "pays-d" :
				$trisql = " ORDER BY L.pays DESC ";
				break;
			default :
				$trisql = "";
		}
	} else {
		$trisql = "";
	}

	$sql = "SELECT * FROM individus I, evenements E, lieux L WHERE I.ref = E.n_indi AND E.lieu = L.ref GROUP BY  I.surname " . $trisql;
	$req2 = $pdo2->query ( $sql );

	/* ORDER BY L.ville */

	echo "<table class='table table-bordered'>";

	echo "<thead>";
	echo "<tr><th>Nom";

	TriListeEclair ( "&#9650", "nom-a" );
	TriListeEclair ( "&#9660", "nom-d" );

	echo "</th><th>Lieu";

	TriListeEclair ( "&#9650", "lieu-a" );
	TriListeEclair ( "&#9660", "lieu-d" );

	echo "</th><th>Région";

	TriListeEclair ( "&#9650", "region-a" );
	TriListeEclair ( "&#9660", "region-d" );

	echo "</th><th>Pays";

	TriListeEclair ( "&#9650", "pays-a" );
	TriListeEclair ( "&#9660", "pays-d" );

	echo "</th></tr>";
	echo "</thead><tbody>";

	while ( $data2 = $req2->fetch () ) {
		// $ville = explode(" ", $data2['ville']);
		echo "<tr>";
		echo "<td><a href='index.php?page=liste_patro&nom=" . $data2 ['surname'] . "'>" . $data2 ['surname'] . "</a></td>";
		echo "<td>" . $data2 ['ville'] . "</td>";
		echo "<td>" . $data2 ['region'] . "</td>";
		echo "<td>" . $data2 ['pays'] . "</td>";
		echo "</tr>";
	}

	echo "</tbody></table>";
} else {
	echo NO_GEDCOM;
}