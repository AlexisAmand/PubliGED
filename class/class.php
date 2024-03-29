<?php

//require 'content/fonctions.php';

/* ---------------------------------------- */
/* Cette class permet des stats sur la base */
/* ---------------------------------------- */

class BasesDeDonnees
	{

	/*	Cette méthode retourne la liste des titres des articles */
		
	public function ListeTitreArticle($pdo2)
		{
		$sql = "SELECT * FROM articles ORDER BY date DESC";
		$req = $pdo2->prepare($sql);
		$req->execute();
		$row = $req->fetchAll();
		return $row;	    
		}
				
	/* Cette méthode retourne le "top" pour la page de stats */

	public function Top($pdo2)
		{
		$req_top = "SELECT * FROM configuration WHERE nom = 'top'";
		$res_top = $pdo2->prepare($req_top);
		$res_top->execute();	
		$row = $res_top->fetch(PDO::FETCH_ASSOC);
		return $row['valeur'];
		}

	/* Cette méthode retourne le nombre d'individus présents dans la base de données */

	public function NombreIndividu($pdo2)
		{
		$requete = "SELECT * FROM individus";
		$req = $pdo2->prepare ( $requete );
		$req->execute ();
		return $req->rowCount ();	
		}	

	/* Cette méthode retourne le nombre de patronymes présents dans la base de données */

	public function NombrePatro($pdo2)
		{
		$req_nb_patro = "SELECT distinct surname FROM individus";
		$req = $pdo2->prepare ( $req_nb_patro );
		$req->execute ();
		return $req->rowCount ();
		}	

	/* Cette méthode retourne le nombre total d'hommes dans la base de données */

	public function NombreHommes($pdo2)
		{
		$req_nb_patro = "SELECT * FROM individus WHERE sex LIKE '%M%'";
		$req = $pdo2->prepare ( $req_nb_patro );
		$req->execute ();
		return $req->rowCount ();
		}

	/* Cette méthode retourne le nombre total de femmmes dans la base de données */

	public function NombreFemmes($pdo2)
		{
		$req_nb_patro = "SELECT * FROM individus WHERE sex LIKE '%F%'";
		$req = $pdo2->prepare ( $req_nb_patro );
		$req->execute ();
		return $req->rowCount ();
		}

	/* Cette méthode retourne le nombre total d'évenements dans la base de données */

	public function NombreEvenements($pdo2)
		{
		$req_nb_eve = "SELECT * FROM evenements";
		$req = $pdo2->prepare ( $req_nb_eve );
		$req->execute ();
		return $req->rowCount ();
		}

	/* Cette méthode retourne le nombre total d'évenements dans la base de données */

	public function NombreSources($pdo2)
		{
		$req_nb_src = "SELECT * FROM sources";
		$req = $pdo2->prepare ( $req_nb_src );
		$req->execute ();
		return $req->rowCount ();
		}	

	/* Cette méthode retourne le nombre total d'enfants dans la base de données */

	public function NombreEnfants($pdo2)
		{
		$req_nb_enfant = "SELECT distinct enfant FROM familles";
		$req = $pdo2->prepare ( $req_nb_enfant );
		$req->execute ();
		return $req->rowCount ();
		}
		
	/* Cette méthode retourne le nombre total de couples dans la base de données */

	public function NombreCouples($pdo2)
		{
		$req_nb_couple = "SELECT distinct pere, mere FROM familles";
		$req = $pdo2->prepare ( $req_nb_couple );
		$req->execute ();
		return $req->rowCount ();	
		}

	/* Cette méthode retourne le nombre total de lieux dans la base de données */

	public function NombreLieux($pdo2)
		{
		$req_nb_lieu = "SELECT * FROM lieux GROUP BY ville";
		$req = $pdo2->prepare ( $req_nb_lieu );
		$req->execute ();
		return $req->rowCount ();
		}

	/* Cette méthode retourne le nombre de Famille dans la base de données */

	public function NombreFamilles($pdo2)
		{
		$req_famille = "SELECT * FROM familles group by pere,mere";
		$req = $pdo2->prepare ( $req_famille );
		$req->execute ();
		return $req->rowCount ();
		}
	}

/* Cette page permet l'affichage des éléments sur la page */	
	
