<?php 

/* --------------------------------------------- */
/* Affichage d'un article et de ses commentaires */
/* --------------------------------------------- */

/* Si un commentaire a été envoyé, on le récupére ici */

if (! empty ( $_POST ['pseudo'] ) and ! empty ( $_POST ['email'] ) /* and !empty($_POST['site']) */ and ! empty ( $_POST ['message'] )) {
	
	$commentaire = new commentaires ();
	
	$commentaire->article = $_GET ['id'];
	$commentaire->nom_auteur = $_POST ['pseudo'];
	$commentaire->email_auteur = $_POST ['email'];
	$commentaire->url_auteur = $_POST ['site'];
	$commentaire->contenu = $_POST ['message'];
	$commentaire->today = date ( "Y-m-d H:i:s" ); // (le format DATETIME de MySQL)
	
	$req = "INSERT INTO commentaires (id_article, nom_auteur, email_auteur, url_auteur, contenu, date_com)
    VALUES (:article, :nom, :email, :url, :contenu, :today)";
	
	$res = $pdo2->prepare ( $req );
	$res->bindparam ( ':article', $commentaire->article, PDO::PARAM_STR );
	$res->bindparam ( ':nom', $commentaire->nom_auteur, PDO::PARAM_STR );
	$res->bindparam ( ':email', $commentaire->email_auteur, PDO::PARAM_STR );
	$res->bindparam ( ':url', $commentaire->url_auteur, PDO::PARAM_STR );
	$res->bindparam ( ':contenu', $commentaire->contenu, PDO::PARAM_STR );
	$res->bindparam ( ':today', $commentaire->today, PDO::PARAM_STR );
	$res->execute ();
}

/* Récupération de l'article */

$article = new articles ();

$article->ref = $_GET ['id'];

$resultat = $pdo2->query ( "SELECT * FROM articles WHERE ref='$article->ref'" );

while ( $data = $resultat->fetch () ) 
{
	$article->auteur = $data ['auteur'];
	$article->titre = $data ['titre'];
	$article->date = $data ['date'];
	$article->categorie = $data ['id_cat'];
	$article->contenu = $data ['article'];
}

/* Auteur de l'article */

$res_membres = $pdo2->prepare ( "select * from membres where id=:id" );
$res_membres->bindValue ( "id", $article->auteur, PDO::PARAM_INT );
$res_membres->execute ();

while ( $data_membres = $res_membres->fetch () )
{
	$article->auteur = $data_membres ['login'];
}

/* Date de l'article */

if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $article->date )) 
{
	$article->date = substr ( $article->date, 8, 2 ) . " " . MoisEnLettres(substr ( $article->date, 5, 2 )) . " " . substr ( $article->date, 0, 4 );
}

?>

<div class="row">
	<div class="col-md-12">
			<?php echo "<h3><a href='index.php?page=see_comments&id=".$article->ref."'>" . html_entity_decode ($article->titre) . "</a></h3>"; ?>
		</div>
</div>

<div class="row">
	<div class="col-md-8">
	<?php

	echo "<p>" . AUTHOR . $article->auteur;
	echo DATE.$article->date;
	echo RUBRIC;
	echo "<a href='index.php?page=categories&id=" . $article->categorie . "'>" . get_category_name ( $pdo2, $article->categorie ) . "</a>";
	
	?>

	</div>
	<div class="col-md-2 offset-md-2">
	
	<?php

	/* affichage des boutons d'export : pdf, mail, print */

	echo "<p>";

	echo "<a href='pdf.php?page=categories&id=" . $article->ref . "'><i class='far fa-file-pdf fa-2x'></i></a>&nbsp;&nbsp;";
	echo "<a href='print.php?id=" . $article->ref . "'><i class='fas fa-print fa-2x'></i></a>&nbsp;&nbsp;";
	echo "<a href='#'><i class='fas fa-envelope-square fa-2x'></i></a>&nbsp;&nbsp;";

	echo "</p>";

	?>
	
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		
	<?php

	/* Contenu de l'article */

	echo "<p>" . $article->contenu . "</p>";

	?>
	
	</div>
</div>

<div id="commentaires" class="col-md-12">

<?php

/* affichage des comm's */

/* TODO : peut-être que je peux récupérer les comms dans un tableau au début de la page */
/* et afficher le tableau ici */

$resultat = $pdo2->query ( "SELECT * FROM commentaires WHERE id_article='$article->ref' ORDER BY date_com DESC" );

while ( $data = $resultat->fetch () ) 
{	
?>

<div class='card card-alert'>
	<div class="card-header">
		<?php 	
		$DateTemp = date ( "Y-m-d", strtotime ( $data ['date_com'] ) );
		$DateCommentaire = explode("-" , $DateTemp);
			
		echo  $data ['nom_auteur'].  COMMENTS .$DateCommentaire[2]." ". MoisEnLettres($DateCommentaire[1])." ". $DateCommentaire[0];
			
		?>
	</div>	
	<div class="card-body">
		<?php echo $data ['contenu']; ?>
	</div>
</div>
	
<?php } ?> 
	
</div>	