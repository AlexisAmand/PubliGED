<?php 

/* -------------------- */
/* LISTE DES EVENEMENTS */
/* -------------------- */

?>
  	 	
<h3><?php echo $GLOBALS['Page']->titre; ?></h3>
  	
<?php

if(VerifGedcom($pdo2) == "1")
	{
	
	$sqlEvenements = "SELECT * FROM evenements ORDER BY date";
	$reqEvenements = $pdo2->prepare($sqlEvenements);
	$reqEvenements->execute ();
	
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
	
	while ( $row = $reqEvenements->fetch(PDO::FETCH_ASSOC) ) 
	   {
	   echo "<tr>"; 	
	   echo "<td style='white-space: nowrap;'>".utf8_decode($row['date'])."</td>";	   	   
	   echo "<td>".lieu($pdo2, $row['lieu'])."</td>";
	   echo "<td>".traduction($row['nom'])."</td>";
	   echo "<td><a href='index.php?page=sources&ids=".$row['source']."'>".$row['source']."</a></td>";
	   echo "<td>".$row['note']."</td>";
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