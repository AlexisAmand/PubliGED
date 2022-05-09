<?php
$utilisateur = new Utilisateurs();
$utilisateur->information($pdo, $_SESSION['login']);
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
						if($utilisateur->rang == 'administrateur')
							{
							/* si l'admin veut effacer le gedcom */
							/* c'est ici qu'il faudra faire tous les truncate */
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
	
</div>