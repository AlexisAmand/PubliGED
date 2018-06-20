<h4><?php echo ASIDE_BLOG_2 ?></h4>

<?php

$req_intro = "SELECT * FROM articles GROUP BY id_cat";
$resultat = $pdo->prepare ( $req_intro );
$resultat->execute ();

echo "<ul>";

while ( $data = $resultat->fetch () ) {
	echo "<li>";
	get_category_name ( $pdo, $data ['id_cat'] );
	echo "</li>";
}

echo "</ul>";

?>