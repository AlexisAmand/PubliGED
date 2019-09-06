<?php

/* ---------------------------------- */
/* LISTE DES ARTICLES D'UNE CATEGORIE */
/* ---------------------------------- */

$sqlCategories = "SELECT * FROM articles WHERE id_cat = '" . $_GET ['id'] . "' ORDER BY date DESC";
$reqCategories = $pdo2->prepare( $sqlCategories);
$reqCategories ->execute();

/* pagination */

$total = $reqCategories ->rowCount ();
$nrpp = 3; /* TODO : nombre d'articles par page, devra être récupérer via l'admin */

$nb_pages = round($total / $nrpp);

if (isset ( $_GET ['p'] ))
{
	$page = $_GET ['p'];
	if ($page > $nb_pages)
	{
		$page = $nb_pages;
	}
}
else
{
	$page = 1;
}

$max = 	($page - 1 ) * $nrpp;

/* fin pagination */

$reqCategories  = $pdo2->query ( $sqlCategories . " LIMIT " . $max . "," . $nrpp );

while ($row = $reqCategories ->fetch(PDO::FETCH_ASSOC)) 
	{
	$article = new articles();
	$commentaire = new commentaires();
	
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
	
	/* pagination */
	
	echo "<ul class='pagination justify-content-center'>";
	
	if ($page == 1)
	{
		echo "<li class='page-item disabled'><a class='page-link' href='#'>Précédent</a></li>";
	}
	else
	{
		$p = $page - 1;
		echo "<li class='page-item'><a class='page-link' href='index?page=categories&id=".$_GET['id']."&p=".$p."'>Précédent</a></li>";
	}
	
	if ($page == $nb_pages)
	{
		echo "<li class='page-item disabled'><a class='page-link' href='#'>Suivant</a></li>";
	}
	else
	{
		$p = $page + 1;
		echo "<li class='page-item'><a class='page-link' href='index?page=categories&id=".$_GET['id']."&p=".$p."'>Suivant</a></li>";
	}
	
	echo "</ul>";
	
	/* fin pagination */
		
	
?>