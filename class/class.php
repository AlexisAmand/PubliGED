<?php
class pages 
	{
	public $nom;
	public $titre;
	public $description;
	public $rubrique;
		
	public function AfficherContenu($pdo2) 
		{		
		$balise = ($GLOBALS['aside']==1)?'<article class="col-md-9">':'<article class="col-md-12">';
		echo $balise;			
		include ('content/' . $this->nom . '.php');
		echo '</article>';
		}
	
	public function AfficherAside($pdo2) 
		{

		/* Par défaut, on supppose que le aside est affiché */	
		
		$GLOBALS['aside'] = '1';
			
		$sqlPages = "select * from pages";
		$reqPages = $pdo2->prepare($sqlPages);
		$reqPages->execute();
		
		/* TODO: ici un test si l'user veut le menu à droite ou à gauche, selon le cas il me semble qu'il existe un class bootstrap qui permet de choisir d'autre des colonnes (aside et article, ou article puis aside. */
				
		$balise = ($GLOBALS['aside']==1)?'<aside class="col-md-3">':'<aside class="col-md-12">';		
		echo $balise;
					
		while($row = $reqPages->fetch())
			{
				
			if ($row['nom'] == $this->nom)	
				{
				switch ($row['section'])
					{
					
					/* $aside est une sorte de booléen. Si = 1, il y a un menu à mettre dans l'aside, si = 0, il n'y a pas de menu à afficher, comme dans contact par exemple */	
						
					case 'blog':
						include ('include/sidebar-blog.inc');
						$GLOBALS['aside'] = 1;
						break;
					case 'genealogie':
						include ('include/sidebar-genealogie.inc');
						$GLOBALS['aside'] = 1;
						break;
					case 'search':
						include ('include/sidebar-search.inc');
						$GLOBALS['aside'] = 1;
						break;
					default:
						$GLOBALS['aside'] = 0;
						/* TODO: pas de sidebar, on peut afficher l'article sur toute la largeur de la page */
					}
				}
			}
		
		echo '</aside>';
						
		}

	public function AfficherFooter() 
		{
		include ('include/footer.inc');
		}
	
	public function Titre() 
		{
		return SITE_TITLE . " - " . $this->titre;
		}
}

/* classes de partie généalogie */

class evenements 
	{
	public $ref;
	public $nom;
	public $note;
	public $source;
	public $evenement;
	public $date;
	public $lieu;
	public $type;
	}

/* classes de la partie blog */

class commentaires 
	{
	public $article;
	public $nom_auteur;
	public $email_auteur;
	public $url_auteur;
	public $contenu;
	public $today;
	
	/* affiche un lien vers les commentaires */
	
	public function AfficheLien($id,$pdo3)
		{		
		$sqlCommentaires = "select * from commentaires where id_article='{$id}'";
		$reqCommentaires = $pdo3->prepare($sqlCommentaires);
		$reqCommentaires->execute();
		
		echo "<div class='row'>";
			echo "<div class='col-md-12' id='commentaires'>";
			echo "<a href='index.php?page=article&id=".$id."'>[".SEECOMS."] (".$reqCommentaires->rowCount().")</a>";
			echo "</div>";
		echo "</div>";
		}
		
	/* affiche les commentaires */
	
	public function AfficheCommentaire($id,$pdo3)
		{
			$sqlCommentaires = "select * from commentaires where id_article='{$id}' ORDER BY date_com DESC";
			$reqCommentaires = $pdo3->prepare($sqlCommentaires);
			$reqCommentaires->execute();
			
			echo "<div class='row'>";
			echo "<div class='col-md-12' id='commentaires'>";
			
			while ($data = $reqCommentaires->fetch(PDO::FETCH_ASSOC))
				{
				echo "<div class='card card-alert'>";
					echo "<div class='card-header'>";
					$DateTemp = date("Y-m-d", strtotime($data['date_com']));
					$DateCommentaire = explode("-" , $DateTemp);
					echo  $data ['nom_auteur'].COMMENTS.$DateCommentaire[2]." ". MoisEnLettres($DateCommentaire[1])." ". $DateCommentaire[0];
					echo "</div>";
					echo "<div class='card-body'>";
					echo $data ['contenu'];
					echo "</div>";
				echo "</div>";
				}
			
			echo '</div>';
			echo '</div>';
			
			echo '<div class="col-md-6 col-xs-12 col-sm-6">';
			
			echo '<form action="index.php?page=article&id='.$id.'" method="POST" class="form-vertical">';
			
			echo '<div class="form-group">';
			echo '<label for="pseudo">Pseudo</label> <input id="pseudo" type="text" name="pseudo" class="form-control" />';
			echo '</div>';
			
			echo '<div class="form-group">';
			echo '<label for="site">Site (ou blog)</label> <input id="site" type="text" name="site" class="form-control" />';
			echo '</div>';
			
			echo '<div class="form-group">';
			echo '<label for="email">Email</label> <input id="email" type="text" name="email" class="form-control" />';
			echo '</div>';
			
			echo '<div class="form-group">';
			echo '<label for="email">Commentaire</label>';
			echo '<textarea id="commentaire" name="message" class="form-control"></textarea>';
			echo '</div>';
			
			echo '<input type="submit" class="btn btn-default">';
			
			echo '</form>';
			
			echo '</div>';
			
		}
	}
	
