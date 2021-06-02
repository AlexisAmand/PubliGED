<?php
require ('fonctions.php');
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">
    
	<?php include('include/head.php');?>

	<title><?php echo SITE_TITLE." - ".TITRE_RUB_ADMIN_0; ?></title>
<meta name="description" content=" ">

<script src="../node_modules/tinymce/tinymce.min.js"></script>

<script>
    tinymce.init({
        /* ajouter un tableau dans tinymce */
        /*plugins: "table", */
        tools: "inserttable",
        /* ajouter une image
        plugins: "image", */
        /* par défaut */
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
        ],
        selector: 'textarea',
        language: "fr_FR",
        style_formats: [
        { title: 'Bold text', inline: 'b' },
        { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
        { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
        { title: 'Example 1', inline: 'span', classes: 'example1' },
        { title: 'Example 2', inline: 'span', classes: 'example2' },
        { title: 'Table styles' },
        { title: 'Table row 1', selector: 'tr', classes: 'tablerow1' }
        ]
    });
</script>

</head>
<body>

<?php include('include/content.php');?>

<div style="witdh: 100%; height: 20px; border: 0px solid black;">
		<span class="breadcrumbs pathway"> <a href="index.php"><?php echo ASIDE_ADMIN_0; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="index.php"><?php echo ASIDE_ADMIN_1; ?></a>
			<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php"><?php echo TITRE_RUB_ADMIN_0; ?></a>
		</span>
	</div>

	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc');	?></div>

	<div id="contenu">

		<h1><?php echo TITRE_RUB_ADMIN_0; ?></h1>
                   
	<?php

	if (! empty ( $_POST ['texte'] ) and ! empty ( $_POST ['titre'] ) and ! empty ( $_POST ['categorie'] )) {
		// echo $_POST ['texte'] . "<br />";
		// echo $_POST ['titre'] . "<br />";
		// echo $_POST ['categorie'] . "<br />";
		$datearticle = date ( "Y-m-d", time () );

		/*
		 * TODO: Pour l'instant, l'auteur de l'article est 1
		 * quand la connexion à l'admin sera ok
		 * il faudra récupérer le n° de l'auteur
		 */

		$auteur = "1";

		$sqlAjoutArticle = "INSERT INTO articles(titre, article, auteur, date, id_cat) values (:p1, :p2, :p3, :p4, :p5)";

		$AjoutArticle = $pdo->prepare ( $sqlAjoutArticle );

		$AjoutArticle->bindparam ( ':p1', $_POST ['titre'] );
		$AjoutArticle->bindparam ( ':p2', $_POST ['texte'] );
		$AjoutArticle->bindparam ( ':p3', $auteur );
		$AjoutArticle->bindparam ( ':p4', $datearticle );
		$AjoutArticle->bindparam ( ':p5', $_POST ['categorie'] );

		$AjoutArticle->execute ();
	} 
	else 
	{

		echo '<p>Ce formulaire utilise des ressources en ligne</p>';

		echo '<form method="POST" action="ajout-article.php">';
		echo "<p>Titre de l'article <input type='text' name='titre'></p>";

		$cat = $pdo->query ( "select * from categories" );

		echo "<select name='categorie'>";

		while ( $rowcat = $cat->fetch () ) {
			echo "<option value='" . $rowcat ['ref'] . "'>" . $rowcat ['nom'] . "</option>";
		}

		echo "</select>";

		echo '<textarea name="texte"></textarea>';
		echo '<input type="submit" value="Enregistrer">';
		echo '</form>';
	}

	?>    
																
</div>																
                
<?php include('include/endheader.php');?>