<?php 
	
/* ----------------------- */
/* STATISTIQUES DE LA BASE */
/* ----------------------- */

?>
	
<h3><?php echo $GLOBALS['InfoPage']->titre; ?></h3>
	
<?php
		
if(VerifGedcom($pdo2) == "1")
{
	
	/* valeur du top */
		
	$req_nb_patro = "SELECT * FROM configuration WHERE nom = 'top'";
	$req_top = $pdo2->prepare ( $req_nb_patro );
	$req_top->execute ();
		
	while (($row = $req_top->fetch(PDO::FETCH_ASSOC)))
	{
		$top = $row['valeur'];	    
    }
		
	/* nombre d'individus */
		
	$requete = "SELECT * FROM individus";
	$req = $pdo2->prepare ( $requete );
	$req->execute ();
	$TotalIndividu = $req->rowCount ();
		
	/* nombre de patros */
		
	$req_nb_patro = "SELECT distinct surname FROM individus";
	$req = $pdo2->prepare ( $req_nb_patro );
	$req->execute ();
	$TotalPatro = $req->rowCount ();
		
	/* nombre d'événements */
		
	$req_nb_eve = "SELECT * FROM evenements";
	$req = $pdo2->prepare ( $req_nb_eve );
	$req->execute ();
	$TotalEve = $req->rowCount ();
		
	/* nombre de sources */
		
	$req_nb_src = "SELECT * FROM sources";
	$req = $pdo2->prepare ( $req_nb_src );
	$req->execute ();
	$TotalSrc = $req->rowCount ();
	
	/* nombre de lieux */
		
	$req_nb_lieu = "SELECT * FROM lieux GROUP BY ville";
	$req = $pdo2->prepare ( $req_nb_lieu );
	$req->execute ();
	$TotalLieu = $req->rowCount ();
		
	/* nombre d'hommes */
		
	$req_nb_patro = "SELECT * FROM individus WHERE sex LIKE '%M%'";
	$req = $pdo2->prepare ( $req_nb_patro );
	$req->execute ();
	$TotalHomme = $req->rowCount ();
		
	/* nombre de femmes */
		
	$req_nb_patro = "SELECT * FROM individus WHERE sex LIKE '%F%'";
	$req = $pdo2->prepare ( $req_nb_patro );
	$req->execute ();
	$TotalFemme = $req->rowCount ();
		
	/* nombre de famille */
		
	$req_famille = "SELECT * FROM familles group by pere,mere";
	$req = $pdo2->prepare ( $req_famille );
	$req->execute ();
	$TotalFamille = $req->rowCount ();
		
	/* genre inconnu */
		
	$GenreInconnu = $TotalIndividu - $TotalFemme - $TotalHomme;
		
	/* nombre d'enfants */
		
	$req_nb_enfant = "SELECT distinct enfant FROM familles";
	$req = $pdo2->prepare ( $req_nb_enfant );
	$req->execute ();
	$TotalEnfant = $req->rowCount ();
		
	/* nombre de couple */
		
	$req_nb_couple = "SELECT distinct pere, mere FROM familles";
	$req = $pdo2->prepare ( $req_nb_couple );
	$req->execute ();
	$TotalCouple = $req->rowCount ();
		
	/* nombre d'enfant par couple */
		
	$EnfantCouple = $TotalEnfant / $TotalCouple;
		
?>
				
<table class='table table-bordered'>
	<tr>
		<td><?php echo NB_MAN; ?></td>
		<td><?php echo $TotalHomme; ?></td>
	</tr>
	<tr>
		<td><?php echo NB_WOMAN; ?></td>
		<td><?php echo $TotalFemme; ?></td>
	</tr>
	<tr>
		<td><?php echo NB_UK; ?></td>
		<td><?php echo $GenreInconnu; ?></td>
	</tr>
	<tr>
		<td><?php echo NB_NAME; ?></td>
		<td><?php echo "<a href='index.php?page=patro'>".$TotalPatro."</a>"; ?></td>
	</tr>	    
	<tr>
		<td><?php echo NB_PEOPLE; ?></td>
		<td><?php echo "<a href='index.php?page=liste_individu.php&l=A'>".$TotalIndividu."</a>"; ?></td>
	</tr>
	<tr>
		<td><?php echo NB_EVE; ?></td>
		<td><?php echo "<a href='index.php?page=eve'>".$TotalEve."</a>"; ?></td>
	</tr>
	<tr>
		<td><?php echo NB_SRC; ?></td>
		<td><?php echo "<a href='index.php?page=sources'>".$TotalSrc."</a>"; ?> </td>
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
		<td><?php echo round($EnfantCouple, 1); ?></td>
	</tr>
	<tr>
		<td><?php echo NB_FAM; ?></td>
		<td><?php echo $TotalFamille; ?></td> 
	</tr>
	<tr>
		<td><?php echo NB_PLACE; ?></td>
		<td><?php echo "<a href='index.php?page=lieux'>".$TotalLieu."</a>"; ?></td>
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
		<td><?php echo "<a href='#'>".$TotalCouple ."</a>"; ?></td>
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
		
		while ( $row_stat = $resultat_stat->fetch () )
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
		
		while ( $row_stat = $resultat_stat->fetch () )
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