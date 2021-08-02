<?php

/* ------------ */
/* LISTE ECLAIR */
/* ------------ */

?>

<h3><?php echo $GLOBALS['Page']->titre; ?></h3>

<?php 

$sqlListeEclair = "SELECT * FROM individus I, evenements E, lieux L WHERE I.ref = E.n_indi AND E.lieu = L.ref";
$reqListeEclair = $pdo2->query($sqlListeEclair);

if (VerifGedcom($pdo2) == "1")
	{
	?>	
		<div class="table-responsive">
			
			<table class="table table-bordered" id="dataTable">
					
			<thead>
			<tr>
				<th><?php echo LIST_NAME; ?></th>
				<th><?php echo LIST_PLACE; ?></th>
				<th><?php echo LIST_REGION; ?></th>
				<th><?php echo LIST_COUNTRY; ?></th>
			</tr>
			</thead>
					
			<tfoot>
			<tr>
				<th><?php echo LIST_NAME; ?></th>
				<th><?php echo LIST_PLACE; ?></th>
				<th><?php echo LIST_REGION; ?></th>
				<th><?php echo LIST_COUNTRY; ?></th>
			</tr>
			</tfoot>	
				
			<tbody>		
			<?php
			while ($rowListeEclair = $reqListeEclair->fetch(PDO::FETCH_ASSOC))
				{
				echo "<tr>";
					echo "<td><a href='index.php?page=liste_patro&nom=".$rowListeEclair['surname']."'>".$rowListeEclair['surname']."</a></td>";
					echo "<td>".$rowListeEclair['ville']."</td>";
					echo "<td>".$rowListeEclair['region']."</td>";
					echo "<td>".$rowListeEclair['pays']."</td>";
				echo "</tr>";
				}		
			?>			
			</tbody>
			
			</table>
			
		</div>
	<?php 
	} 
else 
	{
	echo NO_GEDCOM;
	}
	
?>