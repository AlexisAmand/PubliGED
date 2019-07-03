	          
		 <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?php echo ADM_RUB_TITRE_0; ?></h1>
          <p class="mb-4"><?php echo ADM_ARTICLE_ADD_INTRO; ?></p>         
		                    
          <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary"><?php echo ADM_RUB_TITRE_0; ?></h6>
               </div>
               <div class="card-body">
                  	<?php

	if (! empty ( $_POST ['texte'] ) and ! empty ( $_POST ['titre'] ) and ! empty ( $_POST ['categorie'] )) {

		$datearticle = date ( "Y-m-d", time () );

		/*
		 * TODO: Pour l'instant, l'auteur de l'article est 1
		 * quand la connexion à l'admin sera ok
		 * il faudra récupérer le n° de l'auteur
		 */

		$auteur = "1";

		$sqlAjoutArticle = "INSERT INTO articles(titre, article, auteur, date, id_cat) values (:p1, :p2, :p3, :p4, :p5)";

		$AjoutArticle = $pdo2->prepare ( $sqlAjoutArticle );

		$AjoutArticle->bindparam ( ':p1', $_POST ['titre'] );
		$AjoutArticle->bindparam ( ':p2', $_POST ['texte'] );
		$AjoutArticle->bindparam ( ':p3', $auteur );
		$AjoutArticle->bindparam ( ':p4', $datearticle );
		$AjoutArticle->bindparam ( ':p5', $_POST ['categorie'] );

		$AjoutArticle->execute ();
		?>
		
		<div class="alert alert-success" role="alert">
		<?php echo ADM_ARTICLE_SEND; ?>
		</div>
		
		<?php
	} 
	else 
	{
?>

<p><?php echo ADM_ONLINE_TOOLS; ?></p>

<form method="POST" action="index.php?page=ajout-article">

	<div class="form-group">
		<label for="TitreArticle"><?php echo ADM_ARTICLE_EDIT_TITLE; ?></label>
	    <input class="form-control" id="TitreArticle" name='titre'>
	</div>

	<?php
	$cat = $pdo2->query ( "select * from categories" );
	?>
	
	<div class="form-group">
		<label for="TitreArticle"><?php echo ADM_ARTICLE_EDIT_CAT; ?></label>
		<select name='categorie' class="custom-select">
		<option selected><?php echo ADM_ARTICLE_CAT_LIST;?></option>

		<?php 
		while ( $rowcat = $cat->fetch () ) 
		{
			echo "<option value='" . $rowcat ['ref'] . "'>" . $rowcat ['nom'] . "</option>";
		}
		?>
		</select>
	</div>

	 <div class="form-group">
	    <label for="TitreArticle"><?php echo ADM_ARTICLE_EDIT_CONTENT; ?></label>
	    <textarea name="texte"></textarea>
	 </div>
	
	<input type="submit" class="btn btn-primary" value="Sauvegarder">
	<input type="submit" class="btn btn-primary" value="<?php echo ADM_ARTICLE_PUBLISH; ?>">
</form>

 <?php } ?>
	
               </div>
         