<?php 

session_start();

/* page qui sert à se connecter à l'espace membre */

if ((isset($_POST['login']) and !empty($_POST['login'])) and (isset($_POST['password']) and !empty($_POST['password'])))
	{
	/* connexion à SQL */
	$pdo = new PDO ( 'mysql:host=localhost;dbname=publiged', 'root', '' );
	
	$req = $pdo->query("select * from membres where login = '".$_POST['login']."'");
		
	while (($row = $req->fetch(PDO::FETCH_ASSOC)))
		{
			
			var_dump($row);
			
			echo "Dans le while";
			if(password_verify($_POST['password'], $row['pass_md5']))
				{
				$_SESSION['login'] = $_POST['login'];
				header('Location: membre.php');
				}
			else
				{
				echo "pas ok";
				}
		}
	}
?>

<form action="login.php" method="POST">
	Login: <input type="text" name="login"><br />
	Mot de passe: <input type="text" name="password"><br />
	<input type="submit">
</form>

<a href="inscription.php">S'inscrire</a>