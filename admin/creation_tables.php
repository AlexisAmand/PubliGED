<?php
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
?>

<!doctype html>
<html lang="fr">
<head>

	<meta charset="utf-8">
	
	<?php include('include/head.php');?>
	
	<title><?php echo SITE_TITLE." - Installation" ?></title>
	<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>
			
<div style="witdh: 100%; height: 20px; border: 0px solid black;">
	<span class="breadcrumbs pathway">
		<a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
		<img src="../img/arrow.png" alt="" /> <a href="index.php"><?php echo ASIDE_ADMIN_3; ?></a>
		<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php"><?php echo TITRE_RUB_ADMIN_8; ?></a>
	</span>
</div>

<!-- fin du fil d'ariane -->

<div id="nav"><?php include ('include/sidebar.inc'); ?></div>

<div id="contenu">

<h1><?php echo TITRE_RUB_ADMIN_8; ?></h1>

<?php 

/* Structure de la table `categories` */

try 
    {
    $req = "CREATE TABLE if not exists  `categories` (
           `ref` int(11) NOT NULL AUTO_INCREMENT,
           `nom` varchar(50) NOT NULL,
           CONSTRAINT pk_categories PRIMARY KEY (ref)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table categories [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table categories : ', $e->getMessage (), "<br />";
    }
    
/* Structure de la table `membres` */
    
try
    {
    $req = "CREATE TABLE if not exists  `membres` (
           `id` int(11) NOT NULL AUTO_INCREMENT,
           `login` varchar(50) NOT NULL,
           `pass_md5` varchar(50) NOT NULL,
           `mail` varchar(50) NOT NULL,
           `adresse` varchar(250) NOT NULL,
           `site` varchar(100) NOT NULL,
           CONSTRAINT pk_membres PRIMARY KEY (id)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table membres [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table membres : ', $e->getMessage (), "<br />";
    }

/* Structure de la table `articles` */

try 
    {
    $req = "CREATE TABLE if not exists `articles` ( 
           `ref` int(11) NOT NULL  AUTO_INCREMENT, 
           `titre` varchar(250) NOT NULL, 
           `article` text NOT NULL, 
           `auteur` int(11) NOT NULL,  
           `date` date NOT NULL,
           `id_cat` int(11) NOT NULL, 
           CONSTRAINT pk_articles PRIMARY KEY (ref), 
           CONSTRAINT fk_categories FOREIGN KEY (id_cat) REFERENCES categories(ref),
           CONSTRAINT fk_membres FOREIGN KEY (auteur) REFERENCES membres(id)
           ) ENGINE=InnoDB 
           DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table articles [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table articles : ', $e->getMessage (), "<br />";
    }
    
/* Structure de la table `blogroll`  */
    
try 
    {
    $req ="CREATE TABLE  if not exists `blogroll` (
          `ref` int(11) NOT NULL AUTO_INCREMENT,
          `url` varchar(50),
          `description` varchar(200) NOT NULL,
          `nom` varchar(20) NOT NULL,
          CONSTRAINT pk_blogroll PRIMARY KEY (ref)
          ) ENGINE=InnoDB 
          DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ($req);
    $resultat->execute ();
    echo "Création de la table blogroll [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table blogroll : ', $e->getMessage (), "<br />";
    }
        
/* Structure de la table `commentaires` */
    
try 
    {
    $req = "CREATE TABLE  if not exists `commentaires` (
           `ref` int(11) AUTO_INCREMENT AUTO_INCREMENT,
           `id_article` int(11) NOT NULL,
           `nom_auteur` varchar(250) CHARACTER SET latin1 NOT NULL,
           `email_auteur` varchar(250) CHARACTER SET latin1 NOT NULL,
           `url_auteur` varchar(250) CHARACTER SET latin1 NOT NULL,
           `contenu` varchar(250) CHARACTER SET latin1 NOT NULL,
           `date_com` datetime NOT NULL,
           CONSTRAINT pk_commentaires PRIMARY KEY (ref),
           CONSTRAINT fk_articles FOREIGN KEY (id_article) REFERENCES articles (ref)   
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table commentaires [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table commentaires : ', $e->getMessage (), "<br />";
    }
              
/* Structure de la table `configuration` */
    
try 
    {
    $req = "CREATE TABLE if not exists  `configuration` (
           `nom` varchar(250) NOT NULL,
           `valeur` varchar(250) NOT NULL,
           CONSTRAINT pk_configuration PRIMARY KEY (nom)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table configuration [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table configuration : ', $e->getMessage (), "<br />";
    }

/* Structure de la table `individus` */

try 
    {
    $req = "CREATE TABLE  if not exists `individus` (
           `id` int(11) NOT NULL,
           `ref` varchar(11) NOT NULL,
           `nom` varchar(100) DEFAULT NULL,
           `prenom` varchar(100) DEFAULT NULL,
           `sex` varchar(5) DEFAULT NULL,
           `surname` varchar(100) NOT NULL,
           `note` varchar(500) NOT NULL,
           `public` tinyint(1) NOT NULL,
           `filiation` varchar(100) NOT NULL,
           CONSTRAINT pk_individus PRIMARY KEY (ref)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table individus [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table individus : ', $e->getMessage (), "<br />";
    }

/* Structure de la table `lieux` */
    
try 
    {
    $req = "CREATE TABLE if not exists  `lieux` (
           `ref` int(11) AUTO_INCREMENT,
           `ville` varchar(250) NOT NULL,
           `cp` varchar(10) NOT NULL,
           `dep` varchar(50) NOT NULL,
           `region` varchar(50) NOT NULL,
           `pays` varchar(50) NOT NULL,
           `continent` varchar(15) NOT NULL,
           CONSTRAINT pk_lieux PRIMARY KEY (ref)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ($req);
    $resultat->execute ();
    echo "Création de la table lieux [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table lieux : ', $e->getMessage (), "<br />";
    }
       
/* Structure de la table `media` */
    
try
    {
    $req = "CREATE TABLE if not exists  `media` (
           `ref` varchar(11) NOT NULL,
           `fichier` varchar(250) NOT NULL,
           `type` varchar(5) NOT NULL,
           CONSTRAINT pk_media PRIMARY KEY (ref)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table media [OK]<br />";
    }
catch ( Exception $e )
    {
        echo 'Erreur pendant la création de la table media : ', $e->getMessage (), "<br />";
    }
    
/* Structure de la table `sources` */
    
try
    {
    $req = "CREATE TABLE  if not exists `sources` (
           `id` int(11) NOT NULL,
           `ref` int(11) NOT NULL,
           `titre` varchar(100) NOT NULL,
           `nom` varchar(250) NOT NULL,
           `source` varchar(250) NOT NULL,
           `media` varchar(11) NOT NULL,
           CONSTRAINT pk_sources PRIMARY KEY (ref),
           CONSTRAINT fk_media FOREIGN KEY (media) REFERENCES media (ref)   
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table sources [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table sources : ', $e->getMessage (), "<br />";
    }
                    
/* Structure de la table `evenements` */
                    
try 
    {
    $req = "CREATE TABLE if not exists  `evenements` (
           `n_eve` int(11) NOT NULL,
           `n_indi` varchar(11) DEFAULT NULL,
           `evenement` varchar(100) DEFAULT NULL,
           `date` varchar(100) DEFAULT NULL,
           `lieu` int(11),
           `source` int(11) DEFAULT NULL,
           `nom` varchar(100) DEFAULT NULL,
           `note` varchar(500) DEFAULT NULL,
           CONSTRAINT pk_evenements PRIMARY KEY (n_eve),
           CONSTRAINT fk_individu FOREIGN KEY (n_indi) REFERENCES individus (ref),
           CONSTRAINT fk_lieu FOREIGN KEY (lieu) REFERENCES lieux (ref),
           CONSTRAINT fk_source FOREIGN KEY (source) REFERENCES sources (ref)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ($req);
    $resultat->execute ();
    echo "Création de la table evenements [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table evenements : ', $e->getMessage (), "<br />";
    }

/* Structure de la table `familles` */
    
try {
    $req = "CREATE TABLE  if not exists `familles` (
           `id` int(11) NOT NULL AUTO_INCREMENT,
           `ref` varchar(100) DEFAULT NULL,
           `pere` varchar(11) DEFAULT NULL,
           `mere` varchar(11) DEFAULT NULL,
           `enfant` varchar(11) DEFAULT NULL,
           `date` varchar(50) NOT NULL,
           CONSTRAINT pk_familles PRIMARY KEY (id),
           CONSTRAINT fk_pere FOREIGN KEY (pere) REFERENCES individus (ref),
           CONSTRAINT fk_mere FOREIGN KEY (mere) REFERENCES individus (ref),
           CONSTRAINT fk_enfant FOREIGN KEY (enfant) REFERENCES individus (ref)   
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ($req);
    $resultat->execute ();
    echo "Création de la table familles [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table familles : ', $e->getMessage (), "<br />";
    }
                                                                    
/* Structure de la table `modules` */

try
    {
    $req = "CREATE TABLE if not exists  `modules` (
           `ref` int(11) NOT NULL AUTO_INCREMENT,
           `nomdumodule` varchar(250) NOT NULL,
           `visible` tinyint(1) NOT NULL,
           `position` int(11) NOT NULL,
           `description` varchar(250) NOT NULL,
           CONSTRAINT pk_modules PRIMARY KEY (ref)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table modules [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table modules : ', $e->getMessage (), "<br />";
    }
                                                                                                              


/* Structure de la table `villes_belgique` */

try
    {
    $req = "CREATE TABLE  if not exists `villes_belgique` (
           `geonameid` int(11) NOT NULL,
           `name` varchar(200) CHARACTER SET latin1 NOT NULL,
           `asciiname` varchar(200) CHARACTER SET latin1 NOT NULL,
           `alternatenames` varchar(10000) CHARACTER SET latin1 NOT NULL,
           `latitude` float NOT NULL,
           `longitude` float NOT NULL,
           `country code` char(2) CHARACTER SET latin1 NOT NULL,
           `cc2` varchar(200) CHARACTER SET latin1 NOT NULL,
           CONSTRAINT pk_villes_belgique PRIMARY KEY (geonameid)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table villes_belgique [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table villes_belgique : ', $e->getMessage (), "<br />";
    }

/* Structure de la table `villes_france` */

try
    {
    $req = "CREATE TABLE if not exists  `villes_france` (
           `id` int(11) NOT NULL,
           `id_departement` int(11) NOT NULL,
           `nom_commune` text CHARACTER SET latin1 NOT NULL, 
           `slug` text CHARACTER SET latin1 NOT NULL,
           `codepostal` text CHARACTER SET latin1 NOT NULL,
           `codeinsee` varchar(8) CHARACTER SET latin1 NOT NULL,
           `latitude` text CHARACTER SET latin1 NOT NULL,
           `longitude` text CHARACTER SET latin1 NOT NULL,
           CONSTRAINT pk_villes_france PRIMARY KEY (id)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resultat = $pdo->prepare ( $req);
    $resultat->execute ();
    echo "Création de la table villes_france [OK]<br />";
    }
catch ( Exception $e )
    {
    echo 'Erreur pendant la création de la table ville_france : ', $e->getMessage (), "<br />";
    }

?>

</div>

<?php include('include/endheader.php');?>