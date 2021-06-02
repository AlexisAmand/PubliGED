<?php
require ('../content/fonctions.php');
include ('../config.php');
/* include ('../include/langue.php'); */
include ('../langues/fr.php');
?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">    
	
	<?php include('include/head.php');?>
	
	<title><?php echo SITE_TITLE." - ".TITRE_RUB_ADMIN_1; ?></title>
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
			<img src="../img/arrow.png" alt="" /> <a href="biblio_ono.php.php"><?php echo TITRE_RUB_ADMIN_1; ?></a>
		</span>
	</div>

	<!-- fin du fil d'ariane -->

	<div id="nav"><?php include ('include/sidebar.inc');	?></div>

	<div id="contenu">

		<h1><?php echo TITRE_RUB_ADMIN_1; ?></h1>

<?php

$nb_a = "SELECT * FROM articles";
$res_nb_a = $pdo->prepare ( $nb_a );
$res_nb_a->execute ();

?>        
     
<table id='EveT'>
			<thead>
				<tr>
					<td>#</td>
					<td><?php echo ADM_ARTICLE_TITLE; ?></td>
					<td><?php echo ADM_ARTICLE_AUTHOR; ?></td>
					<td>Username</td>
					<td style="width: 3.5em;"></td>
				</tr>
			</thead>
			<tbody>   
        
	<?php

	while ( $data_a = $res_nb_a->fetch () ) {
		echo "<tr>";
		echo "<td>" . $data_a ['ref'] . "</td>";
		echo "<td>" . $data_a ['titre'] . "</td>";
		echo "<td>" . $data_a ['auteur'] . "</td>";
		echo "<td> todo </td>";
		echo '<td> <a href="editer-article.php">' . ADM_ARTICLE_EDIT . '</a></td>';
		echo "</tr>";
	}

	?>
                  
    </tbody>
		</table>

	</div>

<?php include('include/endheader.php');?>