class Pages 
	{
	public $nom;
	public $titre;
	public $description;
	public $rubrique;
	
	public function __construct($pdo2)
		{
		
		/* Si le param page est pas là redirection sur index */
			
		if (!isset($_GET ['page']))
			{
			header('Location: index.php?page=blog');
			} 	
		else
			{
			$this->nom = $_GET['page'];	
			}
			
		$sql = "select * from pages where nom = :nom";
		$resultat = $pdo2->prepare ( $sql );
		$resultat->bindParam ( ':nom', $_GET ['page'] );
		$resultat->execute (); 	
		$nb = $resultat->rowCount (); 	
		
		if ($nb != 0)
			{
			/* récup les infos de la page 
			 * avec un seul fetch comme dans afficherMeta()
			 */	
			
			$row = $resultat->fetch ();
			
			$this->nom = $row['nom'];
			$this->titre = $row['titre'];
			
			/* rubrique pour le fil d'ariane, entre les deux / */
			
			switch($this->nom)
				{
				case "stats" :
				case "sources" :
				case "images" :
				case "anniversaires" :
					$this->rubrique = ASIDE_2;
					break;
				case "lieux" :
				case "cartographie" :
				case "patrolieux" :
					$this->rubrique = ASIDE_3;
					break;
				case "patro" :
				case "eclair" :
				case "sosa" :
				case "fiche" :
				case "lieuxpatro" :
				case "liste_patro" :
					$this->rubrique = ASIDE_4;
					break;
				case "eve" :
					$this->rubrique = ASIDE_5;
					break;
				case "categories" :
					$this->rubrique = ASIDE_BLOG_2;
					$this->titre = get_category_name($pdo2, $_GET['id']);
					break;
				case "search" :
					$this->rubrique = MENU_RESULT;
					break;
				case "blog" :
					$this->rubrique = ASIDE_BLOG_1;
					break;
				case "credits" :
					$this->rubrique = "Divers";
					
					/* TODO : Ajouter dans le fichier fr.php */
					
					break;
				case "article" :
					$this->rubrique = ARTICLES;
					break;
					/*
					 *  default:
					 *  $page->rubrique = PILLMENU_2;
					 */
				} 
				
			}
		else 
			{
			/* le param n'a pas été trouvé dans la BD... donc redirection */
			header('Location: index.php?page=blog');
			}
		
		}

	/* cette méthode récupére le title et la meta description pour le HEAD */
	
	public function AfficherMeta($pdo2)
		{
		switch($_GET['page'])
			{

			case 'article':
				
				/* récupération des métas */
				$sqlMeta = $pdo2->prepare("select * from articles where ref = :ref");
				$sqlMeta->bindParam(':ref',$_GET['id']);
				$sqlMeta->execute();
				$data = $sqlMeta->fetch();
				
				$this->titre = $data['titre'];

				/* affichage de la balise <title> */
				echo "<title>".$this->titre." | ".recupNomSite($pdo2)."</title>\n";

				/* affichage de la <meta> description */
				echo "<meta name='description' content='".$data['meta_des']."'>\n";
			
			break;

			case 'categories':
			
				/* récupération des métas */
				$sqlMeta = $pdo2->prepare("select * from categories where ref = :ref");
				$sqlMeta->bindParam(':ref',$_GET['id']);
				$sqlMeta->execute();
				$data = $sqlMeta->fetch();

				/* affichage de la balise <title> */
				echo "<title>".$data['nom']." | ".recupNomSite($pdo2)."</title>\n";

				/* affichage de la <meta> description */
				echo "<meta name='description' content='".$data['description']."'>\n";
		
			break;

			/* sinon, on affiche la méta par défaut qui est prédéfini par le CMS */

			default:

				$sqlMeta = $pdo2->prepare("select * from pages where nom = :page");
				$sqlMeta->bindParam ( ':page', $_GET['page'] ); 	
				$sqlMeta->execute();
				$data = $sqlMeta->fetch();
				
				/* affichage de la balise <title> */
				echo "<title>".$data['titre']." | ".recupNomSite($pdo2)."</title>\n";
				
				/* affichage de la meta description */
				echo "<meta name='description' content='".$data['description']."'>\n";

			}

		}

	/* cette méthode récupére le template perso */

	public function AfficherCSS($pdo2)
		{
		$sqlHeader = $pdo2->prepare("SELECT * FROM configuration WHERE nom = 'template'");
		$sqlHeader->execute();
		$data = $sqlHeader->fetch();

		/* Affichage du template perso */
		/* Les fichiers sont récupérés via npm dans node_modules et copiés/collés dans templates */
		echo '<link href="templates/'.$data['valeur'].'/bootstrap.min.css" rel="stylesheet">';

		/* récupération des feuilles de styles obligatoires */
		echo '<link href="templates/system/css/commons.css" rel="stylesheet">';

		/* datatables.net */
		echo '<link href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css" rel="stylesheet">';

		/* TODO : récupération et affichage du favicon perso */

		$req = $pdo2->prepare("SELECT * FROM configuration WHERE nom='favicon'");
		$req->execute();
		$rowFavicon = $req->fetch();
		$NomDuFavicon = $rowFavicon['valeur'];
		echo '<link rel="icon" href="/templates/'.$data['valeur'].'/images/'.$NomDuFavicon.'">'; 

		/* Si la page est la carto, on a besoin de Leaflet */

		if ($_GET['page'] == "cartographie")
			{
			/* OpenStreetMap et Leaflet via npm */
			echo '<link href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" rel="stylesheet">';
			echo '<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>';
			/* Leaflet basemap */
			echo '<link href="js/leaflet-basemaps/L.Control.Basemaps.css" rel="stylesheet">';
			echo '<script src="js/leaflet-basemaps/L.Control.Basemaps.js"></script>';
			}

		/* Bootstrap icons */
		echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">';

		}

	/* Cette méthode affiche le pied de page du site */

	public function AfficherPillmenu($pdo2) 
		{
		echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary">'
			.'<div class="container-fluid">'
			.'<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">'
			.'<span class="navbar-toggler-icon"></span>'
			.'</button>'
     		.'<div class="collapse navbar-collapse" id="navbarNav">';
			 
		$sql_pillmenu = "SELECT * FROM pillmenu WHERE afficher = '1'";
		$req_pillmenu = $pdo2->prepare ($sql_pillmenu);
		$req_pillmenu->execute();
	
		$count = $req_pillmenu->rowCount();
	
		if ($count != 0)
			{
			echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
	
			while ( $row_pillmenu = $req_pillmenu->fetch(PDO::FETCH_ASSOC)) 
				{
				echo '<li class="nav-item">';
				echo '<a class="nav-link" href="index.php?page='.$row_pillmenu['lien'].'">'.$row_pillmenu['nom'].'</a>';
				echo '</li>';
				}
	
			echo "</ul>";
			}
		else
			{
			echo 'plop';
			}

		echo '<form class="d-flex" method="GET" action="index.php">'
			.'<input class="form-control me-2" type="search" placeholder="Recherche" name="recherche" value="recherche">'
			.'<input type="hidden" name="page" value="search">'
			.'<input type="hidden" name="type" value="1">'
			.'<button class="btn btn-primary" type="submit" value="ok">'
			.'<i class="bi bi-search"></i>'
			.'</button>'
			.'</form>'
			.'</div>'
			.'</div>'
			.'</nav>';
		}

	public function AfficherHeader($pdo2) 
		{
		/* récup du slogan du site pour le header */
		$sql = "select * from configuration where nom='description'";
		$req = $pdo2->prepare($sql);
		$req->execute();
		$row = $req->fetch();
		$DescriptionSite = $row['valeur'];
		
		/* Affichage de l'en-tête */
			
		echo '<div class="hgroup text-center" style="padding: 100px 0;">';
		echo '<h1>';
		echo '<a href="index.php?page=blog">'.recupNomSite($pdo2).'</a>';
		echo '</h1>';
		echo '<p>'.$DescriptionSite.'</p>';
		echo '</div>';
		}
	
	/* Cette méthode affiche le aside du site*/

	public function AfficherAside($pdo2) 
		{

		/* on recup la position du aside dans la BD */

		$sql = "SELECT valeur FROM configuration WHERE nom = 'positionmenu'";
		$req = $pdo2->prepare($sql);
		$req->execute();
		$PositionAside = $req->fetch(PDO::FETCH_ASSOC);

		/* Par défaut, on supppose que le aside est affiché */	
		
		$GLOBALS['aside'] = '1';
			
		$sqlPages = "select * from pages";
		$reqPages = $pdo2->prepare($sqlPages);
		$reqPages->execute();
		
		switch($PositionAside['valeur'])
			{
			case 'droite':
				$balise = ($GLOBALS['aside']==1)?'<aside class="col-md-3 order-2">':'<aside class="col-md-12">';	
				break;
			case 'gauche':
				$balise = ($GLOBALS['aside']==1)?'<aside class="col-md-3 order-1">':'<aside class="col-md-12">';	
				break;
			}
				
		echo $balise;
					
		while($row = $reqPages->fetch())
			{
				
			if ($row['nom'] == $this->nom)	
				{
				switch ($row['section'])
					{
					
					/* $aside est une sorte de booléen. Si = 1, il y a un menu à mettre dans l'aside, si = 0, il n'y a pas de menu à afficher, comme dans contact par exemple */	
						
					case 'blog':
						include ('include/sidebar-blog.inc.php');
						$GLOBALS['aside'] = 1;
						break;
					case 'genealogie':
						include ('include/sidebar-genealogie.inc.php');
						$GLOBALS['aside'] = 1;
						break;
					case 'search':
						include ('include/sidebar-search.inc.php');
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

	/* Cette méthode affiche le contenu du site*/

	public function AfficherContenu($pdo2) 
		{		

		/* on recup la position du aside dans la BD */

		$sql = "SELECT valeur FROM configuration WHERE nom = 'positionmenu'";
		$req = $pdo2->prepare($sql);
		$req->execute();
		$PositionAside = $req->fetch(PDO::FETCH_ASSOC);
		
		switch($PositionAside['valeur'])
			{
			case 'droite':
				$balise = ($GLOBALS['aside']==1)?'<article class="col-md-9 order-1">':'<article class="col-md-12">';	
				break;
			case 'gauche':
				$balise = ($GLOBALS['aside']==1)?'<article class="col-md-9 order-2">':'<article class="col-md-12">';
				break;
			}

		echo $balise;			
		include ('content/' . $this->nom . '.php');
		echo '</article>';
		}

	/* Cette méthode affiche le pied de page du site */

	public function AfficherFooter() 
		{
		include ('include/footer.inc.php');
		}
		
	/* Cette méthode appelle toutes les libs dont PubliGED a besoin */		
		
	public function AfficherLib()
		{		
		// Jquery 
		echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';

		// Bootstrap 5
		echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>';

		// librairie datatables pour tableaux bootstrap 5
		echo '<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>';
		
		// Ce script contient l'initialisation du plugin datatables de jquery
		echo '<script src="js/datatables.js"></script>';
							
		// TinyMCE 
		echo '<script src="/js/tinymce/tinymce.min.js"></script>';
							
		// Divers Javascript
		echo '<script src="js/scripts.js"></script>';
		}

	/* Todo : Je ne suis pas sûr que cette méthode serve encore */
	
	public function Titre() 
		{
		return SITE_TITLE . " - " . $this->titre;
		}
}

/* classes de partie généalogie */

class Evenements 
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

class Commentaires 
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
	
	public function AfficheCommentaire($id,$pdo3, $commSent)
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
			if (!empty($commSent->nom_auteur)) {$value = $commSent->nom_auteur;} else {$value ="";}
			echo '<label for="pseudo">Pseudo</label> <input id="pseudo" type="text" name="pseudo" value="'.$value.'" class="form-control" />';
			echo '</div>';
			
			echo '<div class="form-group">';
			if (!empty($commSent->url_auteur)) {$value = $commSent->url_auteur;} else {$value ="";}
			echo '<label for="site">Site (ou blog)</label> <input id="site" type="text" name="site" value="'.$value.'" class="form-control" />';
			echo '</div>';
			
			echo '<div class="form-group">';
			if (!empty($commSent->email_auteur)) {$value = $commSent->email_auteur;} else {$value ="";}
			echo '<label for="email">Email</label> <input id="email" type="text" name="email" value="'.$value.'" class="form-control" />';
			echo '</div>';
			
			echo '<div class="form-group">';
			echo '<label for="email">Commentaire</label>';
			if (!empty($commSent->contenu)) {$value = $commSent->contenu;} else {$value ="";}
			echo '<textarea id="commentaire" name="message" class="form-control" value="'.$value.'" ></textarea>';
			echo '</div>';
			
			echo '<input type="submit" class="btn btn-default">';
			echo '<button type="submit" class="btn btn-primary">Primary</button>';
			
			echo '</form>';
			
			echo '</div>';
			
		}
	}
	
class Articles 
	{
	public $ref;
	public $auteur;
	public $titre;
	public $date;
	public $categorie;
	public $contenu;
	public $publication;
	public $description;
	public $keywords;
	
	/* Cette méthode affiche un article */	

	public function Afficher($pdo3)
		{

		/* Titre de l'article */
			
		echo "<div class='row mt-5'>";			
			echo "<div class='col-md-12'>";
			echo "<h3><a href='index.php?page=article&id=".$this->ref."'>".html_entity_decode ($this->titre)."</a></h3>"; 
			echo "</div>";		
		echo "</div>";
		
		echo "<div class='row'>";
		
		/* Auteur et date de l'article */
		
		echo "<div class='col-md-10'>";		
			echo "<p>".AUTHOR.$this->auteur;
			echo DATE.$this->date;
			echo RUBRIC;
			echo "<a href='index.php?page=categories&id=".$this->categorie."'>".get_category_name($pdo3, $this->categorie)."</a>";		
		echo "</div>";
		
		/* affichage des boutons d'export : pdf, mail, print */
		
		echo "<div class='col-md-2'>";
			echo "<p>";
			echo "<a href='pdf.php?page=categories&id=".$this->ref."'><i class='bi bi-file-earmark-pdf'></i></a>&nbsp;&nbsp;";
			echo "<a href='print.php?id=".$this->ref."'><i class='bi bi-printer'></i></a>&nbsp;&nbsp;";
			echo "<a href='#'><i class='bi bi-envelope'></i></a>&nbsp;&nbsp;";
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

/* classe pour l'utilisateur */	

class Utilisateurs
	{
	public $id;	
	public $login;
	public $motdepasse;
	public $email;
	public $rang;

	public function information($pdo3, $sessionLogin)
		{
		$this->login = $sessionLogin;
		
		$sqlUsers = "SELECT * FROM membres WHERE login='$this->login'";
		$reqUsers = $pdo3->prepare($sqlUsers);
		$reqUsers->execute();

		while ($data = $reqUsers->fetch(PDO::FETCH_ASSOC))
			{
			$this->id = $data['id'];
			$this->motdepasse = $data['password'];
			$this->email = $data['mail'];
			$this->rang = $data['rang'];
			}
		}
	}

/* classes pour la lecture du gedcom */
	
class Uploaders 
	{
	public $name;
	public $mail;
	public $adresse;
	public $www;
	}
	
class Famille 
	{
	public $ref;
	public $husb;
	public $wife;
	public $chil;
	}
	
class Individus
	{
	public $ref; /* */
	public $nom; /* */
	public $prenom; /* */
	public $surname; /* */
	public $sexe; /* */
	public $note;

	public function __construct() { }
	}
	
class Evenement 
	{
	public $indiv;
	public $nom;
	public $date;
	public $type;
	public $place;
	public $source;
	public $note;

	public function __construct() { }	
	}
	
class Lieu 
	{
	public $ville;
	public $cp;
	public $dep;
	public $region;
	public $pays;
	public $continent;
	}
	
class Sources 
	{
	public $ref;
	public $titre;
	public $nom;
	public $origine;
	public $media;

	public function __construct() { }
	}
	
class Medias 
	{
	public $ref;
	public $format;
	public $fichier;
	public $source; /* numéro de la source dont le média dépend */
	}

/* Gedcom envoyé */
	
class gedfichiers
	{
	public $version;
	public $char;
	}

/* Logiciel qui a envoyé de Gedcom */	

class Logiciels 
	{
	public $version;
	public $nom;
	public $nomcomplet;
	}

?>