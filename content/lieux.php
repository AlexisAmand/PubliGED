
<h3><?php echo $GLOBALS['InfoPage']->titre; ?></h3>

<?php

if (VerifGedcom ( $pdo2 ) == "1") {
	$sqlPays = "SELECT * FROM lieux GROUP BY pays";

	$reqPays = $pdo2->prepare ($sqlPays);
	$reqPays->execute ();

	while ($data_pays = $reqPays->fetch(PDO::FETCH_ASSOC)) {
		echo "<ul>";
		echo "<li>".utf8_decode($data_pays ['pays'])."</li>";

		$sqlDep = "SELECT * FROM lieux WHERE pays = '{$data_pays['pays']}' GROUP BY dep";
		$reqDep = $pdo2->prepare($sqlDep);
		$reqDep->execute();

		echo "<ul>";
		while ($data_dep = $reqDep->fetch(PDO::FETCH_ASSOC)) {
			echo "<li>".utf8_decode($data_dep['dep'])."</li>";

			$sqlVille = "SELECT * FROM lieux WHERE dep = '{$data_dep['dep']}' GROUP BY ville";
			$reqVille = $pdo2->prepare($sqlVille);
			$reqVille->execute ();
			echo "<ul>";
			while ($data_ville = $reqVille->fetch(PDO::FETCH_ASSOC)) {
				echo "<li><a href='index?page=lieuxpatro&id=".$data_ville ['ref']."'>".$data_ville ['ville']."</a></li>";
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
	