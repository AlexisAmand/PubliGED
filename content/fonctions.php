<?php 

function nextArticle($id, $pdo2)
	{	
	$id++;
	$reffound = 0;
	while ($reffound == 0)	
		{
		$sql = "SELECT ref FROM articles WHERE ref = '{$id}'";
		$req = $pdo2->prepare ($sql);
		$req->execute();
		
		$count = $req->rowCount();
		
		if ($count == 1)
			{			
			$reffound = 1;
			}
		else
			{
			$id++;
			}				
		}		
	return "index.php?page=article&id=".$id;
	}

function previousArticle($id, $pdo2)
	{
	$id--;
	$reffound = 0;
	while ($reffound == 0)
		{
		$sql = "SELECT ref FROM articles WHERE ref = '{$id}'";
		$req = $pdo2->prepare ($sql);
		$req->execute();
		
		$count = $req->rowCount();
		
		if ($count == 1)
			{	
			$reffound = 1;
			}
		else
			{
			$id--;
			}
		}
	return "index.php?page=article&id=".$id;
	}
		
/* fonction qui affiche le lieu d'un événement en partant de sa ref */
/* TODO : trouver un nom plus parlant */

function lieu($pdo2, $lieueve) {
	$result_birt_lieu = "SELECT * FROM lieux WHERE ref = '{$lieueve}'";
	$req_lieu = $pdo2->prepare ( $result_birt_lieu );
	$req_lieu->execute();
	
	$count = $req_lieu->rowCount();
	
	if ($count == 0) {
		/* si un lieu existe pas */
		return PLACEUNKNOW;
	} else {
		/* si un lieu existe */
		
		while ( $row_birt_lieu = $req_lieu->fetch(PDO::FETCH_ASSOC)) {
			
			$ville = explode(" ", $row_birt_lieu ['ville']);
						
			$temp = $row_birt_lieu ['ville']." (".$row_birt_lieu ['dep']." - ".$row_birt_lieu ['pays'].")";
			
			return $temp;
		
			/* TODO: vérifier si cette partie prend bien en compte les notes */
			/*
			if (empty($row_birt_lieu['note'])) {
			} else {
				echo "<sup>".$i_note."</sup>";
				$note [$i_note] = $row_birt_lieu ['note'];
				$i_note = $i_note + 1;
			}
			*/
						
		}
	}
}

function MoisEnLettres($mois)
	{ 	
	switch($mois) 		
		{
		case '01':return MOIS_1; 			
		case '02':return MOIS_2; 			
		case '03':return MOIS_3; 			
		case '04':return MOIS_4; 			
		case '05':return MOIS_5; 			
		case '06':return MOIS_6; 			
		case '07':return MOIS_7; 			
		case '08':return MOIS_8; 			
		case '09':return MOIS_9; 			
		case '10':return MOIS_10; 			
		case '11':return MOIS_11; 			
		case '12':return MOIS_12; 	
		}
	} 
		
/* un article est généré sour la forme d'un pdf qui est enregitré */ 
/* TODO : mettre ici les trucs qui génére les PDF ? */
	
function GenerationPDF($pdo3, $art) 
	{
	
	} 

/* fonction qui vérifie si un gedcom a été envoyé */ 

function VerifGedcom($pdo3) 
	{ 	
	$req_verif = "SELECT * FROM configuration WHERE nom='gedcom'"; 	
	$res_verif = $pdo3->prepare($req_verif); 	
	$res_verif->execute();
	
	$data = $res_verif->fetch(PDO::FETCH_ASSOC);
	return $data['valeur'];
	}

/* fonction qui récupére le nombre d'article à afficher par page */
	
function NombreArticlePage($pdo2)
	{
	$req_napp = "SELECT * FROM configuration WHERE nom = 'napp'";
	$req_napp = $pdo2->prepare($req_napp);
	$req_napp->execute();

	$data = $req_napp->fetch(PDO::FETCH_ASSOC);
	return $data['valeur'];
	} 
			
/* fonction qui récupére le nombre de resultat à afficher par page */ 

function recup_page($pdo2) 
	{ 	
	$req_nrpp = "SELECT * FROM configuration WHERE nom = 'nrpp'"; 	
	$req_nrpp = $pdo2->prepare($req_nrpp);
	$req_nrpp->execute(); 	

	$data = $req_nrpp->fetch(PDO::FETCH_ASSOC);
	return $data['valeur'];
	} 
	
/* fonction qui fait un lien vers la fiche d'un individu en partant de son n° */ 

