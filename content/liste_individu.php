	<h3><?php echo TITRE_RUB_8; ?></h3>

	<?php
	
	if(VerifGedcom($pdo2) == "1")
		{
		
		if (isset($_GET ['l']))
		   {
		       
		   $lettre = $_GET ['l'];
		   
		   $req = "SELECT * FROM individus where surname LIKE '{$lettre}%' ORDER BY surname, prenom";
		   $resultat = $pdo2->prepare($req);
		   $resultat->execute();
		   
		   $total = $resultat->rowCount ();
		   
		   }
		else 
		   {
		       
		   /*
		      
		   $req3 = "SELECT *, min(surname) FROM individus";
		   $resultat3 = $pdo->prepare($req3);
		   $resultat3->execute();
		   
		   while ( $row3 = $resultat3->fetch () )
		       {
	
		       echo $row3 ['surname'] . " " . $row3 ['prenom'] . "<br />";
	
		       }
		   
		   */
		       
		   }
				
		/* Lettres */
			
		echo "<div class='alpha'><ul>";
		
		foreach ( range ( 'A', 'Z' ) as $i )
		{
		    $req2 = "SELECT * FROM individus where surname LIKE '{$i}%' ORDER BY surname, prenom";
		    $resultat2 = $pdo2->prepare($req2);
		    $resultat2->execute();
		    $total2 = $resultat2->rowCount ();
		    
		    if ($total2 != 0)
		    {
		        echo "<li><a href='index.php?page=liste_individu.php&l=" . $i . "'>" . $i . "</a></li>";
		    }
		    else
		    {
		        echo "<li class='text-muted'>" . $i . "</li>";
		    }
		}
		
		echo "</ul></div>";
			
		/* parametres pagination */
		
		
		$NombreResultatsParPage = recup_page($pdo2);
		
		if (isset($_GET['id']))
		{
		    $page = $_GET ['id'];
		    $i = $page - 1;
		    $max = $NombreResultatsParPage * $i;
		}
		else
		{
		    $page = 1;
		    $max = 0;
		}
		   	   	
		$nb_pages = $total / $NombreResultatsParPage;
		
		/* affichage des prénoms */
			
		$sql = $pdo2->query ( $req . " LIMIT " . $max . ",".$NombreResultatsParPage );
		
		while ( $row = $sql->fetch () )
			{
			echo "<a href='index.php?page=fiche&ref=" . $row ['ref'] . "'>";
			echo $row ['surname'] . " " . $row ['prenom'] . "<br />";
			echo "</a>";
			}
			
		/* affichage pagination */
				
		echo "<ul class='pagination justify-content-center'>";
		for($i = 1; $i <= $nb_pages + 1; $i ++)
			{
		    if (($page==$i))
		       {
			   echo "<li class='disabled page-item'><a   class='page-link' href='index.php?page=liste_individu&id=" . $i . "&l=".$_GET ['l']."' class='active'>" . $i . "</a></li>";
			   }
			else
			   {
			   echo "<li class='page-item'><a  class='page-link' href='index.php?page=liste_individu&id=" . $i . "&l=".$_GET ['l']."'>" . $i . "</a></li>";
			   }
			}	    		
		echo "</ul>";
		}
	else
		{
		echo NO_GEDCOM;
		}
	?>