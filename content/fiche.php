<?php

/* -------------------------------- */
/* FICHE INDIVIDUELLE D'UN INDIVIDU */
/* -------------------------------- */

$individu = new Individus();

$individu->ref = $_GET ['ref'];

$req = $pdo2->query ( "select * from individus where ref='$individu->ref'" );

while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

	/* --------------------------- */
	/* Nom et prénom de l'individu */
	/* --------------------------- */

	$individu->prenom = $row ['prenom'];
	$individu->nom = $row ['surname'];
	$individu->note = $row ['note'];
	$individu->id = $row ['id'];

	/* ------------------ */
	/* sexe de l'individu */
	/* ------------------ */

	$row ['sex'] = preg_replace ( '/\s/', '', $row ['sex'] );
	switch ($row ['sex']) {
		case "M" :
			$individu->sexe = SEX_MAN;
			$image = "img/homme.png";
			break;
		case "F" :
			$individu->sexe = SEX_WOMAN;
			$image = "img/femme.png";
			break;
		default :
			$individu->sexe = SEX_UNKNOW;
	}
}

/* ----------------------------------------------------- */
/* Naissance, baptême, décès et inhumation de l'individu */
/* ----------------------------------------------------- */

$reqBMS = $pdo2->prepare("SELECT * FROM evenements WHERE n_indi = :ref");
$reqBMS->bindparam(':ref', $_GET ['ref']);
$reqBMS->execute();
$nb_eve = $reqBMS->rowCount();

while ( $row = $reqBMS->fetch ( PDO::FETCH_ASSOC ) ) {
	switch ($row ['nom']) {
		case "BIRT": /* naissance */
		$birt = new evenements ();
			$birt->date = $row ['date'];
			$birt->lieu = lieu ( $pdo2, $row ['lieu'] );
			Break;
		case "DEAT": /* décès */
		$deat = new evenements ();
			$deat->date = $row ['date'];
			$deat->lieu = lieu ( $pdo2, $row ['lieu'] );
			Break;
		case "CHR": /* baptême */
		$chr = new evenements ();
			$chr->date = $row ['date'];
			$chr->lieu = lieu ( $pdo2, $row ['lieu'] );
			Break;
		case "BAPL": /* baptême mormon */
	    $bapl = new evenements ();
			$bapl->date = $row ['date'];
			$bapl->lieu = lieu ( $pdo2, $row ['lieu'] );
			Break;
		case "BAPM": /* baptême */
		$bapm = new evenements ();
			$bapm->date = $row ['date'];
			$bapm->lieu = lieu ( $pdo2, $row ['lieu'] );
			Break;
			Break;
		case "BAPT": /* baptême  */
		$bapt = new evenements ();
			$bapt->date = $row ['date'];
			$bapt->lieu = lieu ( $pdo2, $row ['lieu'] );
			Break;
		case "BURI": /* inhumation */
		$buri = new evenements ();
			$buri->date = $row ['date'];
			$buri->lieu = lieu ( $pdo2, $row ['lieu'] );
			Break;
	}
}

/* ------------------------- */
/* Les parents de l'individu */
/* ------------------------- */

$req_parents = $pdo2->prepare ( "select * from familles where enfant=:ref" );
$req_parents->bindparam ( ':ref', $individu->ref );
$req_parents->execute ();

while ( $row = $req_parents->fetch(PDO::FETCH_ASSOC) ) {
	$individu->pere = $row ['pere'];
	$individu->mere = $row ['mere'];
}

/* ---------------------------- */
/* Les événements de l'individu */
/* ---------------------------- */

$req_event = $pdo2->prepare ( "SELECT * FROM evenements WHERE n_indi = :n_indi" );
$req_event->bindparam ( ':n_indi', $individu->ref );
$req_event->execute ();

$i = 1;

while ( $date_event = $req_event->fetch(PDO::FETCH_ASSOC) ) {

	$event [$i] = new evenements ();
	$event [$i]->date = $date_event ['date'];
	$event [$i]->ref = $date_event ['n_eve'];
	$event [$i]->nom = $date_event ['nom'];
	$event [$i]->note = $date_event ['note'];
	$event [$i]->source = $date_event ['source'];
	$event [$i]->evenement = $date_event ['evenement'];
	$event [$i]->lieu = $date_event ['lieu'];

	$i ++;
	$max = $i;
}

?>

<div class="gender">
	<img src='<?php echo $image; ?>'>
</div>

<?php

echo "<h3>" . $individu->prenom . " " . $individu->nom . "</h3>";

echo "<ul>";

/* naissance */
if (isset ( $birt )) {
	evenements ( $birt->date, $birt->lieu, BORNAT, BORN );
}

/* baptême */
if (isset ( $chr )) {
	evenements ( $chr->date, $chr->lieu, BAPTAT, BAPTISM );
}

