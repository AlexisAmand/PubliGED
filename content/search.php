

	<h3><?php echo RESULT; ?></h3>

	<?php

	if (isset($_POST['recherche']))   
	   {
	   // echo "Votre recherche: ".$_POST['recherche'] . "<br />";
       
	   $sql = $pdo2->prepare ( "SELECT * FROM articles WHERE article LIKE '%" . $_POST['recherche'] . "%' OR titre LIKE '%" . $_POST['recherche'] . "%'" );
	   $sql->execute();   
	   $nbsearch = $sql->rowCount();
	   if ($nbsearch != 1)
	       {
	           echo "<p class='alert alert-info'>".THEREIS.$nbsearch.NB_RESULTS.$_POST['recherche']."</p>";
	       }
	   else
	       {
	           echo "<p class='alert alert-info'>".THEREIS.$nbsearch.NB_RESULT.$_POST['recherche']."</p>";
	       }
	   	   
	   while ( $row = $sql->fetch () ) 
	       {
           echo "<a href='" . URL_SITE . "index.php?page=article&id=" . $row ['ref'] . "'>" . $row ['titre'] . "</a><br />";		  
		   $rest = substr($row ['article'], 0, 250);
		   echo $rest."...<br/><br/>";
		   }	     
	   }
	 else
	   {
	   echo "Pas de de recherche !";    
	   }

	?>
	
    