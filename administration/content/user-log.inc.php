<?php
$utilisateur = new Utilisateurs();
$utilisateur->information($pdo, $_SESSION['login']);
?>

<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$utilisateur->login; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=users-list"><?php echo ASIDE_ADMIN_9; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo USER_LOG_TTL; ?></li>
		</ol>
        
        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
                        <i class="bi bi-people me-2"></i><?php echo USER_LOG_TTL; ?>
					</div>
					<div class="card-body">
										    										    
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
					    	<button class="nav-link active" id="blog-tab" data-bs-toggle="tab" data-bs-target="#blog" type="button" role="tab" aria-controls="blog" aria-selected="true">
					    	<?php echo USER_LOG_B; ?></button>
					  	</li>
					  	<li class="nav-item" role="presentation">
					    	<button class="nav-link" id="genealogie-tab" data-bs-toggle="tab" data-bs-target="#genealogie" type="button" role="tab" aria-controls="genealogie" aria-selected="false">
					    	<?php echo USER_LOG_G; ?></button>
					  	</li>
					</ul>
					
						<div class="tab-content" id="myTabContent">
						  	<div class="tab-pane fade show active" id="blog" role="tabpanel" aria-labelledby="blog-tab">
						  	
						  	<?php					
						
						  	require( "lib/zip.lib.php" ) ; // Chemin d'accès à la lib
						  	
							/* Affichage du contenu du fichier  */
							
						  	$fichierLogsBlog = "logs/blog.log"; //nom du fichier à compresser
							$flb = fopen($fichierLogsBlog,'r');
							echo '<p class="card-text mt-3">';
							while(!feof($flb))
								{
								$contenu = fgets($flb); 
								echo $contenu.'<br />';
								}
							echo "</p>";
							fclose($flb); 
							
							/* Compression du fichier log */
							/* https://www.wakdev.com/more/wiki/php-mysql/66-creer-des-archives-zip-avec-php.html */
							
							$zip1 = new zipfile( ) ; //on crée une nouvelle instance zip
							
							$flb = fopen($fichierLogsBlog,'r') ; //on ouvre le fichier
							$contenu = fread($flb, filesize($fichierLogsBlog)) ; //on enregistre le contenu
							fclose($flb) ; //on ferme le fichier
							 
							$zip1->addfile($contenu, $fichierLogsBlog) ; //on ajoute le fichier
							$blog_zip = $zip1->file() ; //on associe l'archive
							$open = fopen( "logs/blog.zip" , "wb"); //crée le fichier zip
							fwrite($open, $blog_zip); //enregistre le contenu de l'archive
							fclose($open); //ferme l'archive
							
							?>
							
								<div class="d-grid d-md-flex justify-content-md-end mt-3">
									<a href="<?php echo "logs/blog.zip"; ?>" type="submit" name="envoyer" class="btn btn-sm btn-secondary"><?php echo USER_LOG_BTN; ?></a>
								</div>
						  	
						  	</div>
						  	<div class="tab-pane fade" id="genealogie" role="tabpanel" aria-labelledby="genealogie-tab">
						  	
						  	<?php					
	
							/* Affichage du contenu du fichier  */
							
						  	$fichierLogsGenealogie = "logs/genealogie.log"; //nom du fichier à compresser
							$flg = fopen($fichierLogsGenealogie,'r');
							echo '<p class="card-text mt-3">';
							while(!feof($flg))
								{
								$contenu = fgets($flg); 
								echo $contenu.'<br />';
								}
							echo "</p>";
							fclose($flg); 
							
							/* Compression du fichier log */
							/* https://www.wakdev.com/more/wiki/php-mysql/66-creer-des-archives-zip-avec-php.html */
							
							$zip2 = new zipfile( ) ; //on crée une nouvelle instance zip
							
							$flg = fopen($fichierLogsGenealogie,'r') ; //on ouvre le fichier
							$contenu = fread($flg, filesize($fichierLogsGenealogie)) ; //on enregistre le contenu
							fclose($flg) ; //on ferme le fichier
							 
							$zip2->addfile($contenu, $fichierLogsGenealogie) ; //on ajoute le fichier
							$genealogie_zip = $zip2->file() ; //on associe l'archive
							$open = fopen( "logs/genealogie.zip" , "wb"); //crée le fichier zip
							fwrite($open, $genealogie_zip); //enregistre le contenu de l'archive
							fclose($open); //ferme l'archive
							
							?>
							
								<div class="d-grid d-md-flex justify-content-md-end mt-3">
									<a href="<?php echo "logs/genealogie.zip"; ?>" type="submit" name="envoyer" class="btn btn-sm btn-secondary"><?php echo USER_LOG_BTN; ?></a>
								</div>
						  					  	
						  	</div>
						</div>					    
						    										 
					</div>
										
				</div>
			</div> 
		</div>
</div>