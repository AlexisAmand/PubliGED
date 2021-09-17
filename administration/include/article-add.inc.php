<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>
       
    	<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=articles-list"><?php echo ASIDE_ADMIN_1; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_RUB_ADD_A; ?></li>
		</ol>
	
        <div class="row">
        
        	<div class="col-xl-12">

				<form method="POST" action="index.php?page=article-add">

				<div class="card mb-4">

					<div class="card-header">
						<i class="bi bi-newspaper me-2"></i><?php echo ADM_RUB_ADD_A; ?>
					</div>

					<div class="card-body">

						<p><?php echo ADM_ONLINE_TOOLS; ?></p>

						<!-- Les deux onglets -->

						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#article" type="button" role="tab" aria-controls="home" aria-selected="true">Mon article</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#options" type="button" role="tab" aria-controls="options" aria-selected="false">Options</button>
							</li>
						</ul>

						<div class="tab-content" id="myTabContent">

							<!-- Contenu du premier onglet -->
							<div class="tab-pane fade show active" id="article" role="tabpanel" aria-labelledby="article-tab">

							<?php

							/* création du nouvel article */	

							$article = new articles();
							$erreur = 0;

							/* Cas où on enregistre l'article sans le publier */

							if(isset($_POST["enregistrer"]))
								{

								/* récupération des champs éventuellement remplis */

								if(!empty($_POST ['titre']))
									{
									$article->titre = $_POST ['titre'];
									}
								else 
									{
									$article->titre = "";
									}

								// Message si le champ message est vide
								
								if(!empty ( $_POST ['texte'] ))
									{
									$article->contenu = $_POST ['texte'];
									}
								else
									{
									$article->contenu = "";
									}

								// Message si le champ catégorie est vide
								
								if(!empty ( $_POST['categorie'] ))
									{
									$article->categorie = $_POST ['categorie'];
									}
								else
									{
									$article->categorie = "";
									}

								/* Test de récupération de la méta description depuis le 2e onglet */

								if(isset($_POST['metaD']))
									{
									$article->description=$_POST['metaD'];
									}
								else
									{
									$article->description= "";
									}

								/* Test de récupération de la méta keywords depuis le 2e onglet */
							
								if(isset($_POST['metaK']))
									{
									$article->keywords = $_POST['metaK'];
									}
								else
									{
									$article->keywords = "";
									}

								/* On est dans l'enregistrement d'un article sans le publier */

								$article->publication = '0';

								}
								
							/* Cas où on publie l'article, il faut que tous les champs soit remplis */

							if(isset($_POST["envoyer"])) 
								{ 

								var_dump($_POST);



								// Message si le champ titre est vide

								if(empty ( $_POST ['titre'] ))
									{
									echo '<div class="alert alert-warning" role="alert">';
									echo '<i class="bi bi-exclamation-triangle-fill me-2"></i> '.ADM_ARTICLE_NOTITLE;
									echo '</div>';

									/* Enregistrement de l'action dans le journal */
									$moment = date("F j, Y, g:i ");
									file_put_contents("logs/blog.log", $moment.ADM_ARTICLE_NOTITLE."\n" , FILE_APPEND);

									$erreur = 1;
									}
								else
									{
									$article->titre = $_POST ['titre'];
									}

								// Message si le champ contenu est vide
								
								if(empty($_POST['texte']))
									{
									echo '<div class="alert alert-warning mt-2" role="alert">';
									echo '<i class="bi bi-exclamation-triangle-fill me-2"></i> '.ADM_ARTICLE_NOCONTENT;
									echo '</div>';

									/* Enregistrement de l'action dans le journal */
									$moment = date("F j, Y, g:i ");
									file_put_contents("logs/blog.log", $moment.ADM_ARTICLE_NOCONTENT."\n" , FILE_APPEND);

									$erreur = 1;
									}
								else
									{
									$article->contenu = $_POST ['texte'];
									}

								/* Message si aucune catégorie n'a été choisie */
								
								if((empty($_POST['categorie'])) || ($_POST['categorie'] == ADM_ARTICLE_CAT_LIST))
									{
									echo '<div class="alert alert-warning mt-2" role="alert">';
									echo '<i class="bi bi-exclamation-triangle-fill me-2"></i> '.ADM_ARTICLE_NOCAT;
									echo '</div>';

									/* Enregistrement de l'action dans le journal */
									$moment = date("F j, Y, g:i ");
									file_put_contents("logs/blog.log", $moment.ADM_ARTICLE_NOCAT."\n" , FILE_APPEND);

									$erreur = 1;
									}
								else
									{
									$article->categorie = $_POST ['categorie'];
									}

								if(!empty($_POST['metaD']))
									{
									$article->description=$_POST['metaD'];
									}
						
								if(!empty($_POST['metaK']))
									{
									$article->keywords = $_POST['metaK'];
									}

								/* Message si l'article n'a pas pu être envoyer */	
									
								if (($erreur == '1'))
									{
									echo '<div class="alert alert-warning mt-2" role="alert">';
									echo '<i class="bi bi-exclamation-triangle-fill me-2"></i> '.ADM_ARTICLE_NOSEND;
									echo '</div>';

									/* Enregistrement de l'action dans le journal */
									$moment = date("F j, Y, g:i ");
									file_put_contents("logs/blog.log", $moment.ADM_ARTICLE_NOSEND."\n" , FILE_APPEND);

									}
															
								/* Message si l'article est publié */

								$article->publication = '1';

								}
									
							// Tout est bien rempli !
															
							if (isset($article->titre) and isset($article->categorie) and isset($article->contenu))
								{
									
								$datearticle = date ( "Y-m-d", time () );

								/*
								* TODO: Pour l'instant, l'auteur de l'article est 1
								* quand la connexion à l'admin sera ok
								* il faudra récupérer le n° de l'auteur
								*/

								$auteur = "1";

								/* Hop ! L'article est mis dans la base */

								$sqlAjoutArticle = "INSERT INTO articles (titre, article, auteur, date, id_cat, publication, meta_des, keywords) values (:p1, :p2, :p3, :p4, :p5, :p6, :p7, :p8)";
								$AjoutArticle = $pdo->prepare ( $sqlAjoutArticle );

								$AjoutArticle->bindparam ( ':p1', $article->titre, PDO::PARAM_STR );
								$AjoutArticle->bindparam ( ':p2', $article->contenu, PDO::PARAM_STR );
								$AjoutArticle->bindparam ( ':p3', $auteur,PDO::PARAM_STR );
								$AjoutArticle->bindparam ( ':p4', $datearticle );
								$AjoutArticle->bindparam ( ':p5', $article->categorie,PDO::PARAM_INT);
								$AjoutArticle->bindparam ( ':p6', $article->publication,PDO::PARAM_INT);
								$AjoutArticle->bindparam ( ':p7', $article->description,PDO::PARAM_STR);
								$AjoutArticle->bindparam ( ':p8', $article->keywords,PDO::PARAM_STR);

								$AjoutArticle->execute ();

								/* Préparation du message de confirmation en fonction de publier/enregistrer */
										
								if ($article->publication == '1')
									{
									echo '<div class="alert alert-success d-flex align-items-center" role="alert">';
									echo '<i class="bi bi-check-circle-fill me-2"></i>'.ADM_ARTICLE_SEND;
									echo '</div>';

									/* Enregistrement de l'action dans le journal */
									$moment = date("F j, Y, g:i ");
									file_put_contents("logs/blog.log", $moment.ADM_ARTICLE_SEND."\n" , FILE_APPEND);
									}
								else
									{
									echo '<div class="alert alert-success d-flex align-items-center" role="alert">';
									echo '<i class="bi bi-check-circle-fill me-2"></i>'.ADM_BR_SEND;
									echo '</div>';

									/* Enregistrement de l'action dans le journal */
									$moment = date("F j, Y, g:i ");
									file_put_contents("logs/blog.log", $moment.ADM_BR_SEND."\n" , FILE_APPEND);
									}
								} 
								else 
								{
							?>

							<div class="input-group input-group-sm my-3">
								<span class="input-group-text"><?php echo ADM_ARTICLE_EDIT_TITLE; ?></span>
								<input type="text" class="form-control" name="titre" value="<?php if(isset($article->titre)) { echo $article->titre; }?>">
							</div>
							
							<div class="input-group input-group-sm mb-3">
								<span class="input-group-text"><?php echo ADM_ARTICLE_EDIT_CAT; ?></span>
								<select class="form-select" name='categorie'>
									<?php 
									if(isset($article->categorie))
										{																										
										$cat = $pdo->query("SELECT * FROM categories WHERE ref = '{$article->categorie}'");
										$rowcat = $cat->fetch(PDO::FETCH_ASSOC);
										echo "<option value='".$rowcat['ref']."'>".$rowcat['nom']."</option>";
										
										$cat = $pdo->query("SELECT * FROM categories WHERE NOT ref = '{$article->categorie}'");								
										while ($rowcat = $cat->fetch(PDO::FETCH_ASSOC))
											{
											echo "<option value='".$rowcat['ref']."'>".$rowcat['nom']."</option>";
											}									
										}
									else 
										{										
										echo "<option selected>".ADM_ARTICLE_CAT_LIST."</option>";
										
										$cat = $pdo->query("SELECT * FROM categories");
										while ($rowcat = $cat->fetch(PDO::FETCH_ASSOC))
											{
											echo "<option value='".$rowcat['ref']."'>".$rowcat['nom']."</option>";
											}
										}
									?>
								</select>
							</div>
					
							<div class="mb-3">
								<!--textarea id="editor" name="texte" id="custom-menu-item" class="form-control individu"-->
								<textarea id="editor" name="texte" class="form-control">
								<?php if(isset($article->contenu)) { echo $article->contenu; }?></textarea>
							</div>

							<?php } ?>

							</div>

							<!-- 2e onglet -->

							<div class="tab-pane fade" id="options" role="tabpanel" aria-labelledby="options-tab">

								<p class="mt-3">qqs options seo ?</p>

								<div class="input-group input-group-sm my-3">
									<span class="input-group-text">Méta description</span>
									<input type="text" class="form-control" name="metaD" value=" ">
								</div>

								<div class="input-group input-group-sm my-3">
									<span class="input-group-text">Méta keywords</span>
									<input type="text" class="form-control" name="metaK" value=" ">
								</div>
							
							</div>

						</div>
	
						<div class="d-grid d-md-flex justify-content-md-end mt-3">
							<button type="submit" name="enregistrer" class="btn btn-sm btn-secondary"><?php echo ADM_ARTICLE_SAVE; ?></button>
							<button type="submit" name="envoyer" class="btn btn-sm btn-secondary ms-3"><?php echo ADM_ARTICLE_PUBLISH; ?></button>
						</div>

					</div>

				</div>

				</form>

			</div> 

		</div>

</div>