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
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="index.php"><?php echo ASIDE_ADMIN_3; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php">lorem
				ipsum</a>
		</span>
	</div>

	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc'); ?></div>

	<div id="contenu">

		<h1>Tables de démos</h1>

<?php

/* Déchargement des données de la table `categories` */

$req = "INSERT INTO `categories` (`nom`) VALUES ('categorie_A'), ('categorie_B');";
$resultat = $pdo->prepare ( $req );
$resultat->execute ();

/* Déchargement des données de la table `membres` */

$req = "INSERT INTO `membres` (`id`, `login`, `pass_md5`, `mail`, `adresse`, `site`) VALUES
       (1, 'Alexis', '', '', '', ''),
       (2, '1 NAME Amand Alexis\r\n', '', '', '', ''),
       (3, '1 NAME Amand Alexis\r\n', '', '', '', ''),
       (4, '1 NAME Amand Alexis\r\n', '', '', '', ''),
       (5, '1 NAME Amand Alexis\r\n', '', '', '', ''),
       (6, '1 NAME Amand Alexis\r\n', '', '', '', '');";
$resultat = $pdo->prepare ( $req );
$resultat->execute ();

/* Articles de démo */

$req = "INSERT INTO `articles` (`ref`, `titre`, `article`, `auteur`, `date`, `id_cat`)
VALUES (NULL, 'Essai d\'un autre article', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
 beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui
dolorem eum fugiat quo voluptas nulla pariatur?', '1', '2017-11-27', '2');";
$resultat = $pdo->prepare ( $req );
$resultat->execute ();

$req = "INSERT INTO `articles` (`ref`, `titre`, `article`, `auteur`, `date`, `id_cat`)
VALUES (NULL, 'Essai d\'un article', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
 beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui
dolorem eum fugiat quo voluptas nulla pariatur?', '1', '2017-11-27', '1');";
$resultat = $pdo->prepare ( $req );
$resultat->execute ();

/* Déchargement des données de la table `blogroll` */

$req = "INSERT INTO `blogroll` (`url`, `description`, `nom`) VALUES 
       ('http://www.genealexis.fr', 'Mon site perso de généalogie', 'Genealexis'),
       ('http://historesdepoilus.genealexis.fr', 'Histoires de poilus', 'Histoires de Poilus');";
$resultat = $pdo->prepare ( $req );
$resultat->execute ();

/* Déchargement des données de la table `commentaires` */

$req = "INSERT INTO  `commentaires` (`id_article`, `nom_auteur`, `email_auteur`, `url_auteur`, `contenu`, `date_com`) VALUES
        ( 1, 'Henri', 'henri@test.fr', 'http://www.genealexis.fr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', '0000-00-00 00:00:00'),
        ( 1, 'Paul', 'alexis.amand@yahoo.fr', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', '2017-06-28 12:09:34');";
$resultat = $pdo->prepare ( $req );
$resultat->execute ();

/* Déchargement des données de la table `modules` */

$req = "INSERT INTO `modules` (`ref`, `nomdumodule`, `visible`, `position`, `description`) VALUES
      (1, 'g-aside-1', 1, 1, 'menu de navigation sur le site'),
      (2, 'g-aside-2', 1, 5, 'menu des statistiques'),
      (3, 'g-aside-3', 1, 4, 'menu des lieux'),
      (4, 'g-aside-4', 1, 2, 'menu des individus'),
      (5, 'g-aside-5', 1, 3, 'menu des événements');";
$resultat = $pdo->prepare ( $req );
$resultat->execute ();

?>

</div>

<?php include('include/endheader.php');?>