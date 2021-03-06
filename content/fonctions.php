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
/* Si aucun gedcom n'a été envoyé, elle affiche un message */ 
/* TODO : peut-être que le while n'est pas obligatoire ?
 * Il suffirait alors de remplacer le while par :
 
$data_verif = $res_verif->fetch(PDO::FETCH_ASSOC);
return $data_verif['valeur']; 	

 */	

function VerifGedcom($pdo3) 
	{ 	
	$req_verif = "SELECT * FROM configuration WHERE nom='export'"; 	
	$res_verif = $pdo3->prepare($req_verif); 	
	$res_verif->execute(); 	
	
	while ($data_verif = $res_verif->fetch(PDO::FETCH_ASSOC)) 
		{ 		
		return $data_verif['valeur']; 	
		} 
	}
			

/* fonction qui récupére le nombre d'article à afficher par page */
	
function NombreArticlePage($pdo2)
	{
		$req_napp = "SELECT * FROM configuration WHERE nom = 'napp'";
		$req_napp = $pdo2->prepare($req_napp);
		$req_napp->execute();
		
		while (($row = $req_napp->fetch( PDO::FETCH_ASSOC )))
		{
			$napp = $row['valeur'];
		}
		
		return $napp;
	} 
			
/* fonction qui récupére le nombre de resultat à afficher par page */ 

function recup_page($pdo2) 
	{ 	
	$req_nrpp = "SELECT * FROM configuration WHERE nom = 'nrpp'"; 	
	$req_nrpp = $pdo2->prepare($req_nrpp);
	$req_nrpp->execute(); 	
	
	while (($row = $req_nrpp->fetch( PDO::FETCH_ASSOC )))
		{ 		
		$nrpp = $row['valeur'];
		} 	
		
	return $nrpp;
	} 
	
/* fonction qui affiche le nom du fichier de la page en cours */ 


	/*  * function page_courante()
	 * * {
	 * * $fichierCourant = $_SERVER["PHP_SELF"];
	 * * $parties = explode('/', $fichierCourant );
	 * * return trim($parties[count($parties) - 1]);
	 * * }
	 * */ 
	
/* fonction qui fait un lien vers la fiche d'un individu en partant de son n° */ 

function individu($pdo2, $i)
	{ 	
	// global $nomcase, $prenomcase; 	
	$req = $pdo2->query( "select * from individus where ref='{$i}'");
	
	while ($row = $req->fetch (PDO::FETCH_ASSOC)) 
		{ 	
		$lien = "<a href='index.php?page=fiche&ref=" . $i . "'>" . $row ['prenom'] . " " . $row ['surname'] . "</a>"; 	
		return $lien; 	
		// $nomcase = $row['surname']; 	
		// $prenomcase = $row['prenom']; 	
		}
	}
	
/* nom d'un individu dans une case de l'arbre */ 

function casearbre($pdo2, $i) 
	{ 	
	// global $nomcase, $prenomcase; 	
	$req = $pdo2->query ( "select * from individus where ref='{$i}'" ); 	
	
	while ($row = $req->fetch (PDO::FETCH_ASSOC))
		{ 		
		echo "<a href='index.php?page=fiche&ref=" . $i . "'>" . $row ['surname'] . "<br />" . $row ['prenom'] . "</a>"; 	
		
		// $nomcase = $row['surname']; 		
		// $prenomcase = $row['prenom']; 	
		} 
	} 

/* fonction qui affiche le lieu d'un événement */ 

/*	
	
function lieu($pdo2, $lieueve)
	{ 	
	$result_birt_lieu = "SELECT * FROM lieux WHERE ref = '{$lieueve}'"; 	
	$req_lieu = $pdo2->prepare ( $result_birt_lieu ); 	
	$req_lieu->execute (); 	
	
	while ($row_birt_lieu = $req_lieu->fetch ( PDO::FETCH_ASSOC )) 
		{ 		
			$row_birt_lieu['pays'] = ucwords (strtolower($row_birt_lieu ['pays']));
			$lieu = $row_birt_lieu['ville'] . " (" . $row_birt_lieu ['dep'] . ", " . $row_birt_lieu ['pays'] . ")"; 
			return $lieu; 	
			
			if (empty ( $row_birt ['note'] )) 
				{ 	
					
				} 
			else 
				{ 	
				echo "<sup>" . $i_note . "</sup>"; 	
				$note [$i_note] = $row_birt ['note']; 
				$i_note = $i_note + 1; 	
				} 	
		} 
	} 
	
*/		

/*
function hautdutableau() 
	{ 	
	echo "<table class='table table-bordered'>"; 	
	echo "<thead>"; 	
	echo "<tr>"; 	
	echo "<th>Nom</th>"; 	
	echo "<th>Date</th>"; 	
	echo "<th>Lieu</th>"; 	
	echo "<th>Source</th>"; 	
	echo "<th>Type</th>"; 	
	echo "<th>Note</th>"; 	
	echo "</tr>"; 	
	echo "</thead>"; 
	}
*/	 
	
/* fonction qui récupére le nom d'une catégorie en partant de son numéro */ 
	
