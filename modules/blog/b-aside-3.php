<h4><?php echo ASIDE_BLOG_3 ?></h4>

<?php

$req_intro = "SELECT * FROM articles ORDER BY date DESC limit 0,5";
$resultat = $pdo->prepare ( $req_intro );
$resultat->execute ();

echo "<ul>";

while ( $data = $resultat->fetch () ) {
	echo "<li><a href='" . URL_SITE . "index.php?page=article&id=" . $data ['ref'] . "'>" . html_entity_decode ( $data ['titre'] ) . "</a></li>";
}

echo "</ul>";

?>    