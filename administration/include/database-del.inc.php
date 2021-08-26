<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4">Bonjour <?php echo $_SESSION['login']; ?>.</h1> <?php /* TODO : récupérer ici le nom de l'utilisateur */ ?>
	
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=size"><?php echo ASIDE_ADMIN_7; ?></a></li>
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
					
					?>

					</div>
				</div>
			</div> 
		</div>
</div>