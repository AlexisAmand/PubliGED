<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=cat-list"><?php echo CAT_BREAD; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_RUB_MODIF_C; ?></li>
		</ol>
        
        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-tags me-2"></i><?php echo ADM_CAT_EDIT; ?>
					</div>
					<div class="card-body">
				         
		            <?php
		
		            if (!empty($_POST['Nom']) and !empty($_POST['NouveauNom']))
		                {
		                    /* $sql = $pdo->prepare("update categories set nom = :nouveaunom , description = :descriptionnom where nom = :nom"); */
		                    $sql = $pdo->prepare("update categories set nom = :nouveaunom where nom = :nom");
		                    $sql->bindparam(':nom', $_POST['Nom'] , PDO::PARAM_STR);
		                    $sql->bindparam(':nouveaunom', $_POST['NouveauNom'] , PDO::PARAM_STR);
		                    // $sql->bindparam(':descriptionnom', $_POST['DescriptionNom'] , PDO::PARAM_STR);
		
		                    // echo var_dump($_POST);
		                    
		                    try
		                        {
		                        $sql->execute();
		                        echo '<div class="alert alert-success" role="alert">';
		                        echo '<i class="bi bi-check"></i>'.CAT_MODIF_OK;
		                        echo '</div>';
								
								/* Enregistrement de l'action dans le journal */
		                        putOnLogB(CAT_MODIF_OK);
		                        }
		                    catch(exception $e)
		                        {
		                        echo '<div class="alert alert-warning" role="alert">';
		                        echo '<i class="bi bi-exclamation-triangle-fill me-2"></i>'.$e;
		                        echo '</div>';

								/* Enregistrement de l'action dans le journal */
		                        putOnLogB($e);
		                        }
		                }
		            else
		            	{
		            ?>

		            <form action="index.php?page=cat-edit&cat=<?php echo $_GET['cat']; ?>" method="POST">
		                <div class="input-group input-group-sm mb-3">
		                    <span class="input-group-text"><?php echo ADM_CAT_NAME; ?></span>
		                    <input readonly type="text" class="form-control" id="NomCategorie" name="Nom" value="<?php echo get_category_name($pdo, $_GET['cat']); ?>">
		                </div>
		                <div class="input-group input-group-sm mb-3">
		                    <span class="input-group-text"><?php echo ADM_CAT_NEW; ?></span>
		                    <input type="text" class="form-control" id="NouveauNomCategorie" name="NouveauNom">
		                </div>
		                
						<div class="d-grid d-md-flex justify-content-md-end mt-3">
							<button type="submit" class="btn btn-sm btn-secondary"><?php echo CAT_MODIF_BTN; ?></button>
						</div>
							             	
		            </form>
		            
		            <?php } ?>
      														 
					</div>
                                    
				</div>

			</div> 
			
		</div>
		
</div>