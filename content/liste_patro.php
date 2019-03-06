
<h3><?php echo TITRE_RUB_8; ?></h3>

<?php

if (VerifGedcom ( $pdo2 ) == "1") {

	$req_patro = 'SELECT * FROM individus WHERE surname = "' . htmlspecialchars ( $_GET ["nom"] ) . '" ORDER BY prenom';
	$res_patro = $pdo2->prepare ( $req_patro );
	$res_patro->execute ();

	/* pagination */

	$nrpp = recup_page ( $pdo2 );

	if (isset ( $_GET ['id'] )) {
		$page = $_GET ['id'];
		$i = $page - 1;
		$max = $nrpp * $i;
	} else {
		$page = 1;
		$max = 0;
	}

	$total = $res_patro->rowCount ();
	$nb_pages = $total / $nrpp;

	/* fin pagination */

	$resultat_patro = $pdo2->query ( $req_patro . " LIMIT " . $max . "," . $nrpp );

	while ( $data_patro = $resultat_patro->fetch () ) {
		echo "<a href='index.php?page=fiche&ref=" . $data_patro ['ref'] . "'>" . $data_patro ['surname'] . " ";
		echo $data_patro ['prenom'];
		$temp = $data_patro ['ref'];
		$req_date_birt = "select * from evenements where nom = 'BIRT' and n_indi = '{$temp}'";
		$resultat_date_birt = $pdo2->query ( $req_date_birt );
		echo " ( ";

		if ($resultat_date_birt->rowCount () == 0) {

			/* il n'y a pas de naissance, on vérifie si il y a un baptême */

			$req_date_chr = "select * from evenements where (nom = 'CHR' OR nom = 'BAPL' OR nom = 'BAPM' OR nom = 'BAPT') and n_indi = '{$temp}'";
			$resultat_date_chr = $pdo2->query ( $req_date_chr );
			while ( $data_chr = $resultat_date_chr->fetch () ) {
				echo utf8_decode ( $data_chr ['date'] );
			}
		} else {

			/* si on est ici, c'est qu'il y a une naissance */

			while ( $data_birt = $resultat_date_birt->fetch () ) {
				echo utf8_decode ( $data_birt ['date'] );
			}
		}

		echo " - ";

		/* affichage de l'ann&eacute;e de d&eacute;c&egrave;s */

		$req_date_deat = "select * from evenements where nom = 'DEAT' and n_indi = '{$temp}'";

		$resultat_date_deat = $pdo2->query ( $req_date_deat );

		if ($resultat_date_deat->rowCount () == 0) {

			/* il n'y a pas de décès, on vérifie si il y a une inhumation */

			$req_date_buri = "select * from evenements where nom = 'BURI' and n_indi = '{$temp}'";
			$resultat_date_buri = $pdo2->query ( $req_date_buri );
			while ( $data_buri = $resultat_date_buri->fetch () ) {
				echo utf8_decode ( $data_buri ['date'] );
			}
		} else {
			while ( $data_deat = $resultat_date_deat->fetch () ) {
				echo utf8_decode ( $data_deat ['date'] );
			}
		}

		echo " )";

		echo "</a><br />";
	}

	/* pagination */

	echo "<ul class='pagination justify-content-center'>";
	for($i = 1; $i <= $nb_pages + 1; $i ++) {
		if (($page == $i)) {
			echo "<li class='disabled page-item'><a class='page-link' href='?page=liste_patro&nom=AMAND&id=" . $i . "&nom=" . htmlspecialchars ( $_GET ["nom"] ) . "'>" . $i . "</a></li>";
		} else {
			echo "<li class='page-item'><a class='page-link' href='?page=liste_patro&nom=AMAND&id=" . $i . "&nom=" . htmlspecialchars ( $_GET ["nom"] ) . "'>" . $i . "</a></li>";
		}
	}
	echo "</ul>";

	/* fin pagination */
} else {
	echo NO_GEDCOM;
}
?>