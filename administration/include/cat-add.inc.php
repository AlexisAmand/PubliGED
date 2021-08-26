<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4">Bonjour <?php echo $_SESSION['login']; ?>.</h1> <?php /* TODO : récupérer ici le nom de l'utilisateur */ ?>
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=cat-list">Catégories</a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo "Ajouter une catégorie"; ?></li>
		</ol>

        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-tags me-2"></i><?php echo ADM_RUB_ADD_C; ?>
					</div>
					<div class="card-body">
					    
		            <?php
					if (! empty ( $_POST ['categorie'] )) 
						{
						$sqlAjoutArticle = "INSERT INTO categories(nom) values (:p5)";
						$AjoutArticle = $pdo->prepare ( $sqlAjoutArticle );
						$AjoutArticle->bindparam ( ':p5', $_POST ['categorie'] );
						$AjoutArticle->execute ();
					?>
					
					<div class="alert alert-success" role="alert">
					<?php echo ADM_CAT_SEND; ?>
					</div>
					
					<?php
						} 
					else 
						{
					?>

					<p><?php echo ADM_ONLINE_TOOLS; ?></p>

					<?php
					$cat = $pdo->query ( "select * from categories" );
					?>
	
						<div class="input-group input-group-sm mb-3">
							<span class="input-group-text"><?php echo ADM_CAT_LIST; ?></span>
							<select name='categorie' class="form-select">
							<option selected><?php echo ADM_CAT_ROOL; ?></option>
				
							<?php 
							while ($rowcat = $cat->fetch(PDO::FETCH_ASSOC)) 
								{
								echo "<option value='".$rowcat ['ref']."'>".$rowcat['nom']."</option>";
								}
							?>
						
							</select>
						</div>
	
				<form method="POST" action="index.php?page=cat-add">
				
					<div class="input-group input-group-sm mb-3">
						<span class="input-group-text"><?php echo ADM_RUB_ADD_C; ?></span>
					    <input class="form-control" id="categorie" name='categorie'>
					</div>
					
					<div class="d-grid d-md-flex justify-content-md-end mt-3">
						<button type="submit" name="envoyer" class="btn btn-sm btn-secondary"><?php echo SEND; ?></button>
					</div>
					
				</form>
				
				<?php } ?>
	
           								 
					</div>
                                    
				</div>

			</div> 
			
		</div>
		
</div>
