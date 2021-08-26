<?php

/* basé sur le template SB Admin 2 for Bootstrap 4 */
/* Copyright 2013-2019 Blackrock Digital LLC. Code released under the MIT license. */
/* Adapté par Alexis AMAND pour le projet PubliGED */

/* Cette version fonctionne à 90%, mais elle est beaucoup trop longue */

require ('../content/fonctions.php');
include ('../config.php');
include ('../langues/admin/fr.php');
include ('../class/class.php');
?>

<!doctype html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  
  <title><?php echo BCK_TITLE." - ".ADM_RUB_SEND_G; ?></title>

  <?php include("include/header.inc.php"); ?>
  
</head>

<body>

  				<?php
				
				/* On commence par vider les tables */
				
				try {
					$req_sup_db = "TRUNCATE TABLE evenements; TRUNCATE TABLE media; TRUNCATE TABLE familles; TRUNCATE TABLE individus; TRUNCATE TABLE lieux; TRUNCATE TABLE sources;";
					$resultat_sup_db = $pdo->prepare ( $req_sup_db );
					$resultat_sup_db->execute ();
					$resultat_sup_db->closeCursor();
					echo '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>&nbsp;&nbsp;Les tables ont bien été préparées.</div>';
					
					}
				catch ( Exception $e )
					{
					echo '<div class="alert alert-danger"><i class="bi bi-exclamation-triangle-fill"></i>&nbsp;&nbsp;Erreur : '. $e->getMessage (). "</div>";
					}
				
				/* Envoyer le gedcom dans le dossier upload */
				
				$dossier = 'upload/';
				$fichier = basename ( $_FILES ['avatar'] ['name'] );

				/* TODO : voir si la taille max de l'upload ne peut pas être définie dans le fichier select_gedcom */		

				$taille_maxi = 10000000;
				$taille = filesize ( $_FILES ['avatar'] ['tmp_name'] );
				$extensions = array ('.ged','.GED');
				$extension = strrchr ( $_FILES ['avatar'] ['name'], '.' );
				
				if (!isset ( $erreur )) // S'il n'y a pas d'erreur, on upload
					{
					// On formate le nom du fichier ici...
					$fichier = strtr ( $fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy' );
					$fichier = preg_replace ( '/([^.a-z0-9]+)/i', '-', $fichier );
					if (move_uploaded_file ( $_FILES ['avatar'] ['tmp_name'], $dossier . $fichier )) // Si la fonction renvoie TRUE, c'est que ça a fonctionné...
						{
						echo '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>&nbsp;&nbsp;Le fichier a bien été envoyé !' . "</div>";
						}
					else // Sinon (la fonction renvoie FALSE) et ça n'a pas fonctionné.
						{
						echo '<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-triangle-fill"></i>&nbsp;&nbsp;Erreur pendant l\'envoi du fichier !' . "</div>";
						}
					} 
				else 
					{
					echo '<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-triangle-fill"></i>&nbsp;&nbsp;Erreur: ' . $erreur . '</div>';
					exit ();
					}
				
				/* ----------------------------------------------- */
				/* Ouverture du fichier pour l'import des données  */
				/* ----------------------------------------------- */
					
				$fichier_to_open = $fichier;
				$gedcom = fopen ( $dossier . $fichier_to_open, 'r' );

				$marqueur = "";
				$nb_eve = 0;

				while ( ! feof ( $gedcom ) ) 
					{
					/* On lit une ligne du gedcom */	
					$ligne = fgets ( $gedcom, 1024 );

					/* ------------ */
					/* Un individu. */
					/* ------------ */

					if (preg_match ( "/@ INDI/", $ligne )) 
						{
						$individu = new individus();
						$marqueur = "individu";
						$exploderef = explode ( "@", $ligne );
						$individu->ref = $exploderef [1];
						echo "valeur de la ligne :".$ligne."<br />";
						echo "valeur du ref :". $individu->ref."<br />";
						}

					/* Nom complet de l'individu */

					if(preg_match("/1 NAME/", $ligne) and ($marqueur == "individu"))
						{
						/* On retire le /1 NAME/ qui est au début de la chaine */
						$individu->nom = implode(" ",array_slice(explode(" ",$ligne), 2));
						$individu->nom = utf8_encode($individu->nom);	
						}

					/* nom de l'individu */
	
					if (preg_match ( "/2 SURN/", $ligne ) and ($marqueur == "individu"))
						{
						/* On retire le /2 SURN/ qui est au début de la chaine */
						$individu->surname = implode(" ",array_slice(explode(" ",$ligne), 2));
						$individu->surname = utf8_encode($individu->surname);
						}

					/* Prénom de l'individu */

					if(preg_match("/2 GIVN/", $ligne) and ($marqueur == "individu"))
						{
						/* On retire le /2 GIVN/ qui est au début de la chaine */
						$individu->prenom = implode(" ",array_slice(explode(" ",$ligne), 2));
						$individu->prenom = utf8_encode($individu->prenom);	
						}
						
					/* Sexe de l'individu */
						
					if (preg_match ( "/1 SEX/", $ligne ) and ($marqueur == "individu"))
						{
						/* On retire le /1 SEX/ qui est au début de la chaine */
						$individu->sexe = implode(" ",array_slice(explode(" ",$ligne), 2));
						}

					/* TODO : Titre d'un individu */

					if(isset($individu))
						{
						$req = $pdo->prepare("INSERT INTO individus (ref, nom, prenom, surname, sex, note) VALUES (:ref, :nom, :prenom, :surname, :sexe, :note)");
						$req->bindparam(':ref', $individu->ref);
						$req->bindparam(':nom', $individu->nom);
						$req->bindparam(':prenom', $individu->prenom);
						$req->bindparam(':surname', $individu->surname);
						$req->bindparam(':sexe', $individu->sexe);
						$req->bindparam(':note', $individu->note);

						$req->execute();
						}
					
					}

					?>
 
</body>
</html>