<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1> 
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=cat-list"><?php echo CAT_BREAD; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_RUB_ADD_C; ?></li>
		</ol>

        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-tags me-2"></i><?php echo ADM_RUB_ADD_C; ?>
					</div>
					<div class="card-body">
					    
		            <?php

					if (! empty ( $_POST ['nom_categorie'] )) 
						{
						$sqlAjoutArticle = "INSERT INTO categories(nom) values (:p5)";
						$AjoutArticle = $pdo->prepare ( $sqlAjoutArticle );
						$AjoutArticle->bindparam ( ':p5', $_POST ['nom_categorie'] );
						$AjoutArticle->execute ();
						
						$msg = ADM_CAT_SEND_01; 

						} 

					if ((! empty ( $_POST ['nom_categorie'] )) and (!empty($_POST['des_categorie']))) 
						{
						$sqlAjoutArticle = 'INSERT INTO categories(nom, description) values (:p1, :p2)';
						$AjoutArticle = $pdo->prepare ( $sqlAjoutArticle );
						$AjoutArticle->bindparam ( ':p1', $_POST ['nom_categorie'] );
						$AjoutArticle->bindparam ( ':p2', $_POST ['des_categorie'] );
						$AjoutArticle->execute ();
						
						$msg = ADM_CAT_SEND_02;

						} 
						
					?>

					<p><?php echo ADM_ONLINE_TOOLS; ?></p>

					<?php

					if(isset($msg))
						{
						echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
						
						/* Enregistrement de l'action dans le journal */
						putOnLogB($msg);
						}

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
							<input class="form-control" id="categorie" name='nom_categorie'>
						</div>

						<div class="input-group input-group-sm mb-3">
							<span class="input-group-text"><?php echo "Description de la catégorie"; ?></span>
							<input class="form-control" id="categorie" name='des_categorie'>
						</div>
						
						<div class="d-grid d-md-flex justify-content-md-end mt-3">
							<button type="submit" name="envoyer" class="btn btn-sm btn-secondary"><?php echo SEND; ?></button>
						</div>
						
					</form>
				
					</div>

				</div>

			</div> 
			
		</div>
		
</div>
