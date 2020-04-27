<?php

/* basé sur le template SB Admin 2 for Bootstrap 4 */
/* Copyright 2013-2019 Blackrock Digital LLC. Code released under the MIT license. */

require ('../content/fonctions.php');
include ('../config.php');
include('../langues/admin.php');
?>


<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content=" ">
  <meta name="author" content=" ">

  <title><?php echo ASIDE_ADMIN_0." - ".ADM_RUB_TITRE_6; ?></title>

  <!-- Font Awesome 5.9.0 -->
  <link href="css/fontawesome/css/all.min.css" rel="stylesheet" type="text/css"> 
  
  <!-- Custom fonts for this template -->	
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
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
          
          	<li class="nav-item">
			  <a class="nav-link" href="../index.php" target="_blank"><?php echo SEE_SITE; ?></a>
			</li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Alexis A.</span>
                <img class="img-profile rounded-circle" src="img/Avatar.jpg">
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
		          
          <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary"><?php echo ADM_RUB_TITRE_6; ?></h6>
               </div>
               <div class="card-body">

				<p style='text-align: justify;'>Vous pouvez utiliser ce formulaire pour envoyer votre gedcom. Si vous avez d&eacute;jà envoy&eacute; un gedcom sur le site, celui-ci sera effac&eacute; et remplacé par le nouveau.</p>
								
				<form method="POST" action="lecture.php" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="SelectionGedcom">Choisissez un fichier : </label>
				    <input type="file" class="form-control-file" id="SelectionGedcom" name="AvatarGedcom">
				  </div>
				  <button type="submit" class="btn btn-primary">Envoyer</button>
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
			            <span><?php include('include/footer.php'); ?></span>
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
			  <script src="vendor/jquery/jquery.min.js"></script>
			  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
			
			  <!-- Core plugin JavaScript-->
			  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
			
			  <!-- Custom scripts for all pages-->
			  <script src="js/sb-admin-2.min.js"></script>
			
			  <!-- Page level plugins -->
			  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
			  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
			
			    <!-- Ce script contient l'initialisation du plugin datatables de jquery -->
			  <script src="js/demo/datatables-demo.js"></script>
			 
			</body>
			
			</html>