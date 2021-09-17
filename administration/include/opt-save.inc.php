<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>  
	
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=opt-settings"><?php echo ASIDE_ADMIN_8; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo BCK_RUB_TITLE_3; ?></li>
		</ol>
       
        <div class="row">
        
        	<div class="col-xl-12">
				    <div class="card mb-4">
					    <div class="card-header">
						    <i class="bi bi-caret-down me-2"></i><?php echo BCK_RUB_TITLE_3; ?>
					    </div>
					    <div class="card-body">
               
						<?php

							/* les champs "à remplir" ne doivent pas être vides */

							if(!empty($_POST))
								{
								/* Valeur du top pour les stats de la partie généalogie */	
								if (isset ( $_POST ['top'] ))
									{
									$valeur = "top";
									$stmt = $pdo->prepare ( "UPDATE configuration SET valeur=:valeur WHERE nom=:nom" );
									$stmt->bindParam ( ':nom', $valeur, PDO::PARAM_STR );
									$stmt->bindParam ( ':valeur', $_POST ['top'], PDO::PARAM_STR );
									$stmt->execute ();
		
									/* TODO: dans la table configuration, le champ nrpp pourra surement être supprimé */
		
									if (!empty($_POST['tabOptions']))
										{
										foreach($_POST['tabOptions'] as $cle => $valeur) 
											{
											echo $cle.' : '.$valeur.'<br>';
											}
										}
									}

								/* Menu à droite ou à gauche ? */

								if (isset($_POST['PositionMenu']))
									{
									$valeur = $_POST['PositionMenu'];
									$stmt = $pdo->prepare ( "UPDATE configuration SET valeur=:valeur WHERE nom='positionmenu'" );
									$stmt->bindParam ( ':valeur', $valeur, PDO::PARAM_STR );
									$stmt->execute ();
									}

							?>

							<div class="alert alert-success" role="alert">
							<?php echo "<i class='bi bi-exclamation-triangle-fill me-2'></i>Les options ont bien été enregistrées"; ?>
							</div>

							<?php
								} 
							else
								{
							?>

							<div class="alert alert-danger" role="alert">
							<?php echo "Attention ! Certains champs n'ont pas été remplis.<br />Les options n'ont pas pu être enregistrées."; ?>
							</div>

							<?php 
							}
							?>

						</div>
         			</div>
			</div>
      	</div>
</div>