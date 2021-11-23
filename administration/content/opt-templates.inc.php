<?php

/* Récup du thème utilisé ou mise à jour de la BD avec le nouveau */

if (!empty($_POST['template']))
  {
  $mod = "UPDATE configuration SET valeur ='" . $_POST['template'] . "' WHERE nom = 'template'";
  $res = $pdo->prepare ( $mod );
  $res->execute ();
  $NomDuTemplate = $_POST['template'];
  }
else
  {
  $req = $pdo->prepare("SELECT * FROM configuration WHERE nom='template'");
  $req->execute();
  $rowTemplate = $req->fetch();  
  $NomDuTemplate = $rowTemplate['valeur'];
  }

/* Récup du favicon utilisé ou mise à jour de la BD avec le nouveau */

if(!empty($_FILES['favicon']))
  {
  echo FAV_SELECT_SEND;
  $NomDuFavicon = $_FILES['favicon']['name'];
  $mod = "UPDATE configuration SET valeur ='" . $NomDuFavicon . "' WHERE nom = 'favicon'";
	$res = $pdo->prepare ( $mod );
	$res->execute (); 

  /* On déplace le nouveau favicon vers le dossier du template */

  // $up_dir = '/templates/'.$NomDuTemplate.'/images';
  // $tmp_name = $_FILES["favicon"]["tmp_name"];
  /*$name = basename($_FILES["favicon"]["name"]);*/
  // $NomDuFavicon = $_FILES["favicon"]["name"];
  // move_uploaded_file($tmp_name, $up_dir."/".$NomDuFavicon);
  }
else
  {
  echo "Le favicon n'a pas été envoyé";
  $req = $pdo->prepare("SELECT * FROM configuration WHERE nom='favicon'");
  $req->execute();
  $rowFavicon = $req->fetch();
  $NomDuFavicon = $rowFavicon['valeur'];
  }

?>

<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="#"><?php echo ASIDE_ADMIN_8; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_RUB_PERSO; ?></li>
		</ol>
        
        <div class="row">
        
        	<div class="col-xl-12">
            <div class="card mb-4">
              <div class="card-header">
                <i class="bi bi-gear me-2"></i><?php echo ADM_RUB_PERSO; ?>
              </div>
              <div class="card-body">

                <form action="index.php?page=opt-templates" method="POST" enctype="multipart/form-data">

                <p class="text-justify"><?php echo ADM_TH_TEXT_PART_1; ?><a href="https://bootswatch.com">Bootswatch</a><?php echo ADM_TH_TEXT_PART_2; ?><a href="https://mit-license.org">MIT</a>.</p>

                <div class="row">

                  <?php

                  $d = dir("../templates/");
                  while($entry = $d->read()) 
                    {
                    $pasglop = array(".", "..", "system");
                    if (!in_array($entry, $pasglop)) 
                      {
                      echo '<div class="col-md-4 col-12 col-sm-6 mb-3 col-lg-3">';
                                                
                      /* La miniature existe ? On affiche sinon... bah une miniature par défaut récupérée sur Placeholder */

                      $thumbTheme = '../templates/'.$entry.'/'.$entry.'.png';

                      echo '<figure class="figure">';

                      if(file_exists($thumbTheme))
                        {
                        echo '<img src="'.$thumbTheme.'" class="img-fluid rounded img-thumbnail">';
                        }
                      else
                        {
                        echo '<img src="https://via.placeholder.com/2560x1560.png" class="img-fluid rounded img-thumbnail">';
                        }
                          
                      /* vérification du theme actuel, pour cocher la case... */
          
                      if($entry == $NomDuTemplate)
                        {
                        echo '<figcaption class="figure-caption text-center pt-2">';
                        echo '<input type="radio" name="template" value="'.$entry.'" checked>&nbsp;'
                            ."<span class='text-capitalize'>".$entry.'</span></div>';
                        echo '</figcaption>';
                        }
                      else
                        {
                        echo '<figcaption class="figure-caption text-center pt-2">';
                        echo '<input type="radio" name="template" value="'.$entry.'">&nbsp;'
                            ."<span class='text-capitalize'>".$entry.'</span></div>';
                        echo '</figcaption>';
                        }
                        
                      echo '</figure>';

                      }

                    }

                  /* Fermeture du dossier template */ 
                  $d->close();
                  ?>

            </div>
	
			    </div>

          </div>

          <!-- Choix du favicon -->

          <div class="card mb-4">
          	<div class="card-header">
            	<i class="bi bi-gear me-2"></i><?php echo FAV_TITLE; ?>
            </div>
            <div class="card-body">

               	<div class="row">

                <p><?php echo FAV_TEXT; ?><img src="<?php echo '/templates/'.$NomDuTemplate.'/images/'.$NomDuFavicon ?>"></p>
  
                    <div class="custom-file">

                      <label for="formFile" class="form-label"><?php echo FAV_SELECT; ?></label>
                      <input class="form-control" type="file" id="formFile" name="favicon">

                    </div>
                </div>
			</div>
          </div>
          
      	  <div class="d-grid d-md-flex justify-content-md-end mt-3">
		    <button type="submit" name="envoyer" class="btn btn-sm btn-secondary"><?php echo FAV_SEND; ?></button>
   	      </div>

		</form>

</div>