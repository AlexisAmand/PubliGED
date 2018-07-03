<?php

if (!empty($_POST['pseudo']) and !empty($_POST['email']) /* and !empty($_POST['site']) */ and !empty($_POST['message'])) 
	{	
		
	$commentaire = new commentaires();
		
	$commentaire->article = $_GET['id'];
	$commentaire->nom_auteur = $_POST['pseudo'];
	$commentaire->email_auteur = $_POST['email'];
	$commentaire->url_auteur = $_POST['site'];
	$commentaire->contenu = $_POST['message'];
	$commentaire->today = date("Y-m-d H:i:s"); // (le format DATETIME de MySQL)
						
	$req = "INSERT INTO commentaires (id_article, nom_auteur, email_auteur, url_auteur, contenu, date_com)
    VALUES (:article, :nom, :email, :url, :contenu, :today)";
		
	$res = $pdo2->prepare($req);
	$res->bindparam(':article', $commentaire->article, PDO::PARAM_STR);
	$res->bindparam(':nom', $commentaire->nom_auteur, PDO::PARAM_STR);
	$res->bindparam(':email', $commentaire->email_auteur, PDO::PARAM_STR);
	$res->bindparam(':url', $commentaire->url_auteur, PDO::PARAM_STR);
	$res->bindparam(':contenu', $commentaire->contenu, PDO::PARAM_STR);
	$res->bindparam(':today', $commentaire->today, PDO::PARAM_STR);
	$res->execute ();
	
	}

/* L'article */
	
$id_article = $_GET['id'];
	
$resultat = $pdo2->query ("SELECT * FROM articles WHERE ref='$id_article'");
	
while ( $data = $resultat->fetch () )
    {
	$article = new articles();
			
	$article->ref = $data['ref'];
	$article->auteur = $data['auteur'];
	$article->titre = $data['titre'];
	$article->date = $data['date'];
	$article->categorie = $data['id_cat'];
	$article->contenu = $data['article'];		
	}
			
/* vue de l'article avec ses commentaires */

	echo "<h3><a href='index.php?page=see_comments&id=".$article->ref."'>" . html_entity_decode ($article->titre) . "</a></h3>";
	
	/* Auteur de l'article */
	
	echo "<p>" . AUTHOR;
		
	$res_membres = $pdo2->prepare ("select * from membres where id=:id");
	$res_membres->bindValue("id",$article->auteur,PDO::PARAM_INT);
	$res_membres->execute ();
	
	while ( $data_membres = $res_membres->fetch () )
       {
       echo $data_membres['login'];
	   }
	
	/* Date de l'article */
	   
	echo DATE;
		
	if(preg_match("/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $article->date))
	   {
	   echo substr($article->date, 8, 2).substr($article->date, 7,1).substr($article->date, 5,2).substr($article->date, 4,1).substr($article->date, 0,4);
       }
			
    /* Catégorie de l'article */
       
	echo RUBRIC;
			
	echo "<a href='index.php?page=categories&id=".$article->categorie."'>".get_category_name ( $pdo2, $article->categorie)."</a>";
		
	/* affichage des boutons d'export : pdf, mail, print */
	
	echo "<p>";
	
	echo "<a href='pdf.php?page=categories&id=".$article->ref."'><i class='far fa-file-pdf fa-2x'></i></a>&nbsp;&nbsp;";
	echo "<a href='print.php?id=".$article->ref."'><i class='fas fa-print fa-2x'></i></a>&nbsp;&nbsp;";
	echo "<a href='#'><i class='fas fa-envelope-square fa-2x'></i></a>&nbsp;&nbsp;";
	
	echo "</p>";
	
	/* Contenu de l'article */
		
	echo "<p>".$article->contenu."</p>";		
				
	$next_article = $id_article + 1;
	$prev_article = $id_article - 1; 
	
?>

<ul class="pager">
	
<?php 
if ($id_article > 1)
    {
	echo '<li><a href="index.php?page=see_comments&id='.$prev_article.'">< article précédent</a></li>';
	}
	   
$next_req = $pdo2->prepare('SELECT * FROM articles');
$next_req->execute();
	
if ($id_article < $next_req->RowCount())
    {
	echo '<li><a href="index.php?page=see_comments&id='.$next_article.'">article suivant ></a></li>';
	}
?>
	
</ul>

<div class="col-md-12">

<?php

/* affichage des comm's */

$resultat = $pdo2->query ("SELECT * FROM commentaires WHERE id_article='$id_article' ORDER BY date_com DESC");

while ( $data = $resultat->fetch () ) 
	{		
	echo "<br /><div class='card card-alert'>";		
	echo "Le ".date("Y-m-d", strtotime($data['date_com']))." ".$data ['nom_auteur'] ." a dit: <br /><br />";
	echo "<p>".$data ['contenu'] ."</p>";
	echo "</div>";
	}
			
?>

</div>

<!-- Formulaire des commentaires -->
	
<div class="col-md-6 col-xs-12 col-sm-6">	
	
<form action="index.php?page=see_comments&id=<?php echo $id_article; ?>" method="POST" class="form-vertical">

	<div class="form-group">
		<label for="pseudo">Pseudo</label>
		<input id="pseudo" type="text" name="pseudo" class="form-control"/>
	</div>
	
	<div class="form-group">
		<label for="site">Site (ou blog)</label>
		<input id="site" type="text" name="site"  class="form-control"/>
	</div>
	
	<div class="form-group">
		<label for="email">Email</label>
		<input id="email" type="text" name="email"  class="form-control"/>	
	</div>
	
	<div class="form-group">
		<label for="email">Commentaire</label>
		<textarea id="commentaire" name="message"  class="form-control"></textarea>
	</div>
	
	<input type="submit" class="btn btn-default">
	
</form>

</div>