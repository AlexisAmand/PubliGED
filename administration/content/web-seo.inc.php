<?php

$utilisateur = new Utilisateurs();
$utilisateur->information($pdo, $_SESSION['login']);

/* Si des options ont été envoyées, on les récupére */

if (isset($_POST['TitreSite']) and isset($_POST['DescriptionSite']))
  {
  $sql = "update configuration set valeur ='".$_POST['TitreSite']."' where nom='titre'";
  $req = $pdo->prepare($sql);
  $req->execute();

  $sql = "update configuration set valeur ='".$_POST['DescriptionSite']."' where nom='description'";
  $req = $pdo->prepare($sql);
  $req->execute();

  $msg="Modifications enregistrées !";
  }

/* Sinon, on récup les infos présentes dans la base de données */

$sql = "select * from configuration where nom='titre'";
$req = $pdo->prepare($sql);
$req->execute();

$row = $req->fetch();
$TitreSite = $row['valeur'];

$sql = "select * from configuration where nom='description'";
$req = $pdo->prepare($sql);
$req->execute();

$row = $req->fetch();
$DescriptionSite = $row['valeur'];

?>

<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$utilisateur->login; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="#"><?php echo BCK_RUB_TITLE_4; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ASIDE_ADMIN_10; ?></li>
		</ol>
        
        <div class="row">
        
        	<div class="col-xl-12">

          <?php
          /* On affiche un message si l'enregistre des infos pour l'en-tête s'est bien passée */
          if (isset($msg))
            {
            echo '<div class="alert alert-success d-flex align-items-center" role="alert">';
						echo '<i class="bi bi-check-circle-fill me-2"></i> '.$msg;
						echo '</div>';
            }
          ?>

          <form action="index.php?page=web-seo" method="POST"> 

            <div class="card mb-4">
              <div class="card-header">
                <i class="bi bi-file-text me-2"></i><?php echo ASIDE_ADMIN_10; ?>
              </div>
              <div class="card-body">

                <?php
                /* cette page est dispo uniquement pour le rôle administrateur */
                if($utilisateur->rang == 'administrateur')
                  {
                ?>
                  <p><?php echo SEO_TXT_1; ?></p>
                
                  <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text"><?php echo ADM_HD_SITE_NAME; ?></span>
                    <input type="text" class="form-control" id="TitreInput" value="<?php echo $TitreSite; ?>" name="TitreSite">
                  </div>

                  <div class="input-group input-group-sm mb-3">
                      <span class="input-group-text"><?php echo ADM_HD_SITE_DESC; ?></span>
                      <input type="text" class="form-control" id="DescriptionInput" value="<?php echo $DescriptionSite; ?>" name="DescriptionSite">
                  </div>

              </div>    
            </div>

            <div class="card mb-4">
              <div class="card-header py-3">
            	  <i class="bi bi-file-text me-2"></i><?php echo ADM_SEO; ?>
              </div>

              <div class="card-body">

              <p><?php echo SEO_TXT_2; ?></p>

                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><?php echo ADM_SEO_TITLE; ?></span>
                  <input type="text" class="form-control" id=" " value=" " name=" ">
                </div>

                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><?php echo ADM_SEO_DESC; ?></span>
                  <input type="text" class="form-control" id=" " value=" " name=" ">
                </div>

              </div>
            </div>
             
            <div class="d-grid d-md-flex justify-content-md-end mt-3">
              <button type="submit" name="enregistrer" class="btn btn-sm btn-secondary"  value="Enregistrer"><?php echo SEO_SAVE; ?></button>
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

<?php 

/* l'utilisateur est un rédacteur, il n'a pas la permission de voir la page */


?>