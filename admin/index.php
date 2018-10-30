

<?php
// on teste si le visiteur a soumis le formulaire de connexion
if (isset ( $_POST ['connexion'] ) && $_POST ['connexion'] == 'Connexion') {
	if ((isset ( $_POST ['login'] ) && ! empty ( $_POST ['login'] )) && (isset ( $_POST ['pass'] ) && ! empty ( $_POST ['pass'] ))) {

		$base = mysql_connect ( 'serveur', 'login', 'password' );
		mysql_select_db ( 'nom_base', $base );

		// on teste si une entrée de la base contient ce couple login / pass
		$sql = 'SELECT count(*) FROM membre WHERE login="' . mysql_escape_string ( $_POST ['login'] ) . '" AND pass_md5="' . mysql_escape_string ( md5 ( $_POST ['pass'] ) ) . '"';
		$req = mysql_query ( $sql ) or die ( 'Erreur SQL !<br />' . $sql . '<br />' . mysql_error () );
		$data = mysql_fetch_array ( $req );

		mysql_free_result ( $req );
		mysql_close ();

		// si on obtient une réponse, alors l'utilisateur est un membre
		if ($data [0] == 1) {
			session_start ();
			$_SESSION ['login'] = $_POST ['login'];
			header ( 'Location: membre.php' );
			exit ();
		} // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
		elseif ($data [0] == 0) {
			$erreur = 'Compte non reconnu.';
		} // sinon, alors la, il y a un gros problème :)
		else {
			$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
		}
	} else {
		$erreur = 'Au moins un des champs est vide.';
	}
}
?>

<?php
require ('../content/fonctions.php');
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">
	
	<?php include('include/head.php');?>
	
	<title><?php echo SITE_TITLE." ".TITRE_RUB_ADMIN_6; ?></title>
<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>

<div style="witdh: 100%; height: 20px; border: 0px solid black;">
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="index.php"><?php echo ASIDE_ADMIN_4; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php"><?php echo TITRE_RUB_ADMIN_7; ?></a>
		</span>
	</div>

	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc');	?></div>

	<div id="contenu">

		<h1><?php echo ASIDE_ADMIN_0; ?></h1>

		Connexion à l'espace membre :<br />
		<form action="index.php" method="post">
			Login : <input type="text" name="login"
				value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
			Mot de passe : <input type="password" name="pass"
				value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
			<input type="submit" name="connexion" value="Connexion">
		</form>
		<a href="inscription.php">Vous inscrire</a>
<?php
if (isset ( $erreur ))
	echo '<br /><br />', $erreur;
?>

</div>	
	
<?php include('include/endheader.php');?>