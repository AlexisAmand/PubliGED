<h3><?php echo $GLOBALS['Page']->titre; ?></h3>

<?php

if (VerifGedcom( $pdo2 ) == "1") 
	{

	/* récupération de la liste des lieux */

	$reqLieux = $pdo2->query ("SELECT * FROM lieux");

	while ( $dataLieu = $reqLieux->fetch ( PDO::FETCH_ASSOC ) ) 
		{
			/* Pour chaque ville, on récupére la liste des patros */

			echo "<h4 class='mt-4'>" . $dataLieu['ville']. "</h4>";
		
			$req = $pdo2->query ( "select * from individus, evenements, lieux where evenements.lieu = '" . $dataLieu['ref'] . "' and evenements.n_indi = individus.ref group by individus.surname" );
		
			while ( $data = $req->fetch ( PDO::FETCH_ASSOC ) ) 
				{
				echo "<a href='index.php?page=liste_patro&nom=" . urlencode ( $data ['surname'] ) . "'>" . $data ['surname'] . "</a><br />";
				}
	
		}
	} 
	else 
	{
	echo NO_GEDCOM;
	}

?>  