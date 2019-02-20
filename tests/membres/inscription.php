<?php

session_start();

/* inscription à l'espace membre */

/* vérification que les 3 champs ont bien été complétés */

if (((isset($_POST['login'])) and (!empty($_POST['login']))) and ((isset($_POST['password'])) and (!empty($_POST['password']))) and	((isset($_POST['passwordverif'])) and (!empty($_POST['passwordverif']))))
	{
	/* on vérifie que les deux mots de passent sont les mêmes */
		if ($_POST['password'] !== $_POST['passwordverif'])
			{
			echo "les deux mots de passe ne sont pas les mêmes<br />";
			}
		else 
			{
			/* connexion à SQL */
			$pdo = new PDO ( 'mysql:host=localhost;dbname=publiged', 'root', '' );
			
			/* on vérifie qu'un membre n'a pas déjà ce pseudo */
								
				$req = $pdo->query("select * from membres where login = '".$_POST['login']."'");
				
				$count = $req->rowCount();
				
				if ($count == 0)
					{
					/* perso n'a ce pseudo, on peut donc l'ajouter */
					echo "ce pseudo n'est pas utilisé<br />";
					try {
						$req2 = "Insert into membres (login, pass_md5) values (:param1, :param2)";
					
						$result2 = $pdo->prepare($req2);
						$result2->bindParam(':param1', $_POST['login'], PDO::PARAM_STR);
						$result2->bindParam(':param2', password_hash($_POST['password'],PASSWORD_DEFAULT), PDO::PARAM_STR);
					
						$result2->execute();
						
						$_SESSION['login']=$_POST['login'];
						
						header('Location: membre.php');
						}
					catch(Exception $e)
						{
						echo "Exception ".$e;
						}
					}
					
				else 
					{
					/* Quelqu'un a ce pseudo */
					echo "ce pseudo est utilisé<br />";
					}
			}
	}
else
	{
	/* Si on arrive ici, c'est qu'un champ n'est pas ok */
	echo "Un des champs n'est pas bon<br />";
	}

?>

<form action="inscription.php" method="POST">
	Login: <input type="text" name="login"><br />
	Mot de passe: <input type="text" name="password"><br />
	Vérification du mot de passe: <input type="text" name="passwordverif"><br />
	<input type="submit">
</form>