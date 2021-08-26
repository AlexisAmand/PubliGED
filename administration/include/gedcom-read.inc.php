<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4">Bonjour <?php echo $_SESSION['login']; ?>.</h1> <?php /* TODO : récupérer ici le nom de l'utilisateur */ ?>
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=articles-list">Gedcom</a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo "Envoyer un gedcom"; ?></li>
		</ol>
        
		<div class="row">
			
			<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-diagram-3 me-2"></i><?php echo ADM_GED_READ; ?>
					</div>

					<div class="card-body">
			
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
							echo '<div class="alert alert-danger"><i class="bi bi-exclamation-triangle-fill"></i>Erreur : '. $e->getMessage (). "</div>";
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
						
						/* TODO : trop de variables, voir pour mettre ça dans les classes */
						
						$nb_eve = 0;
						$nb_individu = 0;
						$nb_lieu = 0;
						// $tablelieu = 1;
						$nb_source = 0;
						$place = 1;
						$nb_media = 0;
						// $public = 1;
						$nb_famille = 0;
						$gedcom_vers = 0;
						$logiciel_vers = 0;
						
						while ( ! feof ( $gedcom ) ) 
							{
							/* On lit une ligne du gedcom */	
							$ligne = fgets ( $gedcom, 1024 );
							
							/* cette ligne résoud un problème d'encodage de caractère lors de l'import du gedcom heredis */
							$ligne = iconv ( "WINDOWS-1252", "UTF-8", $ligne );
							
							/* -------------- */
							/* Head du gedcom */					
							/* -------------- */

							/* nom complet du logiciel qui a servi à créer le gedcom */
							
							if (preg_match ( "/1 SOUR/", $ligne ) and ($nb_individu == 0))
								{
								$logiciel = new logiciels();
								/* On retire le /1 SOUR/ qui est au début de la chaine */
								$logiciel->nomcomplet = implode(" ",array_slice(explode(" ",$ligne), 2));
								$logiciel_vers = 1;
								}
							
							/* nom du logiciel qui a servi à créer le gedcom */

							if (preg_match ( "/2 NAME/", $ligne ) and ($nb_individu == 0))
								{
								/* On retire le /2 NAME/ qui est au début de la chaine */
								$logiciel->nom = implode(" ",array_slice(explode(" ",$ligne), 2));
								}

							/* Information sur l'auteur du gedcom */
							
							if (preg_match ( "/0 @S0@/", $ligne ))
								{
								/* On arrive dans la partie qui contient les infos sur l'auteur du gedcom */
								/* On crée donc un objet gedcom */
								$uploader = new uploaders ();
								}
							
							/* nom de l'auteur du gedcom */
							
							if (preg_match ( "/1 NAME/", $ligne ) and ($nb_individu == 0)) 
								{
								$uploader->name  = implode(" ",array_slice(explode(" ",$ligne), 2));
								}

							/* adresse de l'auteur du gedcom */
												
							if (preg_match ( "/1 ADDR/", $ligne ) and ($nb_individu == 0)) 
								{
								/* On retire le /1 ADDR/ qui est au début de la chaine */
								$uploader->adresse = implode(" ",array_slice(explode(" ",$ligne), 2));
								}
							
							/* adresse de l'auteur du gedcom */
							
							if (preg_match ( "/1 EMAIL/", $ligne ) and ($nb_individu == 0)) 
								{
								/* On retire le /1 EMAIL/ qui est au début de la chaine */
								$uploader->mail = implode(" ",array_slice(explode(" ",$ligne), 2));
								}

							/* site de l'auteur du gedcom */
							
							if (preg_match ( "/1 WWW/", $ligne ) and ($nb_individu == 0)) 
								{
								/* On retire le /1 WWW/ qui est au début de la chaine */
								$uploader->www = implode(" ",array_slice(explode(" ",$ligne), 2));
								}

							/* ------------------------------------------------------ */
							/* Version du gedcom et du liogciel utilisé pour le créer */
							/* ------------------------------------------------------ */

							if (preg_match ( "/1 GEDC/", $ligne )) 
								{
								$gedfichier = new gedfichiers();
								$gedcom_vers = 1;
								}

							if (preg_match ( "/2 VERS/", $ligne )) 
								{
								if ($gedcom_vers == 1)
									{
									$gedcom_vers = 0;
									/* On retire le /2 VERS/ qui est au début de la chaine */
									$gedfichier->version = implode(" ",array_slice(explode(" ",$ligne), 2));	

									/* Contrôle que la version du gedcom est compatible */

									if ((int)($gedfichier->version) != 5) 
										{
										echo "Attention ! Vous devez utiliser la version 5 de la norme gedcom pour profiter un maximum de PubliGED.";
										}

									}
								if ($logiciel_vers == 1)
									{
									$logiciel_vers = 0;
									/* On retire le /2 VERS/ qui est au début de la chaine */
									$logiciel->version = implode(" ",array_slice(explode(" ",$ligne), 2));	
									}
								}

							/* ---------------------- */
							/* Création d'un individu */
							/* ---------------------- */
							
							if (preg_match ( "/@ INDI/", $ligne )) 
								{
								$individu = new individus();
								$nb_individu = $nb_individu + 1;
								$exploderef = explode ( "@", $ligne );
								$individu->ref = $exploderef [1];
								$req = $pdo->prepare ( "INSERT INTO individus (ref) VALUES (:ref)" );
								$req->bindparam ( ':ref', $individu->ref );
								$req->execute ();
								}
								
							/* Nom complet de l'individu */
								
							if (preg_match ( "/1 NAME/", $ligne ) and ($nb_individu != 0))
								{
								/* On retire le /1 NAME/ qui est au début de la chaine */
								$individu->nom = implode(" ",array_slice(explode(" ",$ligne), 2));						
								$res = $pdo->prepare ( "UPDATE individus SET nom = :nom WHERE ref=:ref" );
								$res->bindparam ( ':nom', $individu->nom, PDO::PARAM_STR );
								$res->bindparam ( ':ref', $individu->ref, PDO::PARAM_STR );
								$res->execute ();
								}
								
							/* nom de l'individu */
								
							if (preg_match ( "/2 SURN/", $ligne )) 
								{
								/* On retire le /2 SURN/ qui est au début de la chaine */
								$individu->surname = implode(" ",array_slice(explode(" ",$ligne), 2));
								$res = $pdo->prepare ( "UPDATE individus SET surname = :surname WHERE ref=:ref" );
								$res->bindparam ( ':surname', $individu->surname, PDO::PARAM_STR );
								$res->bindparam ( ':ref', $individu->ref, PDO::PARAM_STR );
								$res->execute ();
								}
								
							/* Prénom de l'individu */
								
							if (preg_match ( "/2 GIVN/", $ligne )) 
								{
								/* On retire le /2 GIVN/ qui est au début de la chaine */
								$individu->prenom = implode(" ",array_slice(explode(" ",$ligne), 2));
								$res = $pdo->prepare ( "UPDATE individus SET prenom = :prenom WHERE ref=:ref" );
								$res->bindparam ( ':prenom', $individu->prenom );
								$res->bindparam ( ':ref', $individu->ref );
								$res->execute ();
								}
								
							/* Sexe de l'individu */
								
							if (preg_match ( "/1 SEX/", $ligne )) 
								{
								
								/*	
								$partie = explode ( " ", $ligne );
								$individu->sexe = $partie [2];
								*/

								/* On retire le /1 SEX/ qui est au début de la chaine */
								$individu->sexe = implode(" ",array_slice(explode(" ",$ligne), 2));
								$res = $pdo->prepare ( "UPDATE individus SET sex = :sex WHERE ref=:ref" );
								$res->bindparam ( ':sex', $individu->sexe );
								$res->bindparam ( ':ref', $individu->ref );
								$res->execute ();
								}
								
							/* -------------------- */
							/* Gestion des familles */
							/* -------------------- */

							/* Une nouvelle famille est trouvée dans le gedcom */
							
							if (preg_match ( "/@ FAM/", $ligne )) 
								{
								$famille = new famille ();
								$nb_famille = $nb_famille + 1;
								$fam_ref = explode ( "@", $ligne );
								$famille->ref = $fam_ref [1];
								$req = "INSERT INTO familles (ref) VALUES ('$famille->ref')";
								$resultat = $pdo->exec ( $req );
								$nb_chil = 0;
								}

							/* Le père */
							
							if (preg_match ( "/1 HUSB/", $ligne )) 
								{
								$fam_husb = explode ( "@", $ligne );
								$famille->husb = $fam_husb [1];
								$req = "UPDATE familles SET pere = '$famille->husb' WHERE ref='$famille->ref'";
								$resultat = $pdo->exec ( $req );
								}

							/* La mère */
							
							if (preg_match ( "/1 WIFE/", $ligne )) 
								{
								$fam_wife = explode ( "@", $ligne );
								$famille->wife = $fam_wife [1];
								$req = "UPDATE familles SET mere = '$famille->wife' WHERE ref='$famille->ref'";
								$resultat = $pdo->exec ( $req );
								}

							/* Un enfant */
							
							if (preg_match ( "/1 CHIL/", $ligne )) 
								{
								$fam_chil = explode ( "@", $ligne );
								$famille->chil = $fam_chil [1];
								
								/* si le couple n'a pas encore d'enfant, on complete */
								if ($nb_chil == 0) 
									{
									$req = "UPDATE familles SET enfant = '$famille->chil' WHERE ref='$famille->ref'";
									$nb_chil = $nb_chil + 1;
									}
								else /* si le couple a déjà un enfant alors la ligne est dupliquée et j'ajoute le nouvel enfant */
									{
									$req = "INSERT INTO familles (ref, pere, mere, enfant) VALUES ('$famille->ref','$famille->husb','$famille->wife','$famille->chil')";
									}

								$resultat = $pdo->exec ( $req );
								}
							
							if (preg_match ( "/1 MARR/", $ligne ))
								{
								$evenement = new evenement ();
								$nb_eve = $nb_eve + 1;
								$evenement->nom = "MARR";
								$pere = substr ( $famille->husb, 0, - 1 );
								$individu->ref = $pere;
								
								/* mariage des deux parents d'une famille */
								
								$stmt = $pdo->prepare ( "INSERT INTO evenements (n_eve, n_indi, nom) VALUES (:eve, :pere, :nom)" );
								$stmt->bindParam ( ':eve', $nb_eve );
								$stmt->bindParam ( ':pere', $famille->husb );
								$stmt->bindParam ( ':nom', $evenement->nom );
								$stmt->execute ();
								}
										
							/* ---------------------- */
							/* Gestion des événements */
							/* ---------------------- */
						
							$tabeve = array (
								array ("/1 ADOP/", "ADOP"),
								array ("/1 ANUL/", "ANUL"),
								array ("/1 BAPL/", "BAPL"),
								array ("/1 BAPM/", "BAPM"),
								array ("/1 BAPT/", "BAPT"),
								array ("/1 BARM/", "BARM"),
								array ("/1 BASM/", "BASM"),
								array ("/1 BIRT/", "BIRT"),
								array ("/1 BLES/", "BLES"),
								array ("/1 BURI/", "BURI"),
								array ("/1 CENS/", "CENS"),
								array ("/1 CHR/",  "CHR"),
								array ("/1 CONF/", "CONF"),
								array ("/1 CRIM/", "CRIM"),
								array ("/1 CHRA/", "CHRA"),
								array ("/1 CREM/", "CREM"),						
								array ("/1 DEAT/", "DEAT"),
								array ("/1 DIVF/", "DIVF"),
								array ("/1 DIV/", "DIV"),
								array ("/1 DONA/", "DONA"),
								array ("/1 EDUC/", "EDUC"),
								array ("/1 EMIG/", "EMIG"),
								array ("/1 EMPL/", "EMPL"),
								array ("/1 ENGA/", "ENGA"),
								array ("/1 EVEN/", "EVEN"),
								array ("/1 ENDL/", "ENDL"),
								array ("/1 FCOM/", "FCOM"),
								array ("/1 FUNE/", "FUNE"),
								array ("/1 GRAD/", "GRAD"),
								array ("/1 HIST/", "HIST"),
								array ("/1 IMMI/", "IMMI"),
								array ("/1 LVG/", "LVG"),
								/* 
								array("/1 MARB/","MARB"),
								array("/1 MARE/","MARE"),
								array("/1 MARL/","MARL"),
								array("/1 MARC/", "MARC"),
								array("/1 MARR/", "MARR"),
								array("/1 MARS/", "MARS"),
								*/
								array ("/1 NATU/", "NATU"),
								array ("/1 NOBL/", "NOBL"),
								array ("/1 ONDO/", "ONDO"),
								array ("/1 ORDN/", "ORDN"),
								array ("/1 PASL/", "PASL"),
								array ("/1 PROB/", "PROB"),
								array ("/1 RELI/", "RELI"),
								array ("/1 RESI/", "RESI"),
								array ("/1 RETI/", "RETI"),
								array ("/1 RMRK/", "RMRK"),
								array ("/1 SEP/",  "SEP"),
								array ("/1 SEPA/", "SEPA"),										
								array ("/1 TBS/", "TBS"),
								array ("/1 WILL/", "WILL")
								);
							
							for($l = 0; $l < 40; $l ++) 
								{
								if (preg_match ( $tabeve [$l] [0], $ligne )) 
									{
									$evenement = new evenement ();
									$public = 1; /* par défaut, l'événement de l'individu est public */
									$nb_eve = $nb_eve + 1;
									$evenement->indiv = $individu->ref;
									$evenement->nom = $tabeve [$l] [1];
									$req = $pdo->prepare ( "INSERT INTO evenements (n_eve, n_indi, nom) VALUES (:n_eve, :indiv,:nom)" );			
									$req->bindValue ( ':n_eve', $nb_eve, PDO::PARAM_INT );			
									$req->bindValue ( ':indiv', $evenement->indiv, PDO::PARAM_STR );
									$req->bindValue ( ':nom', $evenement->nom, PDO::PARAM_STR );
									$req->execute ();
									}
								}
							
							/* Profession de l'individu */
								
							if (preg_match ( "/1 OCCU/", $ligne )) 
								{
								$evenement = new evenement ();
								$nb_eve = $nb_eve + 1;
								$evenement->indiv = $individu->ref;
								$evenement->nom = "OCCU"; /* TODO : Je pense que ce OCCU peut devenir une constante profession */

								/* On retire le /1 OCCU/ qui est au début de la chaine */
								$evenement->type = implode(" ",array_slice(explode(" ",$ligne), 2));

								$req = $pdo->prepare ( "INSERT INTO evenements (n_indi, nom, evenement) VALUES (:indiv,:nom,:type)" );
								$req->bindValue ( ':indiv', $evenement->indiv, PDO::PARAM_STR );
								$req->bindValue ( ':nom', $evenement->nom, PDO::PARAM_STR );
								$req->bindValue ( ':type', $evenement->type, PDO::PARAM_STR );
								$req->execute ();
								}
								
							/* Date de l'événement */
							
							if (preg_match ( "/2 DATE/", $ligne ) and ($nb_source == 0)) 
								{
								/* On retire le /2 DATE/ qui est au début de la chaine */
								$evenement->date = implode(" ",array_slice(explode(" ",$ligne), 2));

								/* traduction des mois de la date en fonction du contenu des fichiers de langue */
								$evenement->date = str_replace ( "JAN", MOIS_1, $evenement->date );
								$evenement->date = str_replace ( "FEB", MOIS_2, $evenement->date );
								$evenement->date = str_replace ( "MAR", MOIS_3, $evenement->date );
								$evenement->date = str_replace ( "APR", MOIS_4, $evenement->date );
								$evenement->date = str_replace ( "MAY", MOIS_5, $evenement->date );
								$evenement->date = str_replace ( "JUN", MOIS_6, $evenement->date );
								$evenement->date = str_replace ( "JUL", MOIS_7, $evenement->date );
								$evenement->date = str_replace ( "AUG", MOIS_8, $evenement->date );
								$evenement->date = str_replace ( "SEP", MOIS_9, $evenement->date );
								$evenement->date = str_replace ( "OCT", MOIS_10, $evenement->date );
								$evenement->date = str_replace ( "NOV", MOIS_11, $evenement->date );
								$evenement->date = str_replace ( "DEC", MOIS_12, $evenement->date );
								
								/* traduction de l'approximation de la date */
								$evenement->date = str_replace ( "BEF", BEF, $evenement->date );
								$evenement->date = str_replace ( "ABT", ABT, $evenement->date );
								$evenement->date = str_replace ( "AFT", AFT, $evenement->date );
								$evenement->date = str_replace ( "EST", EST, $evenement->date );
								$evenement->date = str_replace ( "WFT", WFT, $evenement->date );
								
								/* hop ! On met la date dans la table */
								$req = $pdo->prepare ( "UPDATE evenements SET date = :date WHERE n_indi=:indiv and nom=:nom" );
								$req->bindValue ( ':date', $evenement->date, PDO::PARAM_STR );
								$req->bindValue ( ':indiv', $individu->ref, PDO::PARAM_INT );
								$req->bindValue ( ':nom', $evenement->nom, PDO::PARAM_STR );
								
								$req->execute ();
								}
								
							/* type d'événement - (sorte de détails et complément d'info) */
							
							if (preg_match ( "/2 TYPE/", $ligne )) 
								{
								/* On retire le /2 TYPE/ qui est au début de la chaine */
								$evenement->type = implode(" ",array_slice(explode(" ",$ligne), 2));
								
								$req = $pdo->prepare ( "UPDATE evenements SET type = :type WHERE n_indi = :indiv AND n_eve = :eve " );
								$req->bindValue ( ':type', $evenement->type, PDO::PARAM_STR );
								$req->bindValue ( ':indiv', $individu->ref, PDO::PARAM_INT );
								$req->bindValue ( ':eve', $nb_eve, PDO::PARAM_INT );
								$req->execute ();
								}
					
							/* lieu de l'événement */
							
							if (preg_match ( "/2 PLAC/", $ligne )) 
								{
								
								/* TODO : peut surement être optimisé avec la solution qui supprime 1 NAME dans le nom */
											
								$place = explode ( ",", $ligne );
								$lieu = new lieu ();
								
								if (isset ( $place [1] )) 
									{
									$lieu->cp = $place [1];
									}
								else 
									{
									$lieu->cp = "";
									}
																			
								$t1 = explode ( " ", $place [0]);
								
								// suppression case "2" et de la case "PLAC"
								
								$t2 = array_slice($t1, 2); 
									
								// le reste du tableau redevient une chaine
								
								$lieu->ville = implode(" ", $t2);
								
								$lieu->dep = $place [2];
								$lieu->region = $place [3];
								$lieu->pays = $place [4];
								$lieu->continent = $place [5];
								
								/*
								
								$requete = "SELECT * FROM lieux WHERE cp = '{$lieu->cp}' AND ville = '{$lieu->ville}'";
								$req = $pdo->prepare ( $requete );
								$req->execute ();
								
								*/
								
								/* $TotalIndividu = $req->rowCount (); */
								
								$req = $pdo->prepare("SELECT * FROM lieux WHERE cp = :cp AND ville = :ville");
								$req->bindvalue(':cp', $lieu->cp, PDO::PARAM_STR );
								$req->bindvalue(':ville', $lieu->ville, PDO::PARAM_STR );
								$req->execute ();
								
								/*
								$req = $pdo->prepare ( "UPDATE evenements SET type = :type WHERE n_indi = :indiv AND n_eve = :eve " );
								$req->bindValue ( ':type', $evenement->type, PDO::PARAM_STR );
								$req->bindValue ( ':indiv', $individu->ref, PDO::PARAM_INT );
								$req->bindValue ( ':eve', $nb_eve, PDO::PARAM_INT );
								$req->execute ();
								*/
														
								$reql = $req->rowCount ();
								
								/* Mise à jour du 21 février 2018 */
								
								if ($reql == 0) 
									{
									$nb_lieu = $nb_lieu + 1;
									
									$req = $pdo->prepare ( "UPDATE evenements SET lieu = :lieu WHERE n_eve=:eve and n_indi=:ref" );
									$req->bindValue ( ':lieu', $nb_lieu, PDO::PARAM_INT );
									$req->bindValue ( ':ref', $individu->ref, PDO::PARAM_STR );
									$req->bindValue ( ':eve', $nb_eve, PDO::PARAM_INT );
									$req->execute ();
									
									$req2 = $pdo->prepare ( "INSERT INTO lieux (ville, cp, dep, region, pays, continent) VALUES (:ville,:cp,:dep,:region,:pays,:continent)" );
									$req2->bindValue ( ':ville', $lieu->ville, PDO::PARAM_STR );
									$req2->bindValue ( ':cp', $lieu->cp, PDO::PARAM_STR );
									$req2->bindValue ( ':dep', $lieu->dep, PDO::PARAM_STR );
									$req2->bindValue ( ':region', $lieu->region, PDO::PARAM_STR );
									$req2->bindValue ( ':pays', $lieu->pays, PDO::PARAM_STR );
									$req2->bindValue ( ':continent', $lieu->continent, PDO::PARAM_STR );
									$req2->execute ();
									}
								else 
									{
									while ($data = $req->fetch())
										{
										$reql = $pdo->prepare ( "UPDATE evenements SET lieu = :lieu WHERE n_eve=:eve" );
										$reql->bindValue ( ':lieu', $data ['ref'], PDO::PARAM_INT );
										$reql->bindValue ( ':eve', $nb_eve, PDO::PARAM_INT );
										$reql->execute ();
										}
									}
								}
								
							/* ----- */
							/* Notes */	
							/* ----- */
								
							/* Notes sur l'événement (affichées dans le tableau) */
							
							if (preg_match ( "/2 NOTE/", $ligne ) and ($nb_eve > 0)) 
								{
								
								/* On retire le /1 SEX/ qui est au début de la chaine */
								$evenement->note = implode(" ",array_slice(explode(" ",$ligne), 2));	

								$req = $pdo->prepare ( "UPDATE evenements SET note = :note WHERE n_indi=:ref and n_eve=:nb_eve" );
								$req->bindValue ( ':note', $evenement->note, PDO::PARAM_STR );
								$req->bindValue ( ':ref', $individu->ref, PDO::PARAM_STR );
								$req->bindValue ( ':nb_eve', $nb_eve, PDO::PARAM_STR );
								$req->execute ();
								}
								
							/* Note de l'individu */
						
							if (preg_match ( "/1 NOTE/", $ligne )) 
								{
								unset ( $backup ); /* backup sert à garder en mémoire le début de la note si il est sur plusieurs lignes */
								$individu->note = explode ( " ", $ligne );
								$temp = array_shift ( $individu->note );
								$temp = array_shift ( $individu->note );
								
								if (empty ( $backup )) 
									{
									$backup = implode ( " ", $individu->note );
									$stmt = $pdo->prepare ( "UPDATE individus SET note = :note WHERE ref = :id" );
									$stmt->bindValue ( ':id', $individu->ref, PDO::PARAM_INT );
									$stmt->bindValue ( ':note', $backup, PDO::PARAM_STR );
									$stmt->execute ();
									}
								}
							
							/* suite de la note ? */
							
							if (preg_match ( "/2 CONT/", $ligne )) 
								{
								$individu->note = explode ( " ", $ligne );
								$temp = array_shift ( $individu->note );
								$temp = array_shift ( $individu->note );
								$temp = implode ( " ", $individu->note );
								$backup = $backup . $temp;
								$stmt = $pdo->prepare ( "UPDATE individus SET note = :note WHERE ref = :id" );
								$stmt->bindValue ( ':id', $individu->ref, PDO::PARAM_INT );
								$stmt->bindValue ( ':note', $backup, PDO::PARAM_STR );
								$stmt->execute ();
								}
							
							/* ------- */
							/* Sources */
							/* ------- */
								
							/* source de l'événement en cours */
								
							if (preg_match ( "/2 SOUR/", $ligne )) 
								{
								$source = explode ( "@", $ligne );
								$evenement->source = $source [1];
								$req = "UPDATE evenements SET source = '$evenement->source' WHERE n_indi='$individu->ref' and n_eve='$nb_eve'";
								$resultat = $pdo->exec ( $req );
								}
								
							/* SOUR : nouvelle source */
							
							if (preg_match ( "/@ SOUR/", $ligne )) 
								{
								$source = new source ();
								$nb_source = $nb_source + 1;
								$sourcetab = explode ( "@", $ligne );
								$source->ref = $sourcetab [1];
								$stmt = $pdo->prepare ( "INSERT INTO sources (ref) VALUES (:ref)" );
								$stmt->bindParam ( ':ref', $source->ref, PDO::PARAM_STR );
								$stmt->execute ();
								}
							
							/* TITL : Titre de la source */
							
							if (preg_match ( "/1 TITL/", $ligne )) 
								{
								$TabTitreSource = explode ( " ", $ligne );
								$TabTitreSourceLong = count ( $TabTitreSource );
								$source->titre = implode ( " ", array_splice ( $TabTitreSource, $TabTitreSourceLong - ($TabTitreSourceLong - 2), $TabTitreSourceLong ) );
								$stmt = $pdo->prepare ( "UPDATE sources SET titre = :titre WHERE ref = :nb_source " );
								$stmt->bindParam ( ':titre', $source->titre, PDO::PARAM_STR );
								$stmt->bindParam ( ':nb_source', $source->ref, PDO::PARAM_INT );
								$stmt->execute ();
								}
							
							/* ABBR : Nom de la source */
							
							if (preg_match ( "/1 ABBR/", $ligne )) 
								{
								$TabNomSource = explode ( " ", $ligne );
								$TabNomSourceLong = count ( $TabNomSource );
								$source->nom = implode ( " ", array_splice ( $TabNomSource, $TabNomSourceLong - ($TabNomSourceLong - 2), $TabNomSourceLong ) );
								$stmt = $pdo->prepare ( "UPDATE sources SET nom = :nom WHERE ref = :nb_source " );
								$stmt->bindParam ( ':nom', $source->nom, PDO::PARAM_STR );
								$stmt->bindParam ( ':nb_source', $source->ref, PDO::PARAM_INT );
								$stmt->execute ();
								}
							
							/* REPO : Origine de la source */
							
							if (preg_match ( "/1 REPO/", $ligne )) 
								{
								$TabSourceSource = explode ( " ", $ligne );
								$TabSourceSourceLong = count ( $TabSourceSource );
								$source->origine = implode ( " ", array_splice ( $TabSourceSource, $TabSourceSourceLong - ($TabSourceSourceLong - 2), $TabSourceSourceLong ) );
								$stmt = $pdo->prepare ( "UPDATE sources SET source = :source WHERE ref = :nb_source " );
								$stmt->bindParam ( ':source', $source->origine, PDO::PARAM_STR );
								$stmt->bindParam ( ':nb_source', $source->ref, PDO::PARAM_STR );
								$stmt->execute ();
								}
							
							/* OBJE : media de la source */
							
							if (preg_match ( "/1 OBJE/", $ligne )) 
								{
								$media = new medias ();
								// echo $ligne;
								$nb_media ++;
								$media->ref = $nb_media;
								$source->media = $media->ref;
								$stmt = $pdo->prepare ( "UPDATE sources SET media = :media WHERE ref = :nb_source " );
								$stmt->bindParam ( ':media', $source->media, PDO::PARAM_STR );
								$stmt->bindParam ( ':nb_source', $source->ref, PDO::PARAM_STR );
								$stmt->execute ();
								$stmt = $pdo->prepare ( "INSERT INTO media (ref) VALUES (:ref)" );
								$stmt->bindParam ( ':ref', $media->ref, PDO::PARAM_STR );
								$stmt->execute ();
								}
							
							if (preg_match ( "/2 FORM/", $ligne ) and ($nb_media != 0)) 
								{
								$formatlu = explode ( " ", $ligne );
								$media->format = $formatlu [2];
								$stmt = $pdo->prepare ( "UPDATE media SET type = :format WHERE ref = :media " );
								$stmt->bindParam ( ':media', $media->ref, PDO::PARAM_STR );
								$stmt->bindParam ( ':format', $media->format, PDO::PARAM_STR );
								$stmt->execute ();
								}
							
							if (preg_match ( "/2 FILE/", $ligne )) 
								{
								$fichierlu = explode ( " ", $ligne );
								unset ( $fichierlu [0] );
								unset ( $fichierlu [1] );
								$cheminfichier = rtrim ( implode ( " ", $fichierlu ) );
								$fichierdest = "media" . $media->ref . ".jpg";
								$media->fichier = $cheminfichier;
								$stmt = $pdo->prepare ( "UPDATE media SET fichier = :fichier WHERE ref = :media " );
								$stmt->bindParam ( ':media', $media->ref, PDO::PARAM_STR );
								$stmt->bindParam ( ':fichier', $media->fichier, PDO::PARAM_STR );
								$stmt->execute ();
								}
							
							if (preg_match ( "/2 DATE/", $ligne ) and ($nb_source != 0)) 
								{						
								/* TODO : Je sais pas quoi ? */
								
								/*
								* $formatlu = explode (" ", $ligne);
								* $media->format = $formatlu[2];
								*
								* $stmt = $pdo->prepare("UPDATE media SET type = :format WHERE ref = :media ");
								* $stmt->bindParam ( ':media', $media->ref, PDO::PARAM_STR );
								* $stmt->bindParam ( ':format', $media->format, PDO::PARAM_STR );
								* $stmt->execute();
								*/
								}
								
							} /* fin du while */
							
						/* fermeture du fichier gedcom */
						fclose ( $gedcom );
								
						?>
			
					</div>
				</div>        
				
				<div class="row">
				
					<div class="col-6">
						
						<div class="card mb-4">
							<div class="card-header py-3">
								<?php echo BILAN_GEDCOM ?>
								</div>
								<div class="card-body">
												
								<table class='table table-bordered'>
									<tr>
										<th scope="row">Logiciel</th>
										<td><?php echo isset($logiciel->nomcomplet) ? $logiciel->nomcomplet : "inconnu"; ?></td>
									</tr>
									<tr>
										<th scope="row">Logiciel</th>
										<td><?php echo isset($logiciel->nom) ? $logiciel->nom : "inconnu"; ?></td>
									</tr>
									<tr>
										<th scope="row">Version du logiciel</th>
										<td><?php echo isset($logiciel->version) ? $logiciel->version : "inconnu"; ?></td>
									</tr>
									<tr>
										<th scope="row">Version de la norme gedcom</th>
										<td><?php echo isset($gedfichier->version) ? $gedfichier->version : "inconnu"; ?></td>
									</tr>
									<tr>
										<th scope="row">Auteur du gedcom</th>
										<td><?php echo isset($uploader->name ) ? $uploader->name : "inconnu"; ?></td>
									</tr>
									<tr>
										<th scope="row">Adresse</th>
										<td><?php echo isset($uploader->adresse ) ? $uploader->adresse : "inconnu"; ?></td>
									</tr>
									<tr>
										<th scope="row">Mail</th>
										<td><?php echo isset($uploader->mail ) ? $uploader->mail : "inconnu"; ?></td>
									</tr>
									<tr>
										<th scope="row">Site</th>
										<td><?php echo isset($uploader->www ) ? $uploader->www : "inconnu"; ?></td>
									</tr>
								</table>
					
								<?php /* mettre les infos des objets uploader et logiciel dans la BD */ ?>

								</div>
						</div>
						
					</div>		
									
					<div class="col-6">
						
						<div class="card alert-lightmb-4">
							<div class="card-header py-3">
								<?php echo BILAN_GEDCOM ?>
								</div>
								<div class="card-body">	
										
								<table class='table table-bordered'>
									<tr>
										<th scope="row">Nombre d'événements importés</th>
										<td><?php echo $nb_eve; ?></td>
									</tr>
									<tr>
										<th scope="row">Nombre d'individus importés</th>
										<td><?php echo $nb_individu; ?></td>
									</tr>
									<tr>
										<th scope="row">Nombre de lieux importés</th>
										<td><?php echo $nb_lieu; ?></td>
									</tr>
									<tr>
										<th scope="row">Nombre de sources importées</th>
										<td><?php echo $nb_source; ?></td>
									</tr>
									<tr>
										<th scope="row">Nombre de medias importés</th>
										<td><?php echo $nb_media; ?></td>
									</tr>
									<tr>
										<th scope="row">Nombre de familles importées</th>
										<td><?php echo $nb_famille; ?></td>
									</tr>
								</table>
					
								</div>
					</div>					
				</div>
			</div>
		</div>
</div>