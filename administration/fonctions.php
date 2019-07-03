<?php

/* fonction qui récupére les infos de la page à afficher */
function PageTop($pdo2) {
	if (isset ( $_GET ['page'] )) {
		$PageToShow = $_GET ['page'];
	} else {
		header ( 'Location: index.php?page=blog' );
	}
	
	/* récupération de la page à afficher */
	
	$sql = "select * from pages where nom = :nom";
	$resultat = $pdo2->prepare ( $sql );
	$resultat->bindParam ( ':nom', $PageToShow );
	$resultat->execute ();
	
	$nb = $resultat->rowCount ();
	
	/* On vérifie si la page demandée existe. Si elle n'existe pas, on redirige vers le blog */
	
	if ($nb != 0) {
		$page = new pages ();
		
		while ( $row = $resultat->fetch () ) {
			$page->nom = $row ['nom'];
			$page->titre = $row ['titre'];
			
			/* TODO: pour la balise meta description */
			/* il pourrait s'agir d'un champ dans la table article qui serait récupéré */
			
			$page->description = $row ['description'];
			
			/* rubrique pour le fil d'ariane, entre les deux / */
		}
	} else {
		header ( 'Location: index.php?page=blog' );
	}
	
	return $page;
}
/* fonction qui récupére le nom d'un auteur en partant de son numéro */

function RecupAuteurArticle($pdo2, $idAuteur) {
	$res_membres = $pdo2->prepare ( "select * from membres where id=:id" );
	$res_membres->bindValue ( "id", $idAuteur, PDO::PARAM_INT );
	$res_membres->execute ();
	
	while ( $data_membres = $res_membres->fetch () )
	{
		$idAuteur = $data_membres ['login'];
	}
	return $idAuteur;
}

/* fonction qui récupére le titre d'un article à partir de son numéro */

function RecupTitreArticle($pdo2, $a) {
	$res = $pdo2->prepare ( "SELECT * FROM articles WHERE ref = :ref" );
	$res->bindparam ( ':ref', $a );
	$res->execute ();

	while ( ($row = $res->fetch ( PDO::FETCH_ASSOC )) ) {
		return $row ['titre'];
	}
}

/* fonction qui récupére le nom d'une catégorie en partant de son numéro */

function get_category_name($pdo2, $cn) {
	$req = $pdo2->query ( "select * from categories where ref ='" . $cn . "'" );
	
	while ( $row = $req->fetch () ) {
		return $row ['nom'];
	}
}

?>