<?php

/* récupération des infos de l'utilisateur connecté */

$utilisateur = new Utilisateurs();
$utilisateur->login = $_SESSION['login'];
$profilChanged = 0;

$sqlUsers = "SELECT * FROM membres WHERE login='$utilisateur->login'";
$reqUsers = $pdo->prepare($sqlUsers);
$reqUsers->execute();

while ($data = $reqUsers->fetch(PDO::FETCH_ASSOC))
	{
	$utilisateur->id = $data['id'];
	$utilisateur->motdepasse = $data['password'];
	$utilisateur->email = $data['mail'];
	$utilisateur->rang = $data['rang'];
	}

if(isset($_POST['envoi']))
	{ 
	/* si formulaire soumis */

	/* on modifie l'objet */
	$utilisateur->login = $_POST['login'];
	$utilisateur->motdepasse = $_POST['motdepasse'];
	$utilisateur->email = $_POST['email'];
	
	/* le formulaire a été envoyé ! */
	$modifUser = $pdo->prepare("update membres set login = :login, password = :motdepasse, mail = :email where id = :id");
	$modifUser->bindparam(':id',$utilisateur->id , PDO::PARAM_INT);
	$modifUser->bindparam(':login', $_POST['login'] , PDO::PARAM_STR);
	$modifUser->bindparam(':motdepasse', $_POST['motdepasse'] , PDO::PARAM_STR);
	$modifUser->bindparam(':email', $_POST['email'] , PDO::PARAM_STR);
	$modifUser->execute();	

	$msg = "Le profil a bien été mis à jour";
	$profilChanged = 1;
	}

?>

<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=users-list"><?php echo ASIDE_ADMIN_9; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo USER_PROFIL_TTL; ?></li>
		</ol>
        
        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
					<i class="bi bi-people me-2"></i><?php echo USER_PROFIL_TTL; ?>
					</div>
					<div class="card-body">

					<?php
					if ($profilChanged == 1)
						{
						echo '<div class="alert alert-success" role="alert">';
						echo '<i class="bi bi-check-circle-fill me-2"></i>';
						echo $msg;
						echo '</div>';
						}
					?>
  
					<form method="POST" action="index.php?page=user-profil"> 

						<div class="mb-3">
							<label for="InputLogin" class="form-label">Login</label>
							<input type="text" class="form-control" name="login" id="InputLogin" value="<?php echo $utilisateur->login; ?>">
						</div>

						<div class="mb-3">
							<label for="InputEmail" class="form-label">Email</label>
							<input type="email" class="form-control" name="email" id="InputEmail" value="<?php echo $utilisateur->email; ?>">
						</div>

						<div class="mb-3">
							<label for="InputPassword" class="form-label">Mot de passe</label>
							<input type="text" class="form-control" name="motdepasse" id="Inputmotdepasse" value="<?php echo $utilisateur->motdepasse; ?>">
						</div>

						<p>Rang : <?php echo $utilisateur->rang; ?> </p>

						<button type="submit" class="btn btn-primary" name="envoi">Submit</button>

					</form>
					
					</div>
				</div>
			</div> 
		</div>
</div>