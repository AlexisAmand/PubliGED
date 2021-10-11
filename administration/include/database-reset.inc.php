<?php

if(isset($_POST['envoyerG']))
  {
  /* Truncate la partie Généalogie pour vider les tables */  
  $req_vide_db = "TRUNCATE TABLE evenements; TRUNCATE TABLE media; TRUNCATE TABLE familles; TRUNCATE TABLE individus; TRUNCATE TABLE lieux; TRUNCATE TABLE sources;";
	$resultat_vide_db = $pdo->prepare($req_vide_db);
	$resultat_vide_db->execute();

  $msg = "Les tables de la partie généalogie ont bien été vidées !";

  /* Enregistrement de l'action dans le journal */
  /*
  $moment = date("F j, Y, g:i ");
  file_put_contents("logs/blog.log", $moment." ".$msg."\n" , FILE_APPEND);
  */
  putOnLogG($msg);
  }

if(isset($_POST['envoyerB']))
  {
  /* Truncate sur la partie Blog pour vider les tables */
  $req_vide_db = "TRUNCATE TABLE categories; TRUNCATE TABLE commentaires; TRUNCATE TABLE articles;";
  $resultat_vide_db = $pdo->prepare($req_vide_db);
  $resultat_vide_db->execute();

  $msg = "Les tables de la partie blog ont bien été vidées !";

  /* Enregistrement de l'action dans le journal */
  /*
  $moment = date("F j, Y, g:i ");
  file_put_contents("logs/blog.log", $moment." ".$msg."\n" , FILE_APPEND);
  */
  putOnLogB($msg);
  }

if(isset($_POST['envoyerS']))
  {
  /* Truncate sur la table de la partie Système */  
  $msg = "Plop S !";
  putOnLogB($msg);
  }

?>

<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=articles-list"><?php echo ASIDE_ADMIN_7; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo "Réinitialiser les tables"; ?></li>
		</ol>

    <?php
    if (isset($msg))
      {
      echo '<p class="alert alert-success" role="alert"><i class="bi bi-exclamation-triangle-fill me-2"></i>&nbsp;'.$msg.'</p>';
      }
    ?>
            
    <?php echo ADM_DB_TEXT; ?></p>
    
    <div class="row">
     	<div class="col-xl-12">

        <!-- Tables généalogie -->

				<div class="card mb-4">
         	<div class="card-header">
            <i class="bi bi-server me-2"></i><?php echo ADM_DB_SUBTITLE_G; ?>
          </div>
          <div class="card-body"><p class="mb-4"><?php echo ADM_DB_SUBTEXT_G; ?></p>
            <div class="d-grid d-md-flex justify-content-md-end mt-3">
            <button data-bs-toggle="modal" data-bs-target="#GenealogieModal" class="btn btn-sm btn-secondary"><?php echo ADM_DB_SEND_G; ?></button>
            </div>
          </div> 
        </div>

        <!-- Tables blog -->

        <div class="card mb-4">
          <div class="card-header">
            <i class="bi bi-server me-2"></i><?php echo ADM_DB_SUBTITLE_B; ?>
          </div>
          <div class="card-body"><p class="mb-4"><?php echo ADM_DB_SUBTEXT_B; ?></p>
            <div class="d-grid d-md-flex justify-content-md-end mt-3">
            <button data-bs-toggle="modal" data-bs-target="#BlogModal" class="btn btn-sm btn-secondary"><?php echo ADM_DB_SEND_B; ?></button>
            </div>
          </div> 
        </div>

        <!-- Tables système -->

        <div class="card mb-4">
          <div class="card-header">
            <i class="bi bi-server me-2"></i><?php echo ADM_DB_SUBTITLE_S; ?>
          </div>
          <div class="card-body"><p class="mb-4"><?php echo ADM_DB_SUBTEXT_S; ?></p>
            <div class="d-grid d-md-flex justify-content-md-end mt-3">
            <button data-bs-toggle="modal" data-bs-target="#SysModal" class="btn btn-sm btn-secondary"><?php echo ADM_DB_SEND_S; ?></button>
            </div>
          </div> 
        </div>

       
      </div> 
    </div>
</div>

<!-- Modale pour confirmer le reset des tables de la partie généalogie -->

<div class="modal fade" id="GenealogieModal" tabindex="-1" role="dialog" aria-labelledby="LabelModalGenealogie" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LabelModalGenealogie"><?php echo MDL_GEN_TITLE; ?></h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><?php echo MDL_GEN_TEXT; ?></div>
      <div class="modal-footer">

        <form action="index.php?page=database-reset" method="POST">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo MDL_GEN_NO; ?></button>
          <button class="btn btn-primary" type="submit" id="envoyerG" name="envoyerG" value="envoyerG"><?php echo MDL_GEN_OK; ?></button>
        <form>

      </div>
    </div>
  </div>
</div>

<!-- Modale pour confirmer le reset des tables de la partie blog -->

<div class="modal fade" id="BlogModal" tabindex="-1" role="dialog" aria-labelledby="LabelModalBlog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LabelModalBlog"><?php echo MDL_BLG_TITLE; ?></h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><?php echo MDL_BLG_TEXT; ?></div>
      <div class="modal-footer">

        <form action="index.php?page=database-reset" method="POST">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo MDL_GEN_NO; ?></button>
          <button class="btn btn-primary" type="submit" id="envoyerB" name="envoyerB" value="envoyerB"><?php echo MDL_GEN_OK; ?></button>
        <form>
        
      </div>
    </div>
  </div>
</div>

<!-- Modale pour confirmer le reset des tables de la partie système -->

<div class="modal fade" id="SysModal" tabindex="-1" role="dialog" aria-labelledby="LabelModalSys" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LabelModalSys"><?php echo MDL_SYS_TITLE; ?></h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><?php echo MDL_SYS_TEXT; ?></div>
      <div class="modal-footer">
        
        <form action="index.php?page=database-reset" method="POST">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo MDL_GEN_NO; ?></button>
          <button class="btn btn-primary" type="submit" id="envoyerS" name="envoyerS" value="envoyerS"><?php echo MDL_GEN_OK; ?></button>
        <form>

      </div>
    </div>
  </div>
</div>