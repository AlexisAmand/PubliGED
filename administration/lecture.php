<?php

echo $_GET['avatar'];

/* basé sur le template SB Admin 2 for Bootstrap 4 */
/* Copyright 2013-2019 Blackrock Digital LLC. Code released under the MIT license. */

require ('../content/fonctions.php');
include ('../config.php');
include ('../langues/admin.php');
include ('../class/class.php');
?>

<!doctype html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo ASIDE_ADMIN_0." - ".ADM_RUB_TITRE_6; ?></title>

  <!-- Font Awesome 5.9.0 -->
  <link href="css/fontawesome/css/all.min.css" rel="stylesheet" type="text/css"> 
  
  <!-- Custom fonts for this template -->	
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include('include/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
          
          	<!-- Affichage du lien "voir le site" -->
          	<li class="nav-item">
			  <a class="nav-link" href="../index.php" target="_blank"><?php echo SEE_SITE; ?></a>
			</li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Alexis A.</span>
                <img class="img-profile rounded-circle" src="img/avatar.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo PROFIL; ?>
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo SETTINGS; ?>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo LOGOUT; ?>
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
		          
          <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary"><?php echo READ_GEDCOM; ?></h6>
               </div>
               <div class="card-body">
    
				<?php
				
				/* Truncates sur les tables pour permettre l'import des données du gedcom */
				
				try {
					$req_sup_db = "TRUNCATE TABLE evenements; TRUNCATE TABLE media; TRUNCATE TABLE familles; TRUNCATE TABLE individus; TRUNCATE TABLE lieux; TRUNCATE TABLE sources;";
					$resultat_sup_db = $pdo->prepare ( $req_sup_db );
					$resultat_sup_db->execute ();
					$resultat_sup_db->closeCursor();
					echo '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>&nbsp;&nbsp;Les tables ont bien été préparées.</div>';
					}
				catch ( Exception $e )
					{
					echo '<div class="alert alert-danger"><i class="fas fa-exclamation"></i>&nbsp;&nbsp;Erreur : '. $e->getMessage (). "</div>";
					}
				
				/* Envoyer le gedcom dans le dossier upload */
				
				$dossier = 'upload/';
				$fichier = basename ( $_FILES ['avatar'] ['name'] );

				/* TODO : voir si la taille max de l'upload ne peut pas être définie dans le fichier select_gedcom */		

				$taille_maxi = 10000000;
				$taille = filesize ( $_FILES ['avatar'] ['tmp_name'] );
				$extensions = array ('.ged','.GED');
				$extension = strrchr ( $_FILES ['avatar'] ['name'], '.' );
				
				// Début des vérifications de sécurité...

				/* 
				TODO : si j'utilise dropzonejs, la vérification de l'extension se fait dans select_gedcom.php 
				sinon.. peut-être que je peux faire la vérification au moment où la personne choisi son fichier
				pour éviter de lancer le script lecture.php si l'extension n'est pas bonne.
				*/
				
				/*
				
				if (! in_array ( $extension, $extensions )) // Si l'extension n'est pas dans le tableau
					{
					$erreur = 'Vous devez uploader un fichier de type ged (gedcom)';
					}
				
				if ($taille > $taille_maxi) 
					{
					$erreur = 'Le fichier est trop gros...';
					}
				
				*/
				
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
						echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation"></i>&nbsp;&nbsp;Erreur pendant l\'envoi du fichier !' . "</div>";
						}
					} 
				else 
					{
					echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation"></i>&nbsp;&nbsp;Erreur: ' . $erreur . '</div>';
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
				$tablelieu = 1;
				$nb_source = 0;
				$place = 1;
				$nb_media = 0;
				$public = 1;
				$nb_famille = 0;
				
				while ( ! feof ( $gedcom ) ) 
					{
						
					$ligne = fgets ( $gedcom, 1024 );
					
					/* cette ligne résoud un problème d'encodage de caractère lors de l'import du gedcom heredis */
					$ligne = iconv ( "WINDOWS-1252", "UTF-8", $ligne );
					
					/* -------------- */
					/* Head du gedcom */					
					/* -------------- */
					
					if (preg_match ( "/1 SOUR/", $ligne ) and ($nb_individu == 0))
					{
						/* nom complet du logiciel qui a servi à créer */
						
					 	$logiciel = new logiciels();
					 	$logiciel->nomcomplet = $ligne;
					 	
						/* TODO : mettre ce truc dans la classe qui correspond et mettre dans la BD */
						echo "nom complet du logiciel: " . $ligne . "<br />";
					}
					
					if (preg_match ( "/2 NAME/", $ligne ) and ($nb_individu == 0))
						{
						/* nom du logiciel qui a servi à créer */
							
						$logiciel->nom = $ligne;
							
						/* TODO : mettre ce truc dans la classe qui correspond et mettre dans la BD */
							
							
						echo "nom du logiciel: " . $ligne . "<br />";
						}
											
					/* Information sur l'auteur du gedcom */
					 
					if (preg_match ( "/0 @S0@/", $ligne ))
						{
						$uploader = new uploaders ();
						}
					
					if (preg_match ( "/1 NAME/", $ligne ) and ($nb_individu == 0)) 
						{
							
						/* TODO : mettre ce truc dans la classe qui correspond et mettre dans la BD */
							
						$uploader->name  = implode(" ",array_slice(explode(" ",$ligne), 2));
						
						/*
						 * $req = $pdo->prepare("INSERT INTO membres (login) VALUES (:login)");
						 * $req->bindparam(':login', $uploader->name, PDO::PARAM_STR);
						 * $req->execute ();
						 */
						}
					
					if (preg_match ( "/1 ADDR/", $ligne ) and ($nb_individu == 0)) 
						{
							
						/* TODO : mettre ce truc dans la classe qui correspond et mettre dans la BD */
						
						$uploader->adresse = implode(" ",array_slice(explode(" ",$ligne), 2));

						/*
						 * $req = $pdo->prepare("UPDATE membres SET adresse = :adresse WHERE id=:id");
						 * $req->bindparam(':adresse', $uploader->adresse->nom, PDO::PARAM_STR);
						 * $req->bindparam(':id', ??? , PDO::PARAM_STR);
						 * $req->execute ();
						 */
						}
					
					if (preg_match ( "/1 EMAIL/", $ligne ) and ($nb_individu == 0)) 
						{
						
						/* TODO : mettre ce truc dans la classe qui correspond et mettre dans la BD */
						
						$uploader->mail = implode(" ",array_slice(explode(" ",$ligne), 2));

						}
					
					if (preg_match ( "/1 WWW/", $ligne ) and ($nb_individu == 0)) 
						{
							
						/* TODO : mettre ce truc dans la classe qui correspond et mettre dans la BD */
							
						$uploader->www = implode(" ",array_slice(explode(" ",$ligne), 2));

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
						$individu->nom = implode(" ",array_slice(explode(" ",$ligne), 2));						
						$res = $pdo->prepare ( "UPDATE individus SET nom = :nom WHERE ref=:ref" );
						$res->bindparam ( ':nom', $individu->nom, PDO::PARAM_STR );
						$res->bindparam ( ':ref', $individu->ref, PDO::PARAM_STR );
						$res->execute ();
						}
						
					/* nom de l'individu */
						
					if (preg_match ( "/2 SURN/", $ligne )) 
						{
						$individu->surname = implode(" ",array_slice(explode(" ",$ligne), 2));
						$res = $pdo->prepare ( "UPDATE individus SET surname = :surname WHERE ref=:ref" );
						$res->bindparam ( ':surname', $individu->surname, PDO::PARAM_STR );
						$res->bindparam ( ':ref', $individu->ref, PDO::PARAM_STR );
						$res->execute ();
						}
						
					/* Prénom de l'individu */
						
					if (preg_match ( "/2 GIVN/", $ligne )) 
						{
						$individu->prenom = implode(" ",array_slice(explode(" ",$ligne), 2));
						$res = $pdo->prepare ( "UPDATE individus SET prenom = :prenom WHERE ref=:ref" );
						$res->bindparam ( ':prenom', $individu->prenom );
						$res->bindparam ( ':ref', $individu->ref );
						$res->execute ();
						}
						
					/* Sexe de l'individu */
						
					if (preg_match ( "/1 SEX/", $ligne )) 
						{
						$partie = explode ( " ", $ligne );
						$individu->sexe = $partie [2];
						$res = $pdo->prepare ( "UPDATE individus SET sex = :sex WHERE ref=:ref" );
						$res->bindparam ( ':sex', $individu->sexe );
						$res->bindparam ( ':ref', $individu->ref );
						$res->execute ();
						}
						
					/* -------------------- */
					/* Gestion des familles */
					/* -------------------- */
					
					if (preg_match ( "/@ FAM/", $ligne )) {
						$famille = new famille ();
						$nb_famille = $nb_famille + 1;
						$fam_ref = explode ( "@", $ligne );
						$famille->ref = $fam_ref [1];
						$req = "INSERT INTO familles (ref) VALUES ('$famille->ref')";
						$resultat = $pdo->exec ( $req );
						$nb_chil = 0;
					}
					
					if (preg_match ( "/1 HUSB/", $ligne )) {
						$fam_husb = explode ( "@", $ligne );
						$famille->husb = $fam_husb [1];
						$req = "UPDATE familles SET pere = '$famille->husb' WHERE ref='$famille->ref'";
						$resultat = $pdo->exec ( $req );
					}
					
					if (preg_match ( "/1 WIFE/", $ligne )) {
						$fam_wife = explode ( "@", $ligne );
						$famille->wife = $fam_wife [1];
						$req = "UPDATE familles SET mere = '$famille->wife' WHERE ref='$famille->ref'";
						$resultat = $pdo->exec ( $req );
					}
					
					if (preg_match ( "/1 CHIL/", $ligne )) {
						$fam_chil = explode ( "@", $ligne );
						$famille->chil = $fam_chil [1];
						
						/* si le couple n'a pas encore d'enfant, on complete */
						if ($nb_chil == 0) {
							$req = "UPDATE familles SET enfant = '$famille->chil' WHERE ref='$famille->ref'";
							$nb_chil = $nb_chil + 1;
						} else /* si le couple a déjà un enfant alors la ligne est dupliquée et j'ajoute le nouvel enfant */
						{
							$req = "INSERT INTO familles (ref, pere, mere, enfant) VALUES ('$famille->ref','$famille->husb','$famille->wife','$famille->chil')";
						}
						$resultat = $pdo->exec ( $req );
					}
					
					if (preg_match ( "/1 MARR/", $ligne )) {
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
							$req->bindValue ( ':indiv', $evenement->indiv, PDO::PARAM_INT );
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
						
						$occupation = explode ( " ", $ligne );
						$l = count ( $occupation );
						for($c = 2; $c < $l; $c ++) 
							{
							$evenement->type = $evenement->type . " " . $occupation [$c];
							}
							
						$req = $pdo->prepare ( "INSERT INTO evenements (n_indi, nom, evenement) VALUES (:indiv,:nom,:type)" );
						$req->bindValue ( ':indiv', $evenement->indiv, PDO::PARAM_INT );
						$req->bindValue ( ':nom', $evenement->nom, PDO::PARAM_STR );
						$req->bindValue ( ':type', $evenement->type, PDO::PARAM_STR );
						$req->execute ();
						}
						
					/* Date de l'événement */
					
					if (preg_match ( "/2 DATE/", $ligne ) and ($nb_source == 0)) 
						{
						$date = explode ( " ", $ligne );
						$l = count ( $date );
						for($c = 2; $c < $l; $c ++) 
							{
							$evenement->date = $evenement->date . " " . $date [$c];
							}
						
						/* traduction des mois de la date */
						
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
						$type = explode ( " ", $ligne );
						$l = count ( $type );
						for($c = 2; $c < $l; $c ++) 
							{
							$evenement->type = $evenement->type . " " . $type [$c];
							}
						
						/* TODO : il faut retirer 2 TYPE dans la chaine de caractéres comme pour le nom de l'individu */	
							
						$evenement->type = $ligne;
						
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
						
						$lieu->ville = $place [0];
						
						$lieufinal = explode ( " ", $lieu->ville );
						//$lieutmp = array_shift ( $lieufinal );
						$lieutmp = array_shift ( $lieufinal );
						$lieu->ville = implode ( $lieufinal );
						
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
							while ( $data = $req->fetch (  ) ) 
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
						
						/* TODO : il faut retirer 2 NOTE dans la chaine de caractéres comme pour le nom de l'individu */
						$evenement->note = implode(" ",array_slice(explode(" ",$ligne), 2));	
							
						// $evenement->note = $ligne;
						
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
						echo $ligne;
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
	               
				  <div class="card shadow mb-4">
		               <div class="card-header py-3">
		                <h6 class="m-0 font-weight-bold text-primary"><?php echo BILAN_GEDCOM ?></h6>
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
								<th scope="row">Nom</th>
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
			
						</div>
		          </div>
	              
			  </div>		
							
			  <div class="col-6">
	               
				  <div class="card shadow mb-4">
		               <div class="card-header py-3">
		                <h6 class="m-0 font-weight-bold text-primary"><?php echo BILAN_GEDCOM ?></h6>
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><?php include('include/footer.inc'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo LOGOUT_TITLE; ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo LOGOUT_TEXT; ?></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo LOGOUT_CANCEL; ?></button>
          <a class="btn btn-primary" href="login.html"><?php echo LOGOUT_OK; ?></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Ce script contient l'initialisation du plugin datatables de jquery -->
  <script src="js/demo/datatables-demo.js"></script>
 
</body>
</html>