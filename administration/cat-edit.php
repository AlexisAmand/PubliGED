<?php

/* basé sur le template SB Admin 2 for Bootstrap 4 */
/* Copyright 2013-2019 Blackrock Digital LLC. Code released under the MIT license. */
/* Adapté par Alexis AMAND pour le projet PubliGED */

require ('fonctions.php');
include ('../config.php');
include ('../langues/admin/fr.php');
include ('../langues/admin/help.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  
  <title><?php echo BCK_TITLE." - Edition d'une catégorie"; ?></title>

  <?php include("include/header.inc.php"); ?>
  
  <!-- CSS de datatables via npm -->
  <link href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 
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
		<h1 class="h3 mb-2 text-gray-800"><?php echo ADM_CAT_EDIT; ?></h1>

         <div class="card shadow mb-4">
            
            <div class="card-body">
            
            <?php

            if (!empty($_POST['Nom']) and !empty($_POST['NouveauNom']))
                {
                    /* $sql = $pdo->prepare("update categories set nom = :nouveaunom , description = :descriptionnom where nom = :nom"); */
                    $sql = $pdo->prepare("update categories set nom = :nouveaunom where nom = :nom");
                    $sql->bindparam(':nom', $_POST['Nom'] , PDO::PARAM_STR);
                    $sql->bindparam(':nouveaunom', $_POST['NouveauNom'] , PDO::PARAM_STR);
                    // $sql->bindparam(':descriptionnom', $_POST['DescriptionNom'] , PDO::PARAM_STR);

                    echo var_dump($_POST);
                    
                    try
                        {
                        $sql->execute();
                        echo '<div class="alert alert-success" role="alert">';
                        echo '<i class="fas fa-check"></i>La catégorie a bien été modifiée';
                        echo '</div>';
                        }
                    catch(exception $e)
                        {
                        echo '<div class="alert alert-warning" role="alert">';
                        echo '<i class="fas fa-exclamation-triangle"></i>'.$e;
                        echo '</div>';
                        }
                }
                
            ?>

            <form action="cat-edit.php?cat=<?php echo $_GET['cat']; ?>" method="POST">
                <div class="form-group">
                    <label for="NomCategorie"><?php echo ADM_CAT_NAME; ?>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="<?php echo HELP_1; ?>">
                    <i class="far fa-question-circle"></i></a></label>
                    <input readonly type="text" class="form-control" id="NomCategorie" name="Nom" value="<?php echo get_category_name($pdo, $_GET['cat']); ?>">
                </div>
                <div class="form-group">
                    <label for="NouveauNomCategorie"><?php echo ADM_CAT_NEW; ?>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="<?php echo HELP_2; ?>">
                    <i class="far fa-question-circle"></i></a></label>
                    <input type="text" class="form-control" id="NouveauNomCategorie" name="NouveauNom">
                </div>
                <div class="form-group">
                    <label for="DescriptionCategorie"><?php echo ADM_CAT_DES; ?>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="<?php echo HELP_3; ?>">
                    <i class="far fa-question-circle"></i></a></label>
                    <textarea class="form-control" id="DescriptionCategorie" rows="3" name="DescriptionNom"></textarea>
                </div>

                <input type="submit" class="btn btn-primary" value="Enregistrer">

            </form>

            </div>
         </div> 
             
         

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

  <script>
  $(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
  </script>
 
</body>
</html>