<!-- MODULE QUI AFFICHE LE5 5 DERNIERS ARTICLES -->


<div class="card bg-light border-secondary mb-3">

	<div class="card-header"><?php echo ASIDE_BLOG_3 ?></div>

<?php

/* TODO : choix du nombre de "derniers articles" dans le module du blog */

$req_intro = "SELECT * FROM articles ORDER BY date DESC limit 0,5";
$resultat = $pdo2->prepare ( $req_intro );
$resultat->execute ();

echo "<ul class='list-group'>";

while ( $data = $resultat->fetch () ) {
	echo "<li class='list-group-item'><a href='index.php?page=see_comments&id=" . $data ['ref'] . "'>" . html_entity_decode ( $data ['titre'] ) . "</a></li>";
}

echo "</ul>";

?>    

</div>

<br />