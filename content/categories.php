<?php

/* ---------------------------------- */
/* LISTE DES ARTICLES D'UNE CATEGORIE */
/* ---------------------------------- */

$req = $pdo2->query ( "SELECT * FROM articles WHERE id_cat = '" . $_GET ['id'] . "' ORDER BY date DESC" );

while ( $row = $req->fetch () ) 
	{
	$article = new articles ();
	$commentaire = new commentaires();
	
	/* ref de l'article */
	
	$article->ref = $row ['ref'];
	
	/* TODO : Pour l'instant récupérer les comms semble servir à rien */
	
	$req_comms = "select * from commentaires where id_article='{$article->ref}'";
	$res_comms = $pdo2->prepare ( $req_comms );
	$res_comms->execute ();
	
	/* auteur de l'article */
	
	$res_membres = $pdo2->prepare ( "select * from membres where id=:id" );
	$res_membres->bindValue ( "id", $row ['auteur'], PDO::PARAM_INT );
	$res_membres->execute ();
	
	while ( $data_membres = $res_membres->fetch () ) 
		{
		$article->auteur = $data_membres ['login'];
		}
		
	/* titre de l'article */
	
	$article->titre = $row ['titre'];
	
	/* date de l'article */
	
	if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $row ['date'] )) {
		$article->date = substr ( $row ['date'], 8, 2 ) . " " . MoisEnLettres(substr ( $row ['date'], 5, 2 )) . " " . substr ( $row ['date'], 0, 4 );
	}
	
	/* catégorie de l'article */
	
	$article->categorie = $_GET ['id'];
	
	/* contenu de l'article */
	
	$article->contenu = $row ['article'];
	
	/* contenu de l'article */
	
	$article->Afficher($pdo2);
	$commentaire->AfficheLien($article->ref, $pdo2);
	
	}
	
?>