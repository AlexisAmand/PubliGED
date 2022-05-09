<?php
$utilisateur = new Utilisateurs();
$utilisateur->information($pdo, $_SESSION['login']);
?>

<div class="container-fluid px-4">
	
	<h1 class="h3 mt-4"><?php echo HELLO." ".$utilisateur->login; ?>.</h1> 
	
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=database-size"><?php echo ASIDE_ADMIN_7; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_DB_SUPPR; ?></li>
		</ol>
        
        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-server me-2"></i><?php echo ADM_DB_SUPPR; ?>
					</div>
					<div class="card-body">

					<?php

					/* Pas sûr que l'utilisateur ait vraiment besoin de vider sa base de données */
					/* On dirait que ça fait doublon avec la page database-del */

					if($utilisateur->rang == 'administrateur')
						{
						/* si l'admin veut vider les bases de données */
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