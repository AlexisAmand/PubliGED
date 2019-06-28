  	<?php 
	
	/* -------------------- */
	/* LISTE DES EVENEMENTS */
	/* -------------------- */
	
	?>
  	 	
  	<h3><?php echo TITRE_RUB_12; ?></h3>

	<?php
	
	if(VerifGedcom($pdo2) == "1")
		{
	
		/* fonction qui affiche le lieu d'un événement */
		function lieu2($pdo2, $lieueve) {
			$result_birt_lieu = "SELECT * FROM lieux WHERE ref = '{$lieueve}'";
			$req_lieu = $pdo2->prepare ( $result_birt_lieu );
			$req_lieu->execute ();
			
			$count = $req_lieu->rowCount ();
			
			if ($count == 0) {
				/* si un lieu existe pas */
				echo "<td>lieu inconnu</td>";
			} else {
				/* si un lieu existe */
				
				while ( $row_birt_lieu = $req_lieu->fetch ( PDO::FETCH_ASSOC ) ) {
					
					$ville = explode ( " ", $row_birt_lieu ['ville'] );
					/* echo utf8_decode ( $row_birt_lieu ['ville'] ) . " (" . $row_birt_lieu ['dep'] . " - " . $row_birt_lieu ['pays'] . ")"; */
					
					echo "<td>".$row_birt_lieu ['ville'] . "<br />(" . $row_birt_lieu ['dep'] . " - " . $row_birt_lieu ['pays'] . ")</td>";
		
					if (empty ( $row_birt ['note'] )) {
					} else {
						echo "<sup>" . $i_note . "</sup>";
						$note [$i_note] = $row_birt ['note'];
						$i_note = $i_note + 1;
					}
				}
			}
		}
		
		$req_eve = "SELECT * FROM evenements ORDER BY date";
		$req = $pdo2->prepare ( $req_eve );
		$req->execute ();
		
		echo '<div class="table-responsive">';
		
		echo "<table class='table table-bordered' id ='dataTable'>";
		echo "<thead>";
		echo "<tr><th>".EVEDATE."</th>";
		echo "<th>".EVELIEU."</th>";
		echo "<th>".EVETYPE."</th>";
		echo "<th>".EVESOURCE."</th>";
		echo "<th>".EVENOTE."</th>";
		echo "</tr></thead>";
		
		echo "<tfoot>";
		echo "<tr><th>".EVEDATE."</th>";
		echo "<th>".EVELIEU."</th>";
		echo "<th>".EVETYPE."</th>";
		echo "<th>".EVESOURCE."</th>";
		echo "<th>".EVENOTE."</th>";
		echo "</tr></tfoot>";
		
		echo '<tbody>';
		
		while ( $data = $req->fetch () ) 
		   {
		   echo "<tr>"; 	
		   echo "<td style='white-space: nowrap;'>".$data['date']."</td>";
		   echo "".lieu2($pdo2, $data['lieu'])."";
		   echo "<td>".traduction($data['nom'])."</td>";
		   echo "<td><a href='index.php?page=sources&ids=".$data['source']."'>".$data['source']."</a></td>";
		   echo "<td>".$data['note']."</td>";
		   echo "</tr>";	
		   }
		
		echo '</tbody>';
		   
		echo "</table>";
		
		echo "</div>";
		}
	else
		{
		echo NO_GEDCOM;
		}
	?>

   