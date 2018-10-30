	<?php

	/* ---------------------------------- */
	/* LISTE DES ARTICLES D'UNE CATEGORIE */
	/* ---------------------------------- */
	$req = $pdo2->query ( "SELECT * FROM articles WHERE id_cat = '" . $_GET ['id'] . "' ORDER BY date DESC" );

	while ( $row = $req->fetch () ) {

		$req_comms = "select * from commentaires where id_article='{$row['ref']}'";
		$res_comms = $pdo2->prepare ( $req_comms );
		$res_comms->execute ();

		?>

<div class="row">
	<div class="col-md-12">
				<?php echo "<h3><a href='index.php?page=see_comments&id=".$row['ref']."'>" . html_entity_decode ( $row ['titre'] ) . "</a></h3>"; ?>
			</div>
</div>

<div class="row">
	<div class="col-md-8">
		
		<?php

		/* Auteur de l'article */

		echo "<p>" . AUTHOR;

		$res_membres = $pdo2->prepare ( "select * from membres where id=:id" );
		$res_membres->bindValue ( "id", $row ['auteur'], PDO::PARAM_INT );
		$res_membres->execute ();

		while ( $data_membres = $res_membres->fetch () ) {
			echo $data_membres ['login'];
		}

		/* Date de l'article */
		/* TODO : mettre le mois en lettres */

		echo DATE;

		if (preg_match ( "/^[0-9]{4}(\/|-|.)(0[1-9]|1[0-2])(\/|-|.)(0[1-9]|[1-2][0-9]|3[0-1])$/", $row ['date'] )) {
			echo substr ( $row ['date'], 8, 2 ) . substr ( $row ['date'], 7, 1 ) . substr ( $row ['date'], 5, 2 ) . substr ( $row ['date'], 4, 1 ) . substr ( $row ['date'], 0, 4 );
		}

		/* Catégorie de l'article */

		echo RUBRIC;

		echo "<a href='index.php?page=categories&id=" . $row ['id_cat'] . "'>" . get_category_name ( $pdo2, $row ['id_cat'] ) . "</a>";
		echo "</p>";

		?>

			</div>
	<div class="col-md-2 offset-md-2">
	
		<?php

		/* affichage des boutons d'export : pdf, mail, print */

		echo "<p>";

		echo "<a href='pdf.php?id=" . $row ['ref'] . "'><i class='far fa-file-pdf fa-2x'></i></a>&nbsp;&nbsp;";
		echo "<a href='print.php?id=" . $row ['ref'] . "'><i class='fas fa-print fa-2x'></i></a>&nbsp;&nbsp;";
		echo "<a href='send.php?id=" . $row ['ref'] . "'><i class='fas fa-envelope-square fa-2x'></i></a>&nbsp;&nbsp;";

		echo "</p>";

		?>

			</div>
</div>

<div class="row">
	<div class="col-md-12">
		
		<?php

		/* Contenu de l'article */

		echo $row ['article'];

		echo "<div id='commentaires'><a href='index.php?page=see_comments&id=" . $row ['ref'] . "'>[" . SEECOMS . "] (" . $res_comms->rowCount () . ")</a></div>";
	}

	?>
	
		</div>
</div>