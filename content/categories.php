<?php

/* ---------------------------- */
/* PREPARATION DE LA PAGINATION */
/* ---------------------------- */

/* Pour le test, 5 articles par page. Cette valeur est en réalité dans la table option */

/* Nombre d'articles par page */

$messagesParPage = NombreArticlePage($pdo2);

/* ici on compte le nombre d'articles total */

$sql = "SELECT * FROM articles WHERE publication='1' and id_cat = '" . $_GET ['id'] . "' ORDER BY date DESC";
$req = $pdo2->prepare ($sql);
$req->execute ();
$total = $req->rowCount ();

/* On peut en déduire le nombre d'articles par page */

$ndp=ceil($total/$messagesParPage);

/* Page en cours... */

if(isset($_GET['pg'])) 
	{
	$pa=intval($_GET['pg']);
	
	if($pa>$ndp) 
		{
		$pa=$ndp;
		}
	}
else
	{
	$pa=1; 
	}

$premiereEntree=($pa-1)*$messagesParPage;

/* ---------------------------------- */
/* LISTE DES ARTICLES D'UNE CATEGORIE */
/* ---------------------------------- */

$sqlCategories = "SELECT * FROM articles WHERE publication='1' and id_cat = '" . $_GET ['id'] . "' ORDER BY date DESC";
$reqCategories = $pdo2->prepare( $sqlCategories);
$reqCategories ->execute();

$reqCategories  = $pdo2->query ( $sqlCategories . ' LIMIT '.$premiereEntree.', '.$messagesParPage.' ');

while ($row = $reqCategories ->fetch(PDO::FETCH_ASSOC)) 
	{
	$article = new articles();
	$commentaire = new Commentaires();
	
	/* ref de l'article */
	
	$article->ref = $row['ref'];
	
	/* TODO : Pour l'instant récupérer les comms semble servir à rien
	
	$req_comms = "select * from commentaires where id_article='{$article->ref}'";
	$res_comms = $pdo2->prepare($req_comms);
	$res_comms->execute();
	
	 */
	
	/* auteur de l'article */
		
	$sqlAuteur = $pdo2->prepare("select * from membres where id=:id");
	$sqlAuteur->bindValue("id", $row['auteur'], PDO::PARAM_INT );
	$sqlAuteur->execute();
	
	while ($data_membres = $sqlAuteur->fetch(PDO::FETCH_ASSOC)) 
		{
		$article->auteur = $data_membres['login'];
		}
		
	/* titre de l'article */
	
	$article->titre = $row['titre'];
	
	/* date de l'article */
	
	if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $row ['date'] )) {
		$article->date = substr ( $row ['date'], 8, 2 ) . " " . MoisEnLettres(substr ( $row ['date'], 5, 2 )) . " " . substr ( $row ['date'], 0, 4 );
	}
	
	/* catégorie de l'article */
	
	$article->categorie = $_GET['id'];
	
	/* contenu de l'article */
	
	$article->contenu = $row['article'];
	
	/* contenu de l'article */
	
	$article->Afficher($pdo2);
	$commentaire->AfficheLien($article->ref, $pdo2);
	
	}

/* -------------------------- */
/* AFFICHAGE DE LA PAGINATION */
/* -------------------------- */

?>

<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    
  	<?php 
      
   	/* bouton "page précédente" */
      
    if ($pa >= 2)
      	{
      	$i = $pa - 1;
      	echo '<li class="page-item"><a class="page-link" href="index.php?page=categories&pg='.$i.'">
        &laquo;</a></li>';
      	}
    else 
      	{
      	echo '<li class="page-item disable"><span class="page-link" href="#">
        &laquo;</span></li>';
      	}
      	
    /* boutons avec les numéros des pages */  	
      
    for($i=1; $i<=$ndp; $i++) 
		{
		if($i==$pa)
			{
		    echo '<li class="page-item active"><span class="page-link">'.$i.'</span></li>';
		    }    
		else
		    {
		    echo '<li class="page-item"><a class="page-link" href="index.php?page=categories&pg='.$i.'">'.$i.'</a></li>';
		    }
		}
      
    /* bouton "page suivante" */
         
	if ($pa < $ndp)
      	{
      	$i = $pa + 1;
      	echo '<li class="page-item"><a class="page-link" href="index.php?page=categories&pg='.$i.'">
        &raquo;</a></li>';
      	}
    else 
      	{
      	echo '<li class="page-item disable"><span class="page-link" href="#">
        &raquo;</span></li>';
      	}
      
    ?>
   
  </ul>
</nav>