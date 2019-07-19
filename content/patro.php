	<?php 
	
	/* -------------------- */
	/* LISTE DES PATRONYMES */
	/* -------------------- */
	
	?>
	
	<h3><?php echo $GLOBALS['InfoPage']->titre; ?></h3>

	<?php
				
	if(VerifGedcom($pdo2) == "1")
		{
					
		$alphabet = range ( 'A', 'Z' );
		$i = 0;
	
	    foreach ( $alphabet as $val ) 
		   {
		
		   $result_birt_lieu = "SELECT * FROM individus WHERE surname LIKE '{$val}%' GROUP BY surname";
		   $req_lieu = $pdo2->prepare ( $result_birt_lieu );
		   $req_lieu->execute ();
		
		   $count = $req_lieu->rowCount ();
			
		   if ($count == 0) 
		       {
			   $i ++;
			   } 
		   else 
			   {
			   echo "<h4>" . $alphabet [$i] . "</h4>";
						
			   while ( $data_patro = $req_lieu->fetch () ) 
			      {
				        
				  /* affichage du nom avec un lien qui affiche la liste des individus qui ont ce nom */
				  echo "<a href='index.php?page=liste_patro&nom=" . urlencode ( $data_patro ['surname'] ) . "'>" . $data_patro ['surname'] . "</a>";
					
				  /* affichage du nombre d'occurence du nom */
				  $data_patro ['surname'] = addslashes ( $data_patro ['surname'] );
				
				  $req_nb_occ = $pdo2->query ( "SELECT * FROM individus WHERE surname = '{$data_patro['surname']}'" );
							
				  echo " (" . $req_nb_occ->rowCount () . ")<br>";
				  
				  }
				$i ++;
			    }
	        }
	
		}
	else 
		{
		echo NO_GEDCOM;
		}
	     
	?>     