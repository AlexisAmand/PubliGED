<?php
$utilisateur = new Utilisateurs();
$utilisateur->information($pdo, $_SESSION['login']);
?>

<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=articles-list"><?php echo ASIDE_ADMIN_5; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_RUB_SEND_G; ?></li>
		</ol>
        
    <div class="row">
        
      	<div class="col-xl-12">
			    <div class="card mb-4">
            <div class="card-header">
              <i class="bi bi-diagram-3 me-2"></i><?php echo ADM_GED_READ; ?>
            </div>
            <div class="card-body">

                <?php
                /* cette page est dispo uniquement pour le rôle administrateur */
                if($utilisateur->rang == 'administrateur')
                  {
                ?>

                  <p style='text-align: justify;'><?php echo ADM_GED_TEXT; ?></p>

                  <form method="POST" action="index.php?page=gedcom-read" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="avatar">
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end mt-3">
                      <button type="submit" name="envoyer" class="btn btn-sm btn-secondary ms-3"><?php echo ADM_GED_SEND; ?></button>
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