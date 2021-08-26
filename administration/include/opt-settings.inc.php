<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4">Bonjour <?php echo $_SESSION['login']; ?>.</h1> <?php /* TODO : récupérer ici le nom de l'utilisateur */ ?>
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=opt-settings"><?php echo ASIDE_ADMIN_8; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo BCK_RUB_TITLE_3; ?></li>
		</ol>

        <form method="POST" action="index.php?page=opt-save">
        
        <div class="row">
        
        	<div class="col-xl-12">
				    <div class="card mb-4">
					    <div class="card-header">
						    <i class="bi bi-gear me-2"></i><?php echo BCK_RUB_TITLE_3; ?>
					    </div>
					    <div class="card-body">

                <div class="form-group">
                  
         			      <div class="form-check">
				              <input class="form-check-input" type="checkbox" value="ActivBlog" id="defaultCheck1" name="tabOptions[]">
				              <label class="form-check-label" for="defaultCheck1">
				              <?php echo ADM_ST_ACT1; ?>
				              </label>
				            </div>	
					
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="ActivGene" id="defaultCheck2" name="tabOptions[]">
                      <label class="form-check-label" for="defaultCheck2">
                      <?php echo ADM_ST_ACT2; ?>
                      </label>
                    </div>
				
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="ActivContact" id="defaultCheck3" name="tabOptions[]">
                      <label class="form-check-label" for="defaultCheck3">
                        <?php echo "Activation de la page contact"; ?>
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="defaultCheck2" name="PositionMenu" value="droite" >
                      <label class="form-check-label" for="defaultCheck2">
                        <?php echo "Menu à droite" ?>
                      </label>
                    </div>
				
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="defaultCheck3" name="PositionMenu" value="gauche" >
                      <label class="form-check-label" for="defaultCheck3">
                        <?php echo "Menu à gauche"; ?>
                      </label>
                    </div>
	
			        </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-header">
              <i class="bi bi-gear me-2"></i><?php echo ADM_ST_RUBRIC_2; ?>
            </div>
            <div class="card-body">
              <div class="input-group input-group-sm mb-3">
                <?php /* TODO : 
                - Récupérer la valeur de "value" dans les options dans les tables
                - faire une vérification pour que les valeurs soit bien des nombres
                - peut-être qu'il faut un min et un max ? 
                */
                ?>
                <span class="input-group-text"><?php echo ADM_ST_TOP; ?></span>
                <input type="text" value="10" name="top" class="form-control">	
			        </div>
            </div>
          </div>
          
          <div class="card mb-4">
            <div class="card-header">
              <i class="bi bi-gear me-2"></i><?php echo ADM_ST_RUBRIC_3; ?>
            </div>
            <div class="card-body">
              <div class="form-group">
       		      <div class="form-check">
			          <input class="form-check-input" type="checkbox" value="ActivComm" id="defaultCheck1" name="tabOptions[]">
				        <label class="form-check-label" for="defaultCheck1">
				        <?php echo ADM_ST_ACT3; ?>
				        </label>
			        </div>	
			      </div>
		      </div>
 		    
        </div>

			  <div class="d-grid d-md-flex justify-content-md-end mt-3">
					<button type="submit" name="envoyer" class="btn btn-sm btn-secondary"><?php echo ADM_ST_SEND; ?></button>
				</div>

		    </form>

</div>