<?php 
	
/* ----------------------- */
/* STATISTIQUES DE LA BASE */
/* ----------------------- */

?>
	
<h3><?php echo $GLOBALS['InfoPage']->titre; ?></h3>
	
<?php

$BaseDeDonnees = new BasesDeDonnees;
		
if(VerifGedcom($pdo2) == "1")
	{
	
	/* valeur du top */

	$top = $BaseDeDonnees->Top($pdo2);

	/* nombre d'enfant par couple */
		
	$EnfantCouple = $BaseDeDonnees->NombreEnfants($pdo2) / $BaseDeDonnees->NombreCouples($pdo2);
		
	?>
					
	<table class='table table-bordered'>
		<tr>
			<td><?php echo NB_NAME; ?></td>
			<td><?php echo "<a href='index.php?page=patro'>".$BaseDeDonnees->NombrePatro($pdo2)."</a>"; ?></td>
		</tr>	    
		<tr>
			<td><?php echo NB_PEOPLE; ?></td>
			<td><?php echo "<a href='index.php?page=liste_individu.php&l=A'>".$BaseDeDonnees->NombreIndividu($pdo2)."</a>"; ?></td>
		</tr>
		<tr>
			<td><?php echo NB_MAN; ?></td>
			<td><?php echo $BaseDeDonnees->NombreHommes($pdo2); ?></td>
		</tr>
		<tr>
			<td><?php echo NB_WOMAN; ?></td>
			<td><?php echo $BaseDeDonnees->NombreFemmes($pdo2); ?></td>
		</tr>
		<tr>
			<td><?php echo NB_UK; ?></td>
			<td><?php echo $BaseDeDonnees->NombreIndividu($pdo2) - $BaseDeDonnees->NombreHommes($pdo2) - $BaseDeDonnees->NombreFemmes($pdo2); ?></td>
		</tr>
		<tr>
			<td><?php echo NB_EVE; ?></td>
			<td><?php echo "<a href='index.php?page=eve'>".$BaseDeDonnees->NombreEvenements($pdo2)."</a>"; ?></td>
		</tr>
		<tr>
			<td><?php echo NB_SRC; ?></td>
			<td><?php echo "<a href='index.php?page=sources'>".$BaseDeDonnees->NombreSources($pdo2)."</a>"; ?> </td>
		</tr>
		<tr>
			<td><?php echo NB_MEDIA; ?></td>
			<td><?php echo "<a href='index.php?page=images'>TODO</a>"; ?> </td> <?php  /* TODO: nombre de médias */ ?>
		</tr>
		<tr>
			<td><?php echo NB_SOSA; ?></td>
			<td><?php echo "<a href='index.php?page=sosa'>TODO</a>"; ?> </td> <?php  /* TODO: nombre de sosa */ ?>
		</tr>
		<tr>
			<td><?php echo NB_CHILD; ?></td>
			<td><?php echo round($BaseDeDonnees->NombreEnfants($pdo2), 1); ?></td>
		</tr>
		<tr>
			<td><?php echo NB_FAM; ?></td>
			<td><?php echo $BaseDeDonnees->NombreFamilles($pdo2); ?></td> 
		</tr>
		<tr>
			<td><?php echo NB_PLACE; ?></td>
			<td><?php echo "<a href='index.php?page=lieux'>".$BaseDeDonnees->NombreLieux($pdo2)."</a>"; ?></td>
		</tr>
		<tr>
			<td><?php echo NB_OLD; ?></td>
			<td><?php echo "<a href='#'>TODO</a>"; ?></td> <?php  /* TODO */ ?>
		</tr>
		<tr>
			<td><?php echo NB_CHILD_R; ?></td>
			<td><?php echo "<a href='#'>TODO</a>"; ?></td> <?php  /* TODO */ ?>
		</tr>
		<tr>
			<td><?php echo NB_UNION_R; ?></td>
			<td><?php echo "<a href='#'>TODO</a>"; ?></td> <?php  /* TODO */ ?>
		</tr>
		<tr>
			<td><?php echo NB_UNION; ?></td>
			<td><?php echo "<a href='#'>".$BaseDeDonnees->NombreCouples($pdo2)."</a>"; ?></td>
		</tr>
		<tr>
			<td><?php echo NB_OLD_R; ?></td>
			<td><?php echo "<a href='#'>TODO</a>"; ?></td> <?php  /* TODO */ ?>
		</tr>
	</table>
		
	<div class="stats left">
		
		<h3><?php echo TOP." ".$top." ".TOP_SURNAME; ?></h3>
			
		<table class='table table-bordered'>
			<thead>
		 		<tr>
			    	<th><?php echo TAB_TOP_SURNAME; ?></th>
			        <th><?php echo TAB_TOP_QUANTITY; ?></th>
			    </tr>
			</thead>
			    	
			<?php 
			
			$req_stat = "SELECT surname,count(*) FROM `individus` GROUP BY surname ORDER BY COUNT(*) DESC LIMIT 0,".$top; 
			$resultat_stat = $pdo2->prepare ($req_stat);
			$resultat_stat->execute ();
			
			while ( $row_stat = $resultat_stat->fetch (PDO::FETCH_ASSOC) )
			{
				echo "<tr>";
			    echo "<td>".$row_stat['surname']."</td>";
			    echo "<td>".$row_stat['count(*)']."</td>";
			    echo "</tr>";
			}
			   
			?>
		
		</table>
		
	</div>
		
	<div class="stats right">
		
		<h3><?php echo TOP." ".$top." ".TOP_NAME; ?></h3>
			
			<table class='table table-bordered'>
			
				<thead>
			        <tr>
			            <th><?php echo TAB_TOP_NAME; ?></th>
			            <th><?php echo TAB_TOP_QUANTITY; ?></th>
			        </tr>
			    </thead>
			    	
			<?php 
			
			$req_stat = "SELECT prenom,count(*) FROM `individus` GROUP BY prenom ORDER BY COUNT(*) DESC LIMIT 0,".$top; 
			$resultat_stat = $pdo2->prepare ($req_stat);
			$resultat_stat->execute ();
			
			while ( $row_stat = $resultat_stat->fetch (PDO::FETCH_ASSOC) )
			   {
			       echo "<tr>";
			       echo "<td>".$row_stat['prenom']."</td>";
			       echo "<td>".$row_stat['count(*)']."</td>";
			       echo "</tr>";
			   }
			   
			?>
		
			</table>
		
	</div>  
		
	<?php
	
	}
else
	{
	echo NO_GEDCOM;
	}
		
?>	