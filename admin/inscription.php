

<?php
// on teste si le visiteur a soumis le formulaire
if (isset ( $_POST ['inscription'] ) && $_POST ['inscription'] == 'Inscription') {
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset ( $_POST ['login'] ) && ! empty ( $_POST ['login'] )) && (isset ( $_POST ['pass'] ) && ! empty ( $_POST ['pass'] )) && (isset ( $_POST ['pass_confirm'] ) && ! empty ( $_POST ['pass_confirm'] ))) {
		// on teste les deux mots de passe
		if ($_POST ['pass'] != $_POST ['pass_confirm']) {
			$erreur = 'Les 2 mots de passe sont différents.';
		} else {
			$base = mysql_connect ( 'serveur', 'login', 'password' );
			mysql_select_db ( 'nom_base', $base );
			
			// on recherche si ce login est déjà utilisé par un autre membre
			$sql = 'SELECT count(*) FROM membre WHERE login="' . mysql_escape_string ( $_POST ['login'] ) . '"';
			$req = mysql_query ( $sql ) or die ( 'Erreur SQL !<br />' . $sql . '<br />' . mysql_error () );
			$data = mysql_fetch_array ( $req );
			
			if ($data [0] == 0) {
				$sql = 'INSERT INTO membre VALUES("", "' . mysql_escape_string ( $_POST ['login'] ) . '", "' . mysql_escape_string ( md5 ( $_POST ['pass'] ) ) . '")';
				mysql_query ( $sql ) or die ( 'Erreur SQL !' . $sql . '<br />' . mysql_error () );
				
				session_start ();
				$_SESSION ['login'] = $_POST ['login'];
				header ( 'Location: membre.php' );
				exit ();
			} else {
				$erreur = 'Un membre possède déjà ce login.';
			}
		}
	} else {
		$erreur = 'Au moins un des champs est vide.';
	}
}
?>

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
	
	<title><?php echo SITE_TITLE." - Inscription" ?></title>
	<meta name="description" content=" ">

</head>
<body>

<?php include('include/content.php');?>
		
		
<div style="witdh: 100%; height: 20px; border: 0px solid black;">
	<span class="breadcrumbs pathway">
		<a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
		<img src="../img/arrow.png" alt="" /> <a href="index.php">lorem ipsum</a>
		<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php">lorem ipsum</a>
	</span>
</div>
<!-- fin du fil d'ariane -->

<div id="nav"><?php include ('../include/sidebar.inc');	?></div>

<div id="contenu">

	<h1>XXXXXX</h1>

	Inscription à l'espace membre :<br />
	<form action="inscription.php" method="post">
		Login : <input type="text" name="login"
			value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
		Mot de passe : <input type="password" name="pass"
			value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
		Confirmation du mot de passe : <input type="password"
			name="pass_confirm"
			value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"><br />
		<input type="submit" name="inscription" value="Inscription">
	</form>
<?php
if (isset ( $erreur ))
	echo '<br />', $erreur;
?>

</div>

</body>

</html>