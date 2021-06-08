<?php

/* basé sur le template SB Admin 2 for Bootstrap 4 */
/* Copyright 2013-2019 Blackrock Digital LLC. Code released under the MIT license. */
/* Adapté par Alexis AMAND pour le projet PubliGED */

require ('fonctions.php');
require ('../class/class.php');
include ('../config.php');
include ('../langues/admin/fr.php');

$BaseDeDonnees = new BasesDeDonnees;


?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  
  <title><?php echo BCK_TITLE; ?></title>

  <?php include("include/header.inc.php"); ?>

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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bonjour Alexis A.</h1> <?php /* TODO : récupérer ici le nom de l'utilisateur */ ?>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Affichage du nombre total de catégories -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo NB_CATEGORIES; ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $sql_nb_cat = "select * from categories";
                        $req = $pdo->prepare($sql_nb_cat);
                        $req->execute ();
                        echo $req->rowCount ();
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list-ul fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Affichage du nombre total de membres -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?php echo NB_USERS; ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $sql_nb_user = "select * from membres";
                        $req = $pdo->prepare($sql_nb_user);
                        $req->execute ();
                        echo $req->rowCount ();
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Affichage du nombre total d'articles -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo NB_ARTICLES; ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $sql_nb_article = "select * from articles";
                        $req = $pdo->prepare($sql_nb_article);
                        $req->execute ();
                        echo $req->rowCount ();
                        ?>
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Affichage du nombre total de commentaires -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?php echo NB_COMMENTAIRES; ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $sql_nb_com = "select * from commentaires";
                        $req = $pdo->prepare($sql_nb_com);
                        $req->execute ();
                        echo $req->rowCount ();
                        ?>
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">
          
            <!-- Zone pour les derniers articles -->
            <div class="col-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo LAST_ALL_ARTICLES; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                
                <ul clas="list-group list-group-flush">
                <?php 
                
                $output = array_slice($BaseDeDonnees->ListeTitreArticle($pdo), 0, 5); 
                
                foreach ($output as $value) {
                	echo "<li class='list-group-item d-flex justify-content-between align-items-center'>".$value['titre'];
                	echo "<span class='badge badge-pill badge-light'><a href='article-edit.php?id=".$value['ref']."'><i class='far fa-edit text-success'></i></a></span>";
					        echo "</li>";
                }
                        
                ?>
                </ul>   
                
                <p class="text-right">
                	<a href="articles-list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><?php echo ALL_ARTICLE; ?></a>
                </p>             
                
                </div>
              </div>
            </div>
                      
            <!-- Zone avec les stats de la base de données  -->
            <div class="col-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo MY_GEDCOM; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <ul clas="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $BaseDeDonnees->NombreIndividu($pdo).MY_GEDCOM_INDIVIDUALS; ?></li>
                    <li class="list-group-item"><?php echo $BaseDeDonnees->NombreLieux($pdo).MY_GEDCOM_PLACE; ?></li>
                    <li class="list-group-item"><?php echo $BaseDeDonnees->NombreFamilles($pdo).MY_GEDCOM_FAMILIES; ?></li>
                    <li class="list-group-item"><?php echo $BaseDeDonnees->NombreSources($pdo).MY_GEDCOM_SRC; ?></li>
                    <li class="list-group-item"><?php echo $BaseDeDonnees->NombreEvenements($pdo).MY_GEDCOM_EVE; ?></li>
                  </ul>    
                  
                  <p class="text-right">
                	<a href="articles-list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><?php echo "Envoyer mon gedcom"; ?></a>
                  </p>  
                                    
                </div>
              </div>
            </div>
                                
            <!-- Zone pour les derniers commentaires  -->
            <div class="col-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo LAST_ALL_COM; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                                 		     
                	<?php 
             			                                 
	                $sql = $pdo->prepare ("SELECT * FROM commentaires");
	                $sql->execute();
	                  
	                if ($sql->rowCount() > 0)
	                  	{
	                  		
	                ?>
	                  
	            	<table class="table table-striped">
	             		<thead>
		                	<tr>
			                	<th scope="col">Date</th>
			                  	<th scope="col">Article</th>
			                  	<th scope="col">Auteur</th>
			                  	<th scope="col">Commentaire</th>
		                  	</tr>
	                  	</thead>
	                  	<tbody>
	                  
	                    <?php                  
	                
	                  	// var_dump($sql->execute()); -> donne true
	                                        		                                  
		                while($row = $sql->fetch(PDO::FETCH_ASSOC)) 
		                	{
		                  	echo '<tr>';
		                  	echo "<td>".$row['date_com']."</td>";
		                  	echo "<td>".RecupTitreArticle($pdo, $row['id_article'])."</td>";
		                    echo "<td>".$row['nom_auteur']."</td>";
		                    echo "<td>".$row['contenu']."</td>";
		                    echo "</tr>";
			                }
			          
			           ?>
			
					   </tbody>
                  	</table>
                  
                  	<?php			               
			          	}
	                  else 
	                  	{
	                  	echo "Pas de commentaire pour le moment !";
	                  	}
		            ?>
		                  			                                                                                          
                  <p class="text-right">
                	<a href="commentaires.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><?php echo ALL_COM; ?></a>
                  </p>   
                  
                </div>
              </div>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel"><?php echo LOGOUT_TITLE; ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo LOGOUT_TEXT; ?></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo LOGOUT_CANCEL; ?></button>
          <a class="btn btn-primary" href="login.html"><?php echo LOGOUT_OK?></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../node_modules/jquery.easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.js"></script>

  <!-- JS de chart.js via npm -->
  <script src="../node_modules/chart.js/dist/chart.min.js"></script>

  <!-- JS de chart.js perso -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>