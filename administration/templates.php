<?php

/* basé sur le template SB Admin 2 for Bootstrap 4 */
/* Copyright 2013-2019 Blackrock Digital LLC. Code released under the MIT license. */

require ('fonctions.php');
include ('../config.php');
include('../langues/admin/fr.php');

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

  echo "Le fichier a été envoyé";

  $NomDuFavicon = $_FILES['favicon']['name'];

  var_dump($NomDuFavicon);

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

  echo "Le fichier n'a pas été envoyé";

  $req = $pdo->prepare("SELECT * FROM configuration WHERE nom='favicon'");
  $req->execute();
  $rowFavicon = $req->fetch();
  $NomDuFavicon = $rowFavicon['valeur'];
  }

?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  
  <title><?php echo ASIDE_ADMIN_0." - ".ADM_RUB_TITRE_4; ?></title>

  <?php include("include/header.inc.php"); ?>
  
  <!-- CSS de datatables via npm -->
  <link href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  <style>

  /* Personnalisation du bouton parcourir */

  .custom-file-input ~ .custom-file-label::after 
    {
    content: "Parcourir";
    }

  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include('include/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
          	
          	<!-- Affichage du lien "voir le site" -->
          	<li class="nav-item">
			  <a class="nav-link" href="../index.php" target="_blank"><?php echo SEE_SITE; ?></a>
			</li>
          
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Alexis A.</span>
                <img class="img-profile rounded-circle" src="img/avatar.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo PROFIL; ?>
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo SETTINGS; ?>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo LOGOUT; ?>
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        
        <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?php echo ADM_RUB_TITRE_9; ?></h1>
          <p class="mb-4"> </p>

          <form action="templates.php" method="POST" enctype="multipart/form-data">
          
          <!-- Choix du theme -->
          <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary"><?php echo ADM_TH_TITLE; ?></h6>
               </div>
               <div class="card-body">

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

          <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary"><?php echo FAV_TITLE; ?></h6>
               </div>
               <div class="card-body">

                <div class="row">

                <p><?php echo FAV_TEXT; ?><img src="<?php echo '/templates/'.$NomDuTemplate.'/images/'.$NomDuFavicon ?>"></p>
  
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="validatedInputGroupCustomFile" name="favicon" value="plop">
                      <label class="custom-file-label" for="validatedInputGroupCustomFile"><?php echo FAV_SELECT; ?></label>
                    </div>

                    <!-- Favicon actuel -->

                </div>
	
			    </div>

          </div>
          
			<input type="submit" class="btn btn-primary" value="<?php echo FAV_SEND; ?>">

		</form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><?php include('include/footer.inc'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo LOGOUT_TITLE; ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo LOGOUT_TEXT; ?></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo LOGOUT_CANCEL; ?></button>
          <a class="btn btn-primary" href="login.html"><?php echo LOGOUT_OK; ?></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- jQuery Easing Plugin via npm -->
  <script src="../node_modules/jquery.easing/jquery.easing.min.js"></script>

  <!-- JS de sb-admin -->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- JS de datatables avec npm -->
  <script src="../node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

  <!-- JS de datatables perso -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>