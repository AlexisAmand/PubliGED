<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4">Bonjour <?php echo $_SESSION['login']; ?>.</h1> <?php /* TODO : récupérer ici le nom de l'utilisateur */ ?>
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=users-list"><?php echo ASIDE_ADMIN_9; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_RUB_ADD_USER; ?></li>
		</ol>
        
        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-newspaper me-2"></i><?php echo ADM_RUB_ADD_USER; ?>
					</div>
					<div class="card-body">
					    
					<?php /*TODO */ ?>
					</div>

				</div>
			</div> 
		</div>
</div>