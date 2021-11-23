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
					    
					<?php /*TODO : modif du pseudo, modif de l'email, modif de mdp */ ?>
					
					</div>
				</div>
			</div> 
		</div>
</div>