function get_category_name($pdo2, $cn)
	{ 	
	$req = $pdo2->query("select * from categories where ref ='" . $cn . "'"); 	
	
	while ($row = $req->fetch(PDO::FETCH_ASSOC)) 
		{ 		
		return $row ['nom']; 	
		} 
	} 
		
/* fonction qui fait le tri des colonnes de la liste éclair */ 

/*	
function TriListeEclair($couleur, $valeur) 
	{ 	
	echo '<form action="index.php" method="GET" class="right">'; 	
	echo '<input type="submit" value="' . $couleur . '" class="btn btn-default">'; 	
	echo '<input type="hidden" name="tri" value="' . $valeur . '">'; 	
	echo '<input type="hidden" name="page" value="eclair">'; 	
	echo '</form>'; 
	}
*/ 

/* fonction qui traduit les événements du GEDCOM en "mots" */ 
	
function traduction($mot)
	{ 	
	switch($mot)
		{ 		
		case "ADOP" : 
			$mottraduit = ADOP; 
			break; 		
		case "ANUL" : 
			$mottraduit = ANUL; 
			break; 		
		case "BAPL" : 
			$mottraduit = BAPL; 
			break; 		
		case "BAPM" : 
			$mottraduit = BAPM; 
			break; 		
		case "BAPT" : 
			$mottraduit = BAPT; 
			break; 		
		case "BARM" : 
			$mottraduit = BARM; 
			break; 		
		case "BASM" : 
			$mottraduit = BASM; 
			break; 		
		case "BIRT" : 
			$mottraduit = BIRT; 
			break; 		
		case "BLES" : 
			$mottraduit = BLES; 
			break; 		
		case "BURI" : 
			$mottraduit = BURI; 
			break; 		
		case "CENS" : 
			$mottraduit = CENS; 
			break; 		
		case "CHR" : 
			$mottraduit = CHR;	
			break; 		
		case "CONF" : 
			$mottraduit = CONF; 
			break; 		
		case "CRIM" : 
			$mottraduit = CRIM; 
			break; 		
		case "CHRA" : 
			$mottraduit = CHRA; 
			break; 		
		case "CRIM" : 
			$mottraduit = CRIM; 
			break; 		
		case "DEAT" : 
			$mottraduit = DEAT; 
			break; 		
		case "DIVF" : 
			$mottraduit = DIVF; 
			break; 		
		case "DIV" : 
			$mottraduit = DIV; 
			break; 		
		case "DONA" : 
			$mottraduit = DONA; 
			break; 		
		case "EDUC" : 
			$mottraduit = EDUC; 
			break; 		
		case "EMIG" : 
			$mottraduit = EMIG; 
			break; 		
		case "EMPL" : 
			$mottraduit = EMPL; 
			break; 		
		case "ENGA" : 
			$mottraduit = ENGA; 
			break; 		
		case "EVEN" :
			$mottraduit = EVEN; 
			break; 		
		case "ENDL" : 
			$mottraduit = ENDL; 
			break; 		
		case "FCOM" : 
			$mottraduit = FCOM; 
			break; 		
		case "FUNE" : 
			$mottraduit = FUNE; 
			break; 		
		case "GRAD" : 
			$mottraduit = GRAD;
			break; 		
		case "HIST" : 
			$mottraduit = HIST; 
			break; 	
		case "IMMI" : 
			$mottraduit = IMMI;
			break; 		
		case "LVG" :
			$mottraduit = LVG;
			break; 		
		case "OCCU" : 
			$mottraduit = OCCU;
			break; 	
		case "MARB" : 
			$mottraduit = MARB;
			break; 	
		case "MARE" : 
			$mottraduit = MARE;
			break; 		
		case "MARL" : 
			$mottraduit = MARL; 
			break; 		
		case "MARC" : 
			$mottraduit = MARC;
			break; 		
		case "MARR" : 
			$mottraduit = MARR; 
			break; 		
		case "MARS" : 
			$mottraduit = MARS; 
			break; 		
		case "NATU" : 
			$mottraduit = NATU; 
			break; 		
		case "NOBL" : 
			$mottraduit = NOBL; 
			break; 		
		case "ONDO" : 
			$mottraduit = ONDO;
			break; 		
		case "ORDN" :
			$mottraduit = ORDN; 
			break; 		
		case "PASL" : 
			$mottraduit = PASL; 
			break; 		
		case "PROB" : 
			$mottraduit = PROB; 
			break; 		
		case "RELI" : 
			$mottraduit = RELI; 
			break; 		
		case "RESI" :
			$mottraduit = RESI; 
			break; 		
		case "RETI" :
			$mottraduit = RETI; 
			break; 		
		case "RMRK" : 
			$mottraduit = RMRK; 
			break; 		
		case "SEP" : 
			$mottraduit = SEP; 
			break; 		
		case "SEPA" : 
			$mottraduit = SEPA; 
			break; 		
		case "TBS" : 
			$mottraduit = TBS; 
			break; 		
		case "WILL" :
			$mottraduit = WILL;
			break; 	
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

?>