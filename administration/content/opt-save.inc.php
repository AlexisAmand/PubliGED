<?php
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
       
        <div class="row">
        
        	<div class="col-xl-12">
				    <div class="card mb-4">
					    <div class="card-header">
						    <i class="bi bi-caret-down me-2"></i><?php echo BCK_RUB_TITLE_3; ?>
					    </div>
					    <div class="card-body">

						<?php

						/* On regarde si c'est un admin, les redacteurs ne peuvent pas faire cette modifs */

						if($utilisateur->rang == 'administrateur')
							{
							/* les champs "à remplir" ne doivent pas être vides */

							if(!empty($_POST))
								{

								/* TODO: dans la table configuration, le champ nrpp pourra surement être supprimé */

								if (!empty($_POST['tabOptions']))
									{
									/* on met les 3 éléments du pillmenu sur 0, et on met sur 1 ceux qui sont cochés */
									/* TODO: regrouper les 2 requêtes en 1 */

									$sql1 = $pdo->prepare("UPDATE pillmenu SET afficher = '0' WHERE lien='blog'");
									$req1 = $sql1->execute ();

									$sql2 = $pdo->prepare("UPDATE pillmenu SET afficher = '0' WHERE lien='patro'");
									$req2 = $sql2->execute ();

									$sql3 = $pdo->prepare("UPDATE pillmenu SET afficher = '0' WHERE lien='contact'");
									$req3 = $sql3->execute ();

									$sql = "select * from pillmenu";
									$req = $pdo->prepare($sql);
									$req->execute();

									while ( ($row = $req->fetch(PDO::FETCH_ASSOC)) ) 
										{
											
										foreach ($_POST['tabOptions'] as $value) 
											{
											if($value == $row['lien'])
												{
												$sql = $pdo->prepare("UPDATE pillmenu SET afficher = '1' WHERE lien=:lien");
												$sql->bindValue ( "lien", $row['lien'], PDO::PARAM_STR );
												$sql->execute ();
												}
											}		

										}
									}
								else
									{
									$sql1 = $pdo->prepare("UPDATE pillmenu SET afficher = '0' WHERE lien='blog'");
									$req1 = $sql1->execute ();

									$sql2 = $pdo->prepare("UPDATE pillmenu SET afficher = '0' WHERE lien='patro'");
									$req2 = $sql2->execute ();

									$sql3 = $pdo->prepare("UPDATE pillmenu SET afficher = '0' WHERE lien='contact'");
									$req3 = $sql3->execute ();
									}

								/* Valeur du top pour les stats de la partie généalogie */	
								if (isset ( $_POST ['top'] ))
									{
									$valeur = "top";
									$stmt = $pdo->prepare ( "UPDATE configuration SET valeur=:valeur WHERE nom=:nom" );
									$stmt->bindParam ( ':nom', $valeur, PDO::PARAM_STR );
									$stmt->bindParam ( ':valeur', $_POST ['top'], PDO::PARAM_STR );
									$stmt->execute ();
									}

								

								/* Menu à droite ou à gauche ? */

								if (isset($_POST['PositionMenu']))
									{
									$valeur = $_POST['PositionMenu'];
									$stmt = $pdo->prepare ( "UPDATE configuration SET valeur=:valeur WHERE nom='positionmenu'" );
									$stmt->bindParam ( ':valeur', $valeur, PDO::PARAM_STR );
									$stmt->execute ();
									}
									
								/* Choix de la langue */
									
								if (isset($_POST['Optlangue']))	
									{
									$valeur = $_POST['Optlangue'];
									$stmt = $pdo->prepare ( "UPDATE configuration SET valeur=:valeur WHERE nom='langueAdmin'" );
									$stmt->bindParam ( ':valeur', $valeur, PDO::PARAM_STR );
									$stmt->execute ();
									}

								/* Nom de l'élément de menu généalogie */

								if (isset($_POST['NomElementG']))	
									{
									$stmt = $pdo->prepare( "UPDATE pillmenu SET nom=:nom WHERE lien='patro'" );
									$stmt->bindParam( ':nom', $_POST['NomElementG'], PDO::PARAM_STR );
									$stmt->execute();
									}

								/* Nom de l'élément de menu blog */

								if (isset($_POST['NomElementB']))	
									{
									$stmt = $pdo->prepare( "UPDATE pillmenu SET nom=:nom WHERE lien='blog'" );
									$stmt->bindParam( ':nom', $_POST['NomElementB'], PDO::PARAM_STR );
									$stmt->execute();
									}


						?>

						<div class="alert alert-success" role="alert">
							<?php
							$msg = OPT_SAVE_OK;
							echo '<i class="bi bi-check me-2"></i>'.$msg;
							putOnLogA($msg);
							?>
						</div>

						<?php
								} 
							else
								{
						?>

								<div class="alert alert-danger" role="alert">
									<?php 
									$msg = OPT_SAVE_NOOK;
									echo '<i class="bi bi-exclamation-triangle-fill me-2"></i>'.$msg;
									putOnLogA($msg);
									?>
								</div>

								<?php 
								}
							
							}
						else
							{
							echo NO_ACCESS; /* message si l'utilisateur a le rôle "rédacteur" */
							}
												
						?>
               			
						</div>
         			</div>
			</div>
      	</div>
</div>