/* baptême mormons */
if (isset ( $bapl )) {
	evenements ( $bapl->date, $bapl->lieu, BAPTAT, BAPTISM );
}

/* baptême */
if (isset ( $bapm )) {
	evenements ( $bapm->date, $bapm->lieu, BAPTAT, BAPTISM );
}

/* baptême */
if (isset ( $bapt )) {
	evenements ( $bapt->date, $bapt->lieu, BAPTAT, BAPTISM );
}

/* décès */
if (isset ( $deat )) {
	evenements ( $deat->date, $deat->lieu, DEADAT, DEAD );
}

/* Inhumation */
if (isset ( $buri )) {
	evenements ( $buri->date, $buri->lieu, INTERMENTAT, INTERMENT );
}

echo "</ul>";

/* -------------------------- */
/* Affichage de la profession */
/* -------------------------- */

$sqlProfession = $pdo2->prepare( "SELECT * FROM evenements WHERE n_indi = :ref and nom = 'OCCU'" );
$sqlProfession->bindparam( ':ref', $individu->ref );
$sqlProfession->execute();

while ($row_prof = $sqlProfession->fetch(PDO::FETCH_ASSOC)) {
	echo "<p>" . JOBS . $row_prof ['evenement'] . "<br />" . $row_prof ['note'] . "</p>";
}

/* --------------------- */
/* Affichage des parents */
/* --------------------- */

echo "<h4>" . PARENTS . "</h4>";

echo '<p>';
if (isset ( $individu->pere ) or isset ( $individu->mere )) {
	echo FATHER . " : " . individu ( $pdo2, $individu->pere ) . "<br />";
	echo MOTHER . " : " . individu ( $pdo2, $individu->mere );
} else {
	echo NOPARENTS;
}
echo '</p>';

/* --------------------- */
/* Affichage des enfants */
/* --------------------- */

echo "<h4>" . CHILDREN . "</h4>";

$req_enfants = "select * from familles where pere=:ref or mere=:ref group by enfant";
$req = $pdo2->prepare ( $req_enfants );
$req->bindparam ( ':ref', $individu->ref );
$req->execute ();

$count = $req->rowCount ();

if ($count == 0) {
	echo NOCHILDREN;
}

echo "<ul>";

while ( $row_enfants = $req->fetch (PDO::FETCH_ASSOC) ) {
	if (! empty ( $row_enfants ['enfant'] )) {
		echo "<li>";
		echo individu ( $pdo2, $row_enfants ['enfant'] );
		echo "</li>";
	} else {
		echo NOCHILDREN . "<br />";
	}
}

echo "</ul>";

/* --------------------------- */
/* Affichage de la chronologie */
/* --------------------------- */

echo "<h4>" . CHRONO . "</h4>";

$a = 1;

if ($nb_eve != 0) {
	echo "<table class='table table-bordered'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Nom</th>";
	echo "<th>Date</th>";
	echo "<th>Lieu</th>";
	echo "<th>Source</th>";
	echo "<th>Type</th>";
	echo "<th>Note</th>";
	echo "</tr>";
	echo "</thead>"; 
} else {
	echo NOEVENT;
}

while ( $a < $i ) {
	echo "<tr>";
	echo "<td>" . traduction ( $event [$a]->nom ) . "</td>";
	echo "<td>" . utf8_decode ( $event [$a]->date ) . "</td>";
	echo "<td>".lieu($pdo2, $event [$a]->lieu)."</td>";
	echo "<td><a href='index.php?page=sources&ids=" . $event [$a]->source . "'>" . $event [$a]->source . "</a></td>";
	echo "<td>" . $event [$a]->evenement . "</td>";
	echo "<td>" . $event [$a]->note . "</td>";
	echo "</tr>";
	$a ++;
}

echo "</table>";

/* --------------------- */
/* arbre généalogique V1 */
/* --------------------- */

echo "<h4>" . FAMILYTREE . " (version 1)</h4>";

echo "<div class='row'>";

include("arbre-v1.php");

echo "</div>";

/* --------------------- */
/* arbre généalogique V2 */
/* --------------------- */

echo "<h4>" . FAMILYTREE . " (version 2)</h4>";

echo "<div class='row'>";

include("arbre-v2.php");

echo "</div>";

/* --------------------- */
/* arbre généalogique V3 */
/* --------------------- */

echo "<h4>" . FAMILYTREE . " (version 3)</h4>";

echo "<div class='row'>";

include("arbre-v3.php");

echo "</div>";

/* ----- */
/* notes */
/* ----- */

echo "<h4>" . NOTE . "</h4>";

if (empty ( $individu->note )) {
	echo NONOTE . "<br /><br />";
} else {
	echo "<ul>";
	echo "<li>" . $individu->note . "</li>";
	echo "</ul><br /><br />";
}
?>