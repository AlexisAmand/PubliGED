<?php
$utilisateur = new Utilisateurs();
$utilisateur->information($pdo, $_SESSION['login']);

$showMessage = 0;

if (isset($_POST['effacerGedcom']))
	{
	/* on vide les tables */
	$sql = "Truncate table evenements;Truncate table familles;Truncate table individus;Truncate table lieux;Truncate table sources;";
	$pdo->query($sql);

	/* on se prépare à afficher un message */
	$message =" Le gedcom a bien été effacé !";
	$showMessage = 1;
	}

?>

<div class="container-fluid px-4">
	
	<h1 class="h3 mt-4"><?php echo HELLO." ".$utilisateur->login; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=articles-list"><?php echo ASIDE_ADMIN_5; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_RUB_DEL_G; ?></li>
		</ol>
        
        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-newspaper me-2"></i><?php echo ADM_RUB_DEL_G; ?>
					</div>
					<div class="card-body">

						<?php 

						if($showMessage == 1)
							{
							echo '<div class="alert alert-success" role="alert">';
							echo '<i class="bi bi-check-circle-fill me-2"></i>';
							echo $message;
							echo '</div>';
							}

						if($utilisateur->rang == 'administrateur')
							{
							/* si l'admin veut effacer le gedcom */
							/* c'est ici qu'il faudra faire tous les truncate */
						?>

						<p><?php echo GEDCOM_DEL_TXT;?></p>

						<form method="POST" action="index.php?page=gedcom-del">
							<div class="d-grid d-md-flex justify-content-md-end mt-3">
							<button type="send"  class="btn btn-sm btn-secondary" name="effacerGedcom" class="btn btn-primary"><?php echo GEDCOM_DEL_BTN;?></button>
							</div>
						</form>

						<?php
							}
						else
							{
							echo NO_ACCESS; /* message si l'utilisateur a le rôle "rédacteur" */
							}
						?>
					
					</div>

				</div>
			</div>
		</div> 
</div>