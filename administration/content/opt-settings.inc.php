<?php
            	
/* récup de la valeur du top */
            	
$req_top = "SELECT * FROM configuration WHERE nom = 'top'";
$req_top = $pdo->prepare($req_top);
$req_top->execute();
            	
$data = $req_top->fetch(PDO::FETCH_ASSOC);
$top = $data['valeur'];
            	
/* récup de la position du menu */
            	
$req_aside = "SELECT * FROM configuration WHERE nom = 'positionmenu'";
$req_aside = $pdo->prepare($req_aside);
$req_aside->execute();
            	
$data = $req_aside->fetch(PDO::FETCH_ASSOC);
$positionMenu = $data['valeur'];

/* récup de l'élément de menu blog */
            	
$req_b = "SELECT * FROM pillmenu WHERE lien = 'blog'";
$req_b = $pdo->prepare($req_b);
$req_b->execute();
            	
$data = $req_b->fetch(PDO::FETCH_ASSOC);
$NomElementB = $data['nom'];

/* récup de l'élément de menu généalogie */
            	
$req_g = "SELECT * FROM pillmenu WHERE lien = 'patro'";
$req_g = $pdo->prepare($req_g);
$req_g->execute();
            	
$data = $req_g->fetch(PDO::FETCH_ASSOC);
$NomElementG = $data['nom'];
            	           	
$utilisateur = new Utilisateurs();
$utilisateur->information($pdo, $_SESSION['login']);
?>

<div class="container-fluid px-4">
	
	<h1 class="h3 mt-4"><?php echo HELLO." ".$utilisateur->login; ?>.</h1> 
	
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

						<?php
						if($utilisateur->rang == 'administrateur')
							{
						?>
						
							<div class="form-group">
					
							<!-- Choix de la langue -->
									
								<div class="col-12 col-sm-8">
																															
									<div class="input-group input-group-sm mb-3">
										<span class="input-group-text"><?php echo OPT_LANGUAGE; ?></span>
										<select class="form-select" name="">
											<option value="fr" selected><?php echo OPT_FRENCH; ?></option>
											<option value="en"><?php echo OPT_ENGLISH; ?></option>
											<option value="ge"><?php echo OPT_GERMAN; ?></option>
											<option value="es"><?php echo OPT_SPANISH; ?></option>
										</select>
									</div>
						
								</div>
						
							<!-- Activer le blog -->
						
								<div class="col-12 col-sm-8">
																																									
									<div class="input-group input-group-sm mb-3">
										<div class="input-group-text">
										<?php
										
										$req= $pdo->prepare ("select * from pillmenu where lien = 'blog'");
										$req->execute();

										$row = $req->fetch();
										if ($row['afficher'] == '1')
											{
											echo '<input class="form-check-input mt-0" type="checkbox" value="blog" name="tabOptions[]" checked> ';
											}
										else
											{
											echo '<input class="form-check-input mt-0" type="checkbox" value="blog" name="tabOptions[]"> ';	
											}
										
										?>
										</div>
										<input type="text" class="form-control bg-white" value="<?php echo ADM_ST_ACT1; ?>"> 
									</div>
						
								</div>
						
							<!-- Activer le généalogie -->
						
								<div class="col-12 col-sm-8">
					
									<div class="input-group input-group-sm mb-3">
										<div class="input-group-text">
										<?php
										
										$req= $pdo->prepare ("select * from pillmenu where lien = 'patro'");
										$req->execute();

										$row = $req->fetch();
										if ($row['afficher'] == '1')
											{
											echo '<input class="form-check-input mt-0" type="checkbox" value="patro" name="tabOptions[]" checked> ';
											}
										else
											{
											echo '<input class="form-check-input mt-0" type="checkbox" value="patro" name="tabOptions[]"> ';	
											}
										
										?>
										</div>
										<input type="text" class="form-control bg-white" value="<?php echo ADM_ST_ACT2; ?>">
									</div>
						
								</div>
						
							<!-- Activer le page de contact -->
						
								<div class="col-12 col-sm-8">

									<div class="input-group input-group-sm mb-3">
										<div class="input-group-text">
										<?php
										
										$req= $pdo->prepare ("select * from pillmenu where lien = 'contact'");
										$req->execute();

										$row = $req->fetch();
										if ($row['afficher'] == '1')
											{
											echo '<input class="form-check-input mt-0" type="checkbox" value="contact" name="tabOptions[]" checked> ';
											}
										else
											{
											echo '<input class="form-check-input mt-0" type="checkbox" value="contact" name="tabOptions[]"> ';	
											}
										
										?>
										</div>
										<input type="text" class="form-control bg-white" value="<?php echo ADM_ST_ACT3; ?>" >
									</div>
								
								</div>
						
							<!-- Le menu à droite -->
						
								<div class="col-12 col-sm-8">
								
									<div class="input-group input-group-sm mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="radio" id="defaultCheck2" name="PositionMenu" value="droite" 
										<?php if ($positionMenu == "droite") { echo " checked"; } ?>>
									</div>
										<input type="text" class="form-control bg-white" value="<?php echo OPT_RIGHT_MENU; ?>">
									</div>
							
								</div>
						
							<!-- Le menu à gauche -->
						
								<div class="col-12 col-sm-8">
								
									<div class="input-group input-group-sm mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="radio" id="defaultCheck2" name="PositionMenu" value="gauche" 
										<?php if ($positionMenu == "gauche") { echo " checked"; } ?>>
									</div>
										<input type="text" class="form-control bg-white" value="<?php echo OPT_LEFT_MENU; ?>">
									</div>
									
								</div>
												
							</div>
						
            			</div>
          			</div>

          			<div class="card mb-4">
            			<div class="card-header">
              				<i class="bi bi-gear me-2"></i><?php echo ADM_ST_RUBRIC_2; ?>
            			</div>
            			<div class="card-body">
            
            			<!-- Top pour les stats -->
            
							<div class="col-12 col-sm-8">	
							
								<div class="input-group input-group-sm mb-3">
									<span class="input-group-text"><?php echo ADM_ST_TOP; ?></span>
									<input type="text" value="<?php echo $top; ?>" name="top" class="form-control">	
								</div>
						
							</div>

						<!-- Nom de l'élément de menu pour la partie Généalogie -->  

							<div class="col-12 col-sm-8">	
							
								<div class="input-group input-group-sm mb-3">
								<span class="input-group-text">Nom de la partie généalogie</span>
								<input type="text" value="<?php echo $NomElementG; ?>" name="NomElementG" class="form-control">	
								</div>
					
							</div>  
			 
            			</div>
          			</div>

		  			<div class="card mb-4">
            			<div class="card-header">
              				<i class="bi bi-gear me-2"></i><?php echo ADM_ST_RUBRIC_3; ?>
            			</div>
            			<div class="card-body">
            
						<!-- Nom de l'élément de menu pour la partie Blog -->  

							<div class="col-12 col-sm-8">	
							
								<div class="input-group input-group-sm mb-3">
								<span class="input-group-text">Nom de la partie blog</span>
								<input type="text" value="<?php echo $NomElementB; ?>" name="NomElementB" class="form-control">	
								</div>
					
							</div>  
			 
            			</div>
          			</div>
          
					<div class="d-grid d-md-flex justify-content-md-end mt-3">
						<button type="submit" name="envoyer" class="btn btn-sm btn-secondary"><?php echo ADM_ST_SEND; ?></button>
					</div>

   		</form>
	   					
	    <?php
		}
		?>

</div>