<?php

session_set_cookie_params(0);

// si l'utilisateur est connecté, on affiche la page 
// sinon, on lui affiche l'écran de login

session_start();

if (!isset($_SESSION['login'])) {
	header ('Location: login.php');
	exit();
}

/* 
Start Bootstrap - SB Admin v7.0.2 (https://startbootstrap.com/template/sb-admin) 
Copyright 2013-2021 Start Bootstrap 
Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
Adapté par Alexis AMAND pour le projet PubliGED
*/ 

require ('../content/fonctions.php');
require ('../class/class.php');
include ('../config.php');
include ('include/langue.php');

$BaseDeDonnees = new BasesDeDonnees;

/* TEST : Récupération du tableau JS qui contient les infos sur les positions des modules */

/*
if (isset($_POST['tablo'])) 
    {
	$myTable = $_POST['tablo'];
	print_r($myTable);
    }
*/

?>

<!DOCTYPE html>
<html lang="<?php echo chooseAdminLang($pdo) ?>">

    <head>
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo BCK_TITLE; ?></title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet"/>

        <!-- TODO : cette ligne sera donc à supprimer quand Bootstrap icons sera prêt -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <!-- si c'est un page qui a besoin de tinymce -->
        <script src="js/tinymce/tinymce.min.js"></script>
        <!-- Pour initialiser tinymce et le mettre en français -->
        <script>
        tinymce.init({
            selector: '#editor',
            language : 'fr_FR'
            /* le code de l'ancien backoffice est récupérable */
        });
        </script>

		<!-- icons de Bootstrap visants à remplacer Fontawesome -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <!-- Drop -->
        <link href="css/drop.css" rel="stylesheet">

    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php"><?php echo BCK_TITLE; ?></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="bi bi-list"></i></button>
            <a href="<?php echo $UrlduSite; ?>" class="text-light"><?php echo ADM_SEE_SITE; ?></a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Recherche..." aria-label="Recherche..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-secondary" id="btnNavbarSearch" type="button"><i class="bi bi-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill fs-3"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?page=user-profil"><?php echo USER_SETTINGS; ?></a></li>
                        <li><a class="dropdown-item" href="index.php?page=user-log"><?php echo USER_LOG; ?></a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php"><?php echo LOGOUT; ?></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-tools"></i></div>
                                <?php echo DASHBOARD ?>
                            </a>
                            
                            <!-- PARTIE BLOG -->
                         
                            <div class="sb-sidenav-menu-heading"><?php echo BCK_RUB_TITLE_1; ?></div>
                            
                            <!-- Gestion des articles -->
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseArticles" aria-expanded="false" aria-controls="collapseArticles">
                                <div class="sb-nav-link-icon"><i class="bi bi-newspaper"></i></div>
                                <?php echo ASIDE_ADMIN_1; ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseArticles" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?page=article-add"><?php echo ADM_RUB_ADD_A; ?></a>
                                    <a class="nav-link" href="index.php?page=articles-list"><?php echo ADM_RUB_MODIF_A; ?></a>
                                    <a class="nav-link" href="index.php?page=cat-add"><?php echo ADM_RUB_ADD_C; ?></a>
                                    <a class="nav-link" href="index.php?page=cat-list"><?php echo ADM_RUB_MODIF_C; ?></a>
                                </nav>
                            </div>
                            
                            <!-- Gestion des commentaires -->
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseComms" aria-expanded="false" aria-controls="collapseComms">
                                <div class="sb-nav-link-icon"><i class="bi bi-chat-text"></i></div>
                                <?php echo ASIDE_ADMIN_2; ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseComms" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?page=comm-list"><?php echo ADM_RUB_COMM; ?></a>
                                </nav>
                            </div>
                            
                            <!-- Gestion des modules du blog  -->
                            
                            <a class="nav-link" href="index.php?page=modules_blog">
                                <div class="sb-nav-link-icon"><i class="bi bi-back"></i></div>
                                <?php echo ASIDE_ADMIN_3; ?>
                            </a>
                            
                            <!-- PARTIE GENEALOGIE -->
                            
                            <div class="sb-sidenav-menu-heading"><?php echo BCK_RUB_TITLE_2; ?></div>
                            
                            <!--  Gestion du gedcom -->
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseGedcom" aria-expanded="false" aria-controls="collapseGedcom">
                                <div class="sb-nav-link-icon"><i class="bi bi-diagram-3"></i></div>
                                <?php echo ASIDE_ADMIN_5; ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseGedcom" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?page=gedcom-select"><?php echo ADM_RUB_SEND_G; ?></a>
                                    <a class="nav-link" href="index.php?page=gedcom-del"><?php echo ADM_RUB_DEL_G; ?></a>
                                </nav>
                            </div>
                            
                            <!-- Gestion des modules de généalogie -->
                            
                            <a class="nav-link" href="index.php?page=modules_genealogie">
                                <div class="sb-nav-link-icon"><i class="bi bi-back"></i></div>
                                <?php echo ASIDE_ADMIN_6; ?>
                            </a>
                            
                            <!-- PARTIE PARAMETRES ET GESTION DU SITE -->
                            
                            <div class="sb-sidenav-menu-heading"><?php echo BCK_RUB_TITLE_3; ?></div>
                                             
                            <!-- Base de données -->
                                                       
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDatabase" aria-expanded="false" aria-controls="collapseDatabase">
                                <div class="sb-nav-link-icon"><i class="bi bi-server"></i></div>
                                <?php echo ASIDE_ADMIN_7; ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseDatabase" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?page=database-del"><?php echo ADM_DB_SUPPR; ?></a>
                                    <a class="nav-link" href="index.php?page=database-reset"><?php echo ADM_DB_CREATE; ?></a>
                                    <a class="nav-link" href="index.php?page=database-size"><?php echo ADM_DB_SIZE; ?></a>
                                </nav>
                            </div>
                            
                            <!-- Options -->
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOptions" aria-expanded="false" aria-controls="collapseOptions">
                                <div class="sb-nav-link-icon"><i class="bi bi-gear"></i></div>
                                <?php echo ASIDE_ADMIN_8; ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseOptions" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?page=opt-settings"><?php echo ADM_RUB_PARAM; ?></a>
                                    <a class="nav-link" href="index.php?page=opt-templates"><?php echo ADM_RUB_PERSO; ?></a>
                                </nav>
                            </div>
                            
                            <!-- Gestion des utilisateurs -->
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                                <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                                <?php echo ASIDE_ADMIN_9; ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?page=users-list"><?php echo ADM_RUB_USERS; ?></a>
                                    <a class="nav-link" href="index.php?page=users-add"><?php echo ADM_RUB_ADD_USER; ?></a>
                                </nav>
                            </div>
                            
                            <!-- REFERENCEMENT -->
                            
                            <div class="sb-sidenav-menu-heading"><?php echo BCK_RUB_TITLE_4; ?></div>
                                                        
                            <!-- Metas et SEO -->
                            
                            <a class="nav-link" href="index.php?page=web-seo">
                                <div class="sb-nav-link-icon"><i class="bi bi-file-text"></i></div>
                                <?php echo ASIDE_ADMIN_10; ?>
                            </a>
                                                        
                            <!-- Statistiques -->
                            
                            <a class="nav-link" href="index.php?page=web-stats">
                                <div class="sb-nav-link-icon"><i class="bi bi-graph-up"></i></div>
                                <?php echo ASIDE_ADMIN_11; ?>
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"><?php echo LOG_AS; ?>:</div>
                        <?php echo $_SESSION['login']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            	<main> 

              	<?php 
                /* page à afficher récupérée en paramètre dans l'URL */
            	if (isset($_GET['page']))
            		{
            		include 'content/'.$_GET['page'].'.inc.php'; 
            		}
            	else
            		{
            		include 'content/main.inc.php';
            		}
            	?>

				</main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"><?php echo CREATED_BY.'<a href="https://www.publiged.com" title="site officiel du PubliGED">PubliGED</a><br />'; ?></div>
                            <div>
                                <a href="https://startbootstrap.com/"><?php echo FOOTER_CREDITS; ?></a>
                                &middot;
                                <?php /* TODO : Ajouter un lien vers la licence */ ?>
                                <a href="#"><?php echo FOOTER_LICENCE; ?></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <!-- datatables simple datatable n'a pas besoin de jquery -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
                    
		<!-- A quoi ils servent ? -->
        
        <!-- Bootstrap core JavaScript - article-add, articles-list -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
				
		<!-- initialisation perso de datatables simple -->
 		<script src="js/datatables-simple.js"></script>

        <!-- Drag&Drop des éléments du menu -->
        <script src="js/dragdrop.js"></script>
 		
    </body>
</html>
