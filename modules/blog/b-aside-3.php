<!-- MODULE QUI AFFICHE LE5 5 DERNIERS ARTICLES -->

<div class="card mb-3">

	<div class="card-header"><?php echo ASIDE_BLOG_3 ?></div>

	<?php
	
	$sqlDerniersArticles = "SELECT * FROM articles ORDER BY date DESC limit 0,5";
	$reqDerniersArticles = $pdo2->prepare($sqlDerniersArticles);
	$reqDerniersArticles->execute();
	
	echo "<ul class='list-group'>";
	
	while ($row = $reqDerniersArticles->fetch(PDO::FETCH_ASSOC)) 
		{
		echo "<li class='list-group-item'><a href='index.php?page=article&id=".$row['ref']."'>".html_entity_decode($row['titre'])."</a></li>";
		}
	
	echo "</ul>";
	
	?>    

</div>