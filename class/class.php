<?php
class pages {
	public $nom;
	public $titre;
	public $description;
	public $rubrique;
	
	public function AfficherContenu($pdo2) {
		include ('content/' . $this->nom . '.php');
	}
	
	public function AfficherAside($pdo2) {
		$rubrique = array (
				"pdf",
				"blog",
				"article",
				"categories",
				"contact",
				"error",
				"search",
				"see_comments"
		);

		if (in_array ( $this->nom, $rubrique )) {
			include ('include/sidebar-blog.inc');
		} else {
			include ('include/sidebar.inc');
		}
	}
	
	public function AfficherFooter() {
		include ('include/footer.inc');
	}
	
	public function Titre() {
		return SITE_TITLE . " - " . $this->titre;
	}
}

/* classes de partie généalogie */

class evenements {
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

class commentaires {
	public $article;
	public $nom_auteur;
	public $email_auteur;
	public $url_auteur;
	public $contenu;
	public $today;
}
class articles {
	public $ref;
	public $auteur;
	public $titre;
	public $date;
	public $categorie;
	public $contenu;
}

/* classes pour la lecture du gedcom */

class uploaders {
	public $name;
	public $mail;
	public $adresse;
	public $www;
}
class famille {
	public $ref;
	public $husb;
	public $wife;
	public $chil;
}
class individus {
	public $ref;
	public $nom;
	public $prenom;
	public $surname;
	public $sexe;
	public $note;
}
class evenement {
	public $indiv;
	public $nom;
	public $date;
	public $type;
	public $place;
	public $source;
	public $note;
}
class lieu {
	public $ville;
	public $cp;
	public $dep;
	public $region;
	public $pays;
	public $continent;
}
class source {
	public $ref;
	public $titre;
	public $nom;
	public $origine;
	public $media;
}
class gedfichiers {
	public $source;
	public $nom;
	public $lieu;
}
class medias {
	public $ref;
	public $format;
	public $fichier;
	public $source; /* numéro de la source dont le média dépend */
}

?>