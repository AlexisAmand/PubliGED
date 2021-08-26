<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4">Bonjour <?php echo $_SESSION['login']; ?>.</h1> <?php /* TODO : récupérer ici le nom de l'utilisateur */ ?>
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
			<li class="breadcrumb-item"><a href="index.php?page=cat-list">Catégories</a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo "Modifier les catégories"; ?></li>
		</ol>

        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-tags me-2"></i><?php echo ADM_RUB_MODIF_C; ?>
					</div>
					<div class="card-body">

              			<table class="table" id="datatablesSimple">
              
			            <?php
			            $req = $pdo->prepare ("SELECT * FROM categories");
			            $req->execute ();
			            ?>        
                
                  			<thead>
                   				<tr>
                      				<th>#</th>
                      				<th><?php echo "Nom de la catégorie"; ?></th>
                      				<th style="width: 3.5em;"><?php echo ADM_ART_EDIT; ?></th>
                      				<th style="width: 3.5em;"><?php echo ADM_ART_SUPPR; ?></th>
                      				<th style="width: 3.5em;"><?php echo ADM_ART_PUBLISH; ?></th>
                    			</tr>
                  			</thead>
                            <tfoot>
	                 			<tr>
	                      			<th>#</th>
	                      			<th><?php echo "Nom de la catégorie"; ?></th>
	                      			<th style="width: 3.5em;"><?php echo ADM_ART_EDIT; ?></th>
	                      			<th style="width: 3.5em;"><?php echo ADM_ART_SUPPR; ?></th>
	                      			<th style="width: 3.5em;"><?php echo ADM_ART_PUBLISH; ?></th>
	                    		</tr>
                  			</tfoot>  
                 			<tbody>
                   
		                  	<?php
		                 
		                  	while ($data = $req->fetch(PDO::FETCH_ASSOC))
		                    	{
		                      	echo "<tr>";
		                      	echo "<td>".$data ['ref']."</td>";
		                      	echo "<td>".$data ['nom']."</td>";
		                      	echo '<td class="text-center"><a href="index.php?page=cat-edit&cat='.$data['ref'].'" data-toggle="tooltip" data-placement="left" title="Editer"><i class="bi bi-pencil-square text-success"></i></a></td>';
		                      	echo '<td class="text-center"><a href="#" data-toggle="modal"><i class="bi bi-trash text-danger"></i></a></td>';                                
		                      	echo '<td class="text-center"><a href="#"><i class="bi bi-star text-warning"></i></a></td>';
		                        echo "</tr>";	                    
		                        }		                      
		                    ?> 
                                  
                  			</tbody>
                		</table>
              		</div>
                                    
				</div>

			</div> 
			
		</div>
		
</div>

<!-- Mettre ici le JS pour les modales -->