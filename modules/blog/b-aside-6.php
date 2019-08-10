<!-- MODULE QUI AFFICHE UN BLOGROLL -->
<!-- (non actif pour le moment) -->

<h4><?php echo ASIDE_BLOG_6 ?></h4>

<?php

$sqlBlogroll = "SELECT * FROM blogroll ORDER BY nom DESC";
$reqBlogroll = $pdo2->prepare($sqlBlogroll);
$reqBlogroll->execute();

echo "<ul>";

while ( $row = $reqBlogroll->fetch(PDO::FETCH_ASSOC)) 
	{
	echo "<li><a href='".$row['url']."' title='".$row['description']."' >".html_entity_decode( $row['nom'] )."</a></li>";
	}

echo "</ul>";

?>  