<!-- MODULE QUI AFFICHE UN BLOGROLL -->
<!-- (non actif pour le moment) -->

<h4><?php echo ASIDE_BLOG_6 ?></h4>

<?php

$req_blogroll = "SELECT * FROM blogroll ORDER BY nom DESC";
$resultat = $pdo->prepare ( $req_blogroll );
$resultat->execute();

echo "<ul>";

while ( $data_blogroll = $resultat->fetch () ) {
	echo "<li><a href='".$data_blogroll['url']."' title='".$data_blogroll['description']."' >".html_entity_decode ( $data_blogroll['nom'] ). "</a></li>";
}

echo "</ul>";

?>   