class articles 
	{
	public $ref;
	public $auteur;
	public $titre;
	public $date;
	public $categorie;
	public $contenu;
	
	
	
	public function Recuperer($pdo3)
		{
		
		}
	
	public function Afficher($pdo3)
		{
		
		/* Titre de l'article */
			
		echo "<div class='row'>";			
			echo "<div class='col-md-12'>";
			echo "<h3><a href='index.php?page=article&id=".$this->ref."'>".html_entity_decode ($this->titre)."</a></h3>"; 
			echo "</div>";		
		echo "</div>";
		
		echo "<div class='row'>";
		
		/* Auteur et date de l'article */
		
		echo "<div class='col-md-8'>";		
			echo "<p>".AUTHOR.$this->auteur;
			echo DATE.$this->date;
			echo RUBRIC;
			echo "<a href='index.php?page=categories&id=".$this->categorie."'>".get_category_name($pdo3, $this->categorie)."</a>";		
		echo "</div>";		
		/* affichage des boutons d'export : pdf, mail, print */
		
		echo "<div class='col-md-2 offset-md-2'>";
			echo "<p>";
			echo "<a href='pdf.php?page=categories&id=".$this->ref."'><i class='far fa-file-pdf fa-2x'></i></a>&nbsp;&nbsp;";
			echo "<a href='print.php?id=".$this->ref."'><i class='fas fa-print fa-2x'></i></a>&nbsp;&nbsp;";
			echo "<a href='#'><i class='fas fa-envelope-square fa-2x'></i></a>&nbsp;&nbsp;";
			echo "</p>";
		echo "</div>";
		
		echo "</div>";

		/* Contenu de l'article */
		
		echo "<div class='row'>";
			echo "<div class='col-md-12'>";
			echo "<p>".$this->contenu."</p>";		
			echo "</div>";
		echo "</div>";
		
		}
	}

/* classes pour la lecture du gedcom */

class uploaders 
	{
	public $name;
	public $mail;
	public $adresse;
	public $www;
	}
	
class famille 
	{
	public $ref;
	public $husb;
	public $wife;
	public $chil;
	}
	
class individus 
	{
	public $ref;
	public $nom;
	public $prenom;
	public $surname;
	public $sexe;
	public $note;
	}
	
class evenement 
	{
	public $indiv;
	public $nom;
	public $date;
	public $type;
	public $place;
	public $source;
	public $note;
	}
	
class lieu 
	{
	public $ville;
	public $cp;
	public $dep;
	public $region;
	public $pays;
	public $continent;
	}
	
class source 
	{
	public $ref;
	public $titre;
	public $nom;
	public $origine;
	public $media;
	}
	
class gedfichiers 
	{
	public $source;
	public $nom;
	public $lieu;
	}
	
class medias 
	{
	public $ref;
	public $format;
	public $fichier;
	public $source; /* numéro de la source dont le média dépend */
	}

?>