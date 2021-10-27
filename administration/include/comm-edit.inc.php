<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=articles-list"><?php echo ASIDE_ADMIN_2; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo COMM_EDIT; ?></li>
		</ol>
        
        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-chat-text me-2"></i><?php echo COMM_EDIT; ?>
					</div>
					<div class="card-body"></div>
					    
						<?php echo COMM_EDIT." ".$_GET['id']; ?>
			
					</div>

					</div>
				</div>
			</div> 
		</div>
</div>