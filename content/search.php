<?php

/* ------------------------------- */
/* FAIRE UNE RECHERCHE SUR LE BLOG */
/* ------------------------------- */

/* TODO : Le fil d'ariane */

?>

<h3><?php echo RESULT; ?></h3>

<?php

/*
echo "<a href='index.php?page=search&type=1&recherche=".$_GET['recherche']."'>articles</a><br />";
echo "<a href='index.php?page=search&type=2&recherche=".$_GET['recherche']."'>gedcom</a><br />";
*/

if (isset ( $_GET['recherche']))
	{

	// echo "Votre recherche: ".$_GET['recherche'] . "<br />";

	switch($_GET['type'])
		{
		/* recherche dans les articles du blog */
		case '1':
		
			$sqlArticles = $pdo2->prepare ( "SELECT * FROM articles WHERE article LIKE '%" . $_GET['recherche'] . "%' OR titre LIKE '%" . $_GET['recherche'] . "%'" );
			$sqlArticles->execute ();
			$nbSearchArticles = $sqlArticles->rowCount ();
		
			if ($nbSearchArticles != 1)
				{
				echo "<p class='alert alert-info'>" . THEREIS . $nbSearchArticles . NB_RESULTS . $_GET['recherche'] . "</p>";
				} 
			else 
				{
				echo "<p class='alert alert-info'>" . THEREIS . $nbSearchArticles . NB_RESULT . $_GET['recherche'] . "</p>";
				}

			while ( $row = $sqlArticles->fetch (PDO::FETCH_ASSOC) ) 
				{
				echo "<a href='" . URL_SITE . "index.php?page=article&id=" . $row ['ref'] . "'>" . $row ['titre'] . "</a><br />";
				$rest = substr ( $row ['article'], 0, 250 );
				echo $rest . "...<br/><br/>";
				}
			
			break;

		/* Recherche dans parmi les individus */	
		case '2':
				
			$sqlIndividu = $pdo2->prepare ( "SELECT * FROM individus WHERE nom LIKE '%" . $_GET['recherche'] . "%' OR prenom LIKE '%" . $_GET['recherche'] . "%'" );
			$sqlIndividu->execute ();
			$nbSearchIndividus = $sqlIndividu->rowCount();
	
			if ($nbSearchIndividus != 1)
				{
				echo "<p class='alert alert-info'>" . THEREIS . $nbSearchIndividus . NB_RESULTS . $_GET['recherche'] . "</p>";
				} 
			else 
				{
				echo "<p class='alert alert-info'>" . THEREIS . $nbSearchIndividus . NB_RESULT . $_GET['recherche'] . "</p>";
				}
					
			while ( $row = $sqlIndividu->fetch (PDO::FETCH_ASSOC) ) 
				{
				echo "<a href='" . URL_SITE . "index.php?page=fiche&ref=" . $row ['ref'] . "'>" . $row ['nom'] . " ". $row ['prenom']."</a><br />";
				echo "...<br/><br/>";
				}

			break;

		/* Recherche dans parmi les lieux */
		case '3':

			$sqlLieux = $pdo2->prepare ( "SELECT * FROM lieux WHERE ville LIKE '%" . $_GET['recherche'] . "%' OR dep LIKE '%" . $_GET['recherche'] . "%'" );
			$sqlLieux->execute ();
			$nbSearchLieux = $sqlLieux->rowCount();

			if ($nbSearchLieux != 1)
				{
				echo "<p class='alert alert-info'>" . THEREIS . $nbSearchLieux . NB_RESULTS . $_GET['recherche'] . "</p>";
				} 
			else 
				{
				echo "<p class='alert alert-info'>" . THEREIS . $nbSearchLieux . NB_RESULT . $_GET['recherche'] . "</p>";
				}
					
			while ( $row = $sqlLieux->fetch (PDO::FETCH_ASSOC) ) 
				{
				echo "<a href='" . URL_SITE . "index.php?page=lieuxpatro&id=".$row ['ref'] . "'>".$row['ville']."</a><br />";
				echo "...<br/><br/>";
				}

			break;

		/* Recherche todo */
		case '4':
			echo SEARCH_4;
			break;
		default:
			echo SEARCH_ERROR;
			}
	}

?>