<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
<div class="sidebar-brand-icon rotate-n-15">
<i class="fas fa-laugh-wink"></i>
</div>
<div class="sidebar-brand-text mx-3"><?php echo ASIDE_ADMIN_0 ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-tools"></i>
          <span><?php echo DASHBOARD ?></span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- ADMINISTRATION DU BLOG -->
      <div class="sidebar-heading">
        <?php echo ASIDE_ADMIN_1; ?>
      </div>

      <!-- Articles -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="far fa-newspaper"></i>
          <span><?php echo ASIDE_ADMIN_2; ?></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="ajout-article.php"><?php echo ADM_RUB_TITRE_0; ?></a>
            <a class="collapse-item" href="modif-articles.php"><?php echo ADM_RUB_TITRE_1; ?></a>
            <a class="collapse-item" href="ajout-cat.php"><?php echo ADM_RUB_TITRE_2; ?></a>
            <a class="collapse-item" href="liste-categories.php"><?php echo ADM_RUB_TITRE_3; ?></a>
          </div>
        </div>
      </li>
     
      <!-- Commentaires -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
          <i class="far fa-comments"></i>
          <span><?php echo ASIDE_ADMIN_3; ?></span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="commentaires.php"><?php echo ADM_RUB_TITRE_4; ?></a>
          </div>
        </div>
      </li>
      
      <!-- Modules du blog -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=modules_blog">
          <i class="far fa-clone"></i>
          <span><?php echo ASIDE_ADMIN_4; ?></span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- ADMINISTRATION DE LA GENEALOGIE -->
      <div class="sidebar-heading">
        <?php echo ASIDE_ADMIN_5; ?>
      </div>

      <!-- Gedcom -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
          <i class="fas fa-sitemap"></i>
          <span><?php echo ASIDE_ADMIN_6;  ?></span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="effacer_gedcom.php"><?php echo ADM_RUB_TITRE_5;  ?></a>
            <a class="collapse-item" href="select_gedcom.php"><?php echo ADM_RUB_TITRE_6;  ?></a>
          </div>
        </div>
      </li>
      
      <!-- Modules de la généalogie -->
      <li class="nav-item">
        <a class="nav-link" href="modules_genealogie.php">
          <i class="far fa-clone"></i>
          <span><?php echo ASIDE_ADMIN_4 ?></span></a>
      </li>
     
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- ADMINISTRATION DES PARAMETRES -->
      <div class="sidebar-heading">
        <?php echo ASIDE_ADMIN_7 ?>
      </div>
      
      <!-- Base de données -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
          <i class="fas fa-database"></i>
          <span><?php echo ASIDE_ADMIN_8 ?></span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
			      <a class="collapse-item" href="database-del.php"><?php echo ADM_DB_SUPPR; ?></a>
		        <a class="collapse-item" href="database-create.php"><?php echo ADM_DB_CREATE; ?></a>
		        <a class="collapse-item" href="database-size.php"><?php echo ADM_DB_SIZE; ?></a>          
          </div>
        </div>
      </li>
      
      <!-- Options -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
          <i class="fas fa-fw fa-cog"></i>
                    
          <span><?php echo ASIDE_ADMIN_9;  ?></span>
        </a>
        <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="options.php"><?php echo ADM_RUB_TITRE_10;  ?></a>
            <a class="collapse-item" href="#"><?php echo ADM_RUB_TITRE_9;  ?></a>
          </div>
        </div>
      </li>

      <!-- Metas et SEO -->

      <li class="nav-item">
        <a class="nav-link" href="seo.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span><?php echo ASIDE_ADMIN_10 ?></span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- ADMINISTRATION DES UTILISATEURS -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
        aria-expanded="true" aria-controls="collapseUsers">
          <i class="far fa-newspaper"></i>
          <span><?php echo ASIDE_ADMIN_11; ?></span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#"><?php echo ADM_RUB_TITRE_7; ?></a>
            <a class="collapse-item" href="#"><?php echo ADM_RUB_TITRE_8; ?></a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->