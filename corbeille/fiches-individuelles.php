	<?php

	/* -------------------------------------- */
	/* TODO: cette page est peut-être inutile */
	/* -------------------------------------- */
	?>

<h3><?php echo TITRE_RUB_9; ?></h3>

<?php

if (VerifGedcom ( $pdo2 ) == "1") {
	$sql = "SELECT * FROM individus ORDER BY surname, prenom";
	$req = $pdo2->query ( $sql );

	echo "<table>";

	while ( $data = $req->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";
		echo "<td><a href='#'>" . $data ['surname'] . " " . $data ['prenom'] . "</a></td>";
		echo "</tr>";
	}

	echo "</table>";
} else {
	echo NO_GEDCOM;
}

?>