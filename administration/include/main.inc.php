<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4">Bonjour <?php echo $_SESSION['login']; ?>.</h1> <?php /* TODO : récupérer ici le nom de l'utilisateur */ ?>
	
		<ol class="breadcrumb mb-4">
        	<li class="breadcrumb-item active"><?php echo DASHBOARD; ?></li>
        </ol>
        
		<div class="row">
        
        	<!-- Affichage de la vignette avec le nombre de catégories -->
        	
        	<div class="col-xl-3 col-md-6">      	
            	<div class="card mb-4" style="border-left:.25rem solid #4e73df">
                	<div class="card-body d-flex align-items-center justify-content-between">
                	<?php echo NB_CATEGORIES; ?>
                    <span class="badge bg-secondary">
                    <?php
                    $sql_nb_cat = "select * from categories";
                    $req = $pdo->prepare($sql_nb_cat);
                    $req->execute ();
                    echo $req->rowCount ();
                    ?>
                    </span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    	<a class="small stretched-link" href="index.php?page=cat-list">Voir les détails</a>
                        <div class="small"><i class="bi bi-caret-right"></i></div>
                    </div>
               	</div>
            </div>
            
            <!-- Affichage de la vignette avec le nombre de membres -->
            
        	<div class="col-xl-3 col-md-6">
            	<div class="card mb-4" style="border-left:.25rem solid #1cc88a">
                	<div class="card-body d-flex align-items-center justify-content-between">
                	<?php echo NB_USERS; ?>
                    <span class="badge bg-secondary">
                    <?php
                    $sql_nb_user = "select * from membres";
                    $req = $pdo->prepare($sql_nb_user);
                    $req->execute ();     
                    echo $req->rowCount ();
                    ?>
                    </span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    	<a class="small stretched-link" href="#">Voir les détails</a>
                        <div class="small"><i class="bi bi-caret-right"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- Affichage de la vignette avec le nombre d'articles -->
            
            <div class="col-xl-3 col-md-6">
            	<div class="card mb-4" style="border-left:.25rem solid #36b9cc">
                	<div class="card-body d-flex align-items-center justify-content-between">
                	<?php echo NB_ARTICLES; ?>
                    <span class="badge bg-secondary">
                    <?php
			        $sql_nb_article = "SELECT * FROM articles WHERE publication = '1'";
			        $req = $pdo->prepare($sql_nb_article);
			        $req->execute ();
			        echo $req->rowCount ();
			        ?>
                    </span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    	<a class="small stretched-link" href="#">Voir les détails</a>
                        <div class="small"><i class="bi bi-caret-right"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- Affichage de la vignette avec le nombre de commentaires -->
            
            <div class="col-xl-3 col-md-6">
            	<div class="card mb-4" style="border-left:.25rem solid #f6c23e">
                	<div class="card-body d-flex align-items-center justify-content-between">
                	<?php echo NB_COMMENTAIRES; ?>
                    <span class="badge bg-secondary">
                    <?php
			        $sql_nb_com = "select * from commentaires";
			        $req = $pdo->prepare($sql_nb_com);
			        $req->execute ();
			        echo $req->rowCount ();
			        ?>
                    </span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    	<a class="small stretched-link" href="#">Voir les détails</a>
                        <div class="small"><i class="bi bi-caret-right"></i></div>
                    </div>
                </div>
            </div>
            
        </div>						

        <div class="row">
        
        	<!-- Affichage de la liste des 5 derniers articles -->
            
			<div class="col-xl-6">
				<div class="card mb-4">
					<div class="card-header">
					<i class="bi bi-newspaper me-1"></i><?php echo LAST_ALL_ARTICLES; ?>
					</div>
					<div class="card-body">
												
						<table class="table">
							<tr>
			                	<th scope="col">Date</th>
			                  	<th scope="col" colspan="2">Titre</th>                	
	                 		</tr>	               		
                 				<?php 
							    $output = array_slice($BaseDeDonnees->ListeTitreArticle($pdo), 0, 4); 
							    foreach ($output as $value) 
							      	{								      		
							      	list($year, $month, $day) = explode("-", $value['date']);
							      	echo "<tr><td>".$day."-".$month."-".$year."</td>";
							      	if (strlen($value['titre']) > 35)
							      		{
							      		$value['titre'] = substr($value['titre'], 0, 35)."...";
							      		}
						      		echo "<td>".$value['titre']."</td>";
									echo "<td><a href='article-edit.php?id=".$value['ref']."'><i class='bi bi-pencil-square text-success'></i></a>";
									echo "</td></tr>";
									}             
								?>                 	                 		
						</table>
										
						<div class="d-grid d-md-flex justify-content-md-end mt-3">
							<a href="index.php?page=articles-list" type="button" class="btn btn-sm btn-secondary"><?php echo ALL_ARTICLE; ?></a>
						</div>
						           
			      	</div>
				</div>
			</div>
			
			<!-- Affichage des statitiques du gedcom -->
                      
            <div class="col-xl-6">
            	<div class="card mb-4">
                	<div class="card-header">
						<i class="bi bi-diagram-3 me-1"></i><?php echo MY_GEDCOM; ?>
                	</div>
                    <div class="card-body">
                  		<ul clas="list-group">
                    		<li class="list-group-item"><?php echo $BaseDeDonnees->NombreIndividu($pdo).MY_GEDCOM_INDIVIDUALS; ?></li>
                    		<li class="list-group-item"><?php echo $BaseDeDonnees->NombreLieux($pdo).MY_GEDCOM_PLACE; ?></li>
                    		<li class="list-group-item"><?php echo $BaseDeDonnees->NombreFamilles($pdo).MY_GEDCOM_FAMILIES; ?></li>
                    		<li class="list-group-item"><?php echo $BaseDeDonnees->NombreSources($pdo).MY_GEDCOM_SRC; ?></li>
                    		<li class="list-group-item"><?php echo $BaseDeDonnees->NombreEvenements($pdo).MY_GEDCOM_EVE; ?></li>
                  		</ul>                		
                  		<div class="d-grid d-md-flex justify-content-md-end mt-3">
							<a href="index.php?page=articles-list" class="btn btn-sm btn-secondary"><?php echo "Envoyer mon gedcom"; ?></a>
						</div>                           
                </div>
              </div>
            </div>
            
            <!-- Affichage de la liste des 5 derniers commentaires -->
                                
            <div class="col-xl-6">
            	<div class="card mb-4">
                	<div class="card-header">
					<i class="bi bi-chat-text me-1"></i><?php echo LAST_ALL_COM; ?>
                	</div>
                    <div class="card-body">
                    	<?php 
             			$sql = $pdo->prepare ("SELECT * FROM commentaires");
	                	$sql->execute();
	                    if ($sql->rowCount() > 0)
	                  		{
	                   	?>
	                  
	            	  	<table class="table">
	             			<tr>
			                	<th scope="col">Date</th>
			                  	<th scope="col">Article</th>
			                  	<th scope="col">Auteur</th>
			                  	<th scope="col"></th>
		                  	</tr>
	                 			                              
                  			<?php
                            while($row = $sql->fetch(PDO::FETCH_ASSOC)) 
	                  			{
	                  			echo '<tr>';		                  			
	                  			list($date, $heure) = explode(" ",$row['date_com']);		                  			
	                  			list($year, $month, $day) = explode("-", $date);		                  			
	                  			echo "<td>".$day."-".$month."-".$year."</td>";		                  					                  		
	                  			echo "<td>".RecupTitreArticle($pdo, $row['id_article'])."</td>";
	                    		echo "<td>".$row['nom_auteur']."</td>";
	                    		echo "<td><a href='#'><i class='bi bi-pencil-square text-success'></i></a>";
	                    		echo "</td></tr>";
		                		}
		                   ?>
							   	
                  		</table>
                  
                  		<?php			               
			          		}
	                  	else 
	                  		{
	                  		echo "Pas de commentaire pour le moment !";
	                  		}
		            	?>
		                  			                                                                                          
                  		<div class="d-grid d-md-flex justify-content-md-end">
							<a href="index.php?page=comm-list" class="btn btn-sm btn-secondary"><?php echo ALL_COM; ?></a>
						</div>    
                  
                	</div>
              	</div>
            </div>                                    
		</div>
</div>