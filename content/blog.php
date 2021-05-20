<?php

/* ------------------------- */
/* CREATION D'UN FICHIER RSS */
/* ------------------------- */

/* Efface le FLUX RSS s'il existe */

if (file_exists ( "content/rss.xml" ))
{
	unlink ( "content/rss.xml" );
}

/* ouverture du fichier */

$fp = fopen ( "content/rss.xml", 'a' );

/* creation du code du fichier RSS */

$rss = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE xml><rss version="2.0">
<channel>
<title>' . RSS_TITLE . '</title>
<description>' . RSS_DESCRIPTION . '</description>
<lastBuildDate>' . date ( "r", time () ) . '</lastBuildDate>
<link>' . URL_SITE . '</link>
';

$req = $pdo2->query ( "SELECT * FROM articles" );

while ( $row = $req->fetch (PDO::FETCH_ASSOC) )
{
	$rss = $rss . '<item>';
	$rss = $rss . '<title>' . $row ['titre'] . '</title>';
	$rss = $rss . '<description>' . substr ( $row ['article'], 0, 125 ) . '...</description>';
	
	/* transformation de la date SQL en date PHP au format RFC 822 */
	
	$rss = $rss . '<pubDate>' . date ( "r", strtotime ( $row ['date'] ) ) . '</pubDate>';
	$url = URL_SITE . "index.php?page=article&id=" . $row ['ref'];
	$rss = $rss . '<link>' . $url . '</link>';
	$rss = $rss . '</item>';
}

$rss = $rss . "</channel></rss>";

/* enregistrement du code dans le fichier */

fwrite ( $fp, $rss );

/* ---------------------------- */
/* PREPARATION DE LA PAGINATION */
/* ---------------------------- */

/* Nombre d'articles par page */

$messagesParPage = NombreArticlePage($pdo2);

/* ici on compte le nombre d'articles total */

$sql = "select * from articles";
$req = $pdo2->prepare ($sql);
$req->execute ();
$total = $req->rowCount ();

/* On peut en déduire le nombre d'articles par page */

$ndp=ceil($total/$messagesParPage);

/* Page en cours... */

if(isset($_GET['pg'])) 
	{
	$pa=intval($_GET['pg']);
	
	if($pa>$ndp) 
		{
		$pa=$ndp;
		}
	}
else
	{
	$pa=1; 
	}

$premiereEntree=($pa-1)*$messagesParPage;

/* ---------------------------------------------- */
/* AFFICHAGE DES ARTICLES SOUS LA FORME D'UN BLOG */
/* ---------------------------------------------- */

$req = 'SELECT * FROM articles ORDER BY date DESC LIMIT '.$premiereEntree.', '.$messagesParPage.' ';
$resultat = $pdo2->prepare( $req );
$resultat->execute();

while ( $data = $resultat->fetch(PDO::FETCH_ASSOC) )
{
	
	$article = new articles();
	$commentaire = new Commentaires();
	
	/* ref de l'article */
	
	$article->ref = $data['ref'];
		
	/* Auteur de l'article */
	
	$res_membres = $pdo2->prepare( "select * from membres where id=:id" );
	$res_membres->bindValue ( "id", $data['auteur'], PDO::PARAM_INT );
	$res_membres->execute();
	
	while ( $data_membres = $res_membres->fetch(PDO::FETCH_ASSOC) ) {
		$article->auteur = $data_membres['login'];
	}
	
	/* titre de l'article */
	
	$article->titre = $data['titre'];
	
	/* date de l'article */
	
	if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $data ['date'] )) {
		$article->date = substr ( $data ['date'], 8, 2 ) . " " . MoisEnLettres(substr ( $data ['date'], 5, 2 )) . " " . substr ( $data ['date'], 0, 4 );
	}
	
	/* catégorie de l'article */
	
	$article->categorie = $data['id_cat'];
	
	/* contenu de l'article */
	
	$article->contenu = $data['article'];
	
	/* contenu de l'article */
	
	$article->Afficher($pdo2);
	$commentaire->AfficheLien($article->ref, $pdo2);
		
}

/* -------------------------- */
/* AFFICHAGE DE LA PAGINATION */
/* -------------------------- */

?>

<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    
  	<?php 
      
   	/* bouton "page précédente" */
      
    if ($pa >= 2)
      	{
      	$i = $pa - 1;
      	echo '<li class="page-item">';
      	echo '<a class="page-link" href="index.php?page=blog&pg='.$i.'">&laquo;</a>';
      	echo '</li>';
      	}
    else 
      	{
      	echo '<li class="page-item disable"><span class="page-link" href="#">&laquo;</span></li>';
      	}
      	
    /* boutons avec les numéros des pages */  	
      	
    /* TODO : ça plante l'affichage si il y a trop de pages */
      
    for($i=1; $i<=$ndp; $i++)	

    // for($i=1; $i<=80; $i++)	
    	{
		if($i==$pa)
			{
		    echo '<li class="page-item active">';
		    echo '<span class="page-link">'.$i.'</span>';
		    echo '</li>';
		    }    
		else
		    {
		    echo '<li class="page-item">';
		    echo '<a class="page-link" href="index.php?page=blog&pg='.$i.'">'.$i.'</a>';
		    echo '</li>';
		    }
		}
      
    /* bouton "page suivante" */
         
	if ($pa < $ndp)
      	{
      	$i = $pa + 1;
      	echo '<li class="page-item">';
		echo '<a class="page-link" href="index.php?page=blog&pg='.$i.'">';
        echo '&raquo;</a></li>';
      	}
    else 
      	{
      	echo '<li class="page-item disable"><span class="page-link" href="#">&raquo;</span></li>';
      	}
      
    ?>
   
  </ul>
</nav>