<?php

/* traitement si la personne a envoyé un commentaire */
/* tous les champs sont obligatoires, sauf le site */
/* on vérifie que la personne a tout complété et on met tout dans la BD */

$commSent = new Commentaires();

if(!empty($_POST))
	{
	if(empty( $_POST ['pseudo'] ))
		{
		echo '<div class="alert alert-warning" role="alert">';
		echo '<i class="fas fa-exclamation-triangle"></i>'.COM_NO_PSEUDO.'</div>';
		}
	else
		{
		$commSent->nom_auteur = $_POST ['pseudo'];
		}

	if(empty ( $_POST ['email'] ))
		{
		echo '<div class="alert alert-warning" role="alert">';
		echo '<i class="fas fa-exclamation-triangle"></i>'.COM_NO_EMAIL.'</div>';
		}
	else
		{
		$commSent->email_auteur = $_POST ['email'];
		}

	if(empty ( $_POST ['message'] ))
		{
		echo '<div class="alert alert-warning" role="alert">';
		echo '<i class="fas fa-exclamation-triangle"></i>'.COM_NO_MSG.'</div>';
		}
	else
		{
		$commSent->contenu = $_POST ['message'];
		}
	}

if (!empty ( $_POST ['message'] ) and !empty ( $_POST ['email'] ) and !empty ( $_POST ['pseudo'] ))
	{
	/* on met le commentaire dans la BD + message qui dit que c'est bien envoyé */

	$sqlAjoutComm = "INSERT INTO commentaires(id_article, nom_auteur, email_auteur, contenu, url_auteur, date_com) values (:p1, :p2, :p3, :p4, :p5, :p6)";
			
	$AjoutComm = $pdo2->prepare ( $sqlAjoutComm);
	$commSent->today = date("Y-m-d H:i:s"); 

	$AjoutComm->bindparam ( ':p1', $_GET['id']);
	$AjoutComm->bindparam ( ':p2', $commSent->nom_auteur);
	$AjoutComm->bindparam ( ':p3', $commSent->email_auteur);
	$AjoutComm->bindparam ( ':p4', $commSent->contenu);
	$AjoutComm->bindparam ( ':p5', $commSent->url_auteur);
	$AjoutComm->bindparam ( ':p6', $commSent->today);

	if ($AjoutComm->execute ())
		{
		/* Message de confirmation : Le comm' a été envoyé */
		echo '<div class="alert alert-success" role="alert">';
		echo "<i class='fas fa-exclamation-triangle'></i>".COM_SUCCESS."</div>";
		}
	}

/* récupération de l'article */ 

$article = new articles();

$article->ref = $_GET['id'];

$sqlArticle = $pdo2->query("SELECT * FROM articles WHERE ref='$article->ref'");
$row = $sqlArticle->fetch(PDO::FETCH_ASSOC);
	
$article->auteur = $row['auteur'];
$article->titre = $row['titre'];
$article->date = $row['date'];
$article->categorie = $row['id_cat'];
$article->contenu = $row['article'];
			
/* Auteur de l'article */

$sqlAuteur = $pdo2->prepare("select * from membres where id=:id");
$sqlAuteur->bindValue("id", $article->auteur, PDO::PARAM_INT);
$sqlAuteur->execute();
$row = $sqlAuteur->fetch(PDO::FETCH_ASSOC);

$article->auteur = $row['login'];

/* Date de l'article */

if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $article->date ))
	{
	$article->date = substr ( $article->date, 8, 2 ) . " " . MoisEnLettres(substr ( $article->date, 5, 2 )) . " " . substr ( $article->date, 0, 4 );
	}

$article->Afficher($pdo2);

/* Commentaires de l'article */

$commentaire = new Commentaires();
 
$commentaire->AfficheCommentaire($article->ref, $pdo2, $commSent);

?>