function individu($pdo2, $i)
	{ 		
	$req = $pdo2->query( "select * from individus where ref='{$i}'");
	
	while ($row = $req->fetch (PDO::FETCH_ASSOC)) 
		{ 	
		$lien = "<a href='index.php?page=fiche&ref=" . $i . "'>" . $row ['prenom'] . " " . $row ['surname'] . "</a>"; 	
		return $lien; 	
		}
	}
	
/* nom d'un individu dans une case de l'arbre */ 

function casearbre($pdo2, $i) 
	{ 		
	$req = $pdo2->query ( "select * from individus where ref='{$i}'" ); 	
	
	while ($row = $req->fetch (PDO::FETCH_ASSOC))
		{ 		
		echo "<a href='index.php?page=fiche&ref=" . $i . "'>";
		echo $row ['surname'] . "<br />" . $row ['prenom'] . "</a>";
		} 
	} 

/* fonction qui récupére le nom d'une catégorie en partant de son numéro */ 
	
function get_category_name($pdo2, $cn)
	{ 	
	$req = $pdo2->query("select * from categories where ref ='" . $cn . "'"); 	
	$data = $req->fetch(PDO::FETCH_ASSOC);	
	return $data['nom'];
	} 

/* fonction qui traduit les événements du GEDCOM en "mots" */ 
	
function traduction($mot)
	{	
	if(defined($mot))
		{
		$mottraduit = constant($mot);
		}
	else	
		{
		$mottraduit = "Evenement nom reconnu";
		}
		
	return $mottraduit;
	}
	
/* TODO : A quoi sert cette fonction ? */	
		
function evenements($d, $l, $t1, $t2) 
	{ 	
	switch(array($d,$l)) 
		{ 		
		case array(NULL,!NULL) : 
			echo "<li>" . $t1 . $l . "</li>"; 			
			break; 		
		case array(!NULL,NULL) : 
			echo "<li>" . $t2 . utf8_decode ( $d ) . NOPLACE . "</li>";
			break; 		
		case array(!NULL,!NULL) :
			echo "<li>" . $t2 . utf8_decode ( $d ) . AT . $l . "</li>";
			break; 		
		default : 		
			break; 	
		} 
	} 
	
/* récup du nom du site */
	
function recupNomSite($pdo2)
	{		
	$sql = "select * from configuration where nom='titre'";
	$req = $pdo2->prepare($sql);
	$req->execute();
	
	$row = $req->fetch();
	return $row['valeur'];
	}

	/* fonction qui récupére le nom d'un auteur en partant de son numéro */
	
	function RecupAuteurArticle($pdo2, $idAuteur) 
		{
		$res_membres = $pdo2->prepare ( "select * from membres where id=:id" );
		$res_membres->bindValue ( "id", $idAuteur, PDO::PARAM_INT );
		$res_membres->execute ();
		
		while ( $data_membres = $res_membres->fetch(PDO::FETCH_ASSOC))
			{
			$idAuteur = $data_membres ['login'];
			}
		return $idAuteur;
		}
	
	/* fonction qui récupére le titre d'un article à partir de son numéro */
	
	function RecupTitreArticle($pdo2, $a) 
		{
		$res = $pdo2->prepare ( "SELECT * FROM articles WHERE ref = :ref" );
		$res->bindparam ( ':ref', $a );
		$res->execute ();
	
		while ( ($row = $res->fetch(PDO::FETCH_ASSOC)) ) 
			{
			return $row ['titre'];
			}
		}
	
	/* fonction qui enregistre une donnée dans le log du blog */
	
	function putOnLogB($log) 
		{
		if(isset($_SESSION['login']))
			{
			$moment = date("F j, Y, g:i ");
			file_put_contents("logs/blog.log", $moment.$log." (".$_SESSION['login'].")\n" , FILE_APPEND);
			}
		else 
			{
			$moment = date("F j, Y, g:i ");
			file_put_contents("logs/blog.log", $moment.$log."\n" , FILE_APPEND);
			}
		}
		
	/* fonction qui enregistre une donnée dans le log de la partie généalogie */
		
	function putOnLogG($log)
		{
		$moment = date("F j, Y, g:i ");
		file_put_contents("logs/genealogie.log", $moment.$log." (".$_SESSION['login'].")\n" , FILE_APPEND);;
		}
		
	/* fonction qui récupére la langue du backoffice */
		
	function chooseAdminLang($pdo2)
		{
		$req = $pdo2->prepare ( "select * from configuration where nom='langueAdmin'" );
		$req->execute();
		
		$row = $req->fetch();
		return $row['valeur'];	
		}
		
	/* fonction qui récupére la langue du frontoffice */
		
	function chooseLang($pdo2)
		{
		$req = $pdo2->prepare ( "select * from configuration where nom='langueFront'" );
		$req->execute();
		
		$row = $req->fetch();
		return $row['valeur'];
		}
	
?>