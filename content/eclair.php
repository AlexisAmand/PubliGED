<?php

/* ------------ */
/* LISTE ECLAIR */
/* ------------ */

?>

<h3><?php echo TITRE_RUB_10; ?></h3>

<?php 

$sql = "SELECT * FROM individus I, evenements E, lieux L WHERE I.ref = E.n_indi AND E.lieu = L.ref";
$req2 = $pdo2->query ($sql );

if (VerifGedcom ( $pdo2 ) == "1")
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
		while ( $data2 = $req2->fetch () )
		{
			echo "<tr>";
			echo "<td><a href='index.php?page=liste_patro&nom=" . $data2 ['surname'] . "'>" . $data2 ['surname'] . "</a></td>";
			echo "<td>" . $data2 ['ville'] . "</td>";
			echo "<td>" . $data2 ['region'] . "</td>";
			echo "<td>" . $data2 ['pays'] . "</td>";
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