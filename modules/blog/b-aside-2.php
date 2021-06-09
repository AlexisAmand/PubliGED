<!-- MODULE QUI AFFICHE LA LISTE DES CATEGORIES -->

<?php

$sqlCategorie = "SELECT * FROM articles GROUP BY id_cat";
$reqCategorie = $pdo2->prepare($sqlCategorie);
$reqCategorie->execute();

?>

<div class="card mb-3">

	<div class="card-header"><?php echo ASIDE_BLOG_2 ?></div>

	<?php
	
	echo "<ul class='list-group'>";
	
	while ( $row = $reqCategorie->fetch(PDO::FETCH_ASSOC)) 
		{
		$sqlNombreCategories = "SELECT id_cat, count(*) AS nbcat FROM articles WHERE id_cat=:id_cat and publication='1' GROUP BY id_cat";
		$reqNombreCategories = $pdo2->prepare($sqlNombreCategories);
		$reqNombreCategories->bindparam(':id_cat',$row['id_cat']);
		$reqNombreCategories->execute();

		while ($rowC = $reqNombreCategories->fetch(PDO::FETCH_ASSOC)) 
			{
			if($rowC['nbcat'] != '0')
				{
				echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";	
				echo "<a href='index.php?page=categories&id=".$row['id_cat']."'>".get_category_name($pdo2,$row['id_cat'])."</a>";
				echo "<span class='badge badge-primary badge-pill'>".$rowC['nbcat']."</span>";
				echo "</li>";
				}
			}
		}
	
	echo "</ul>";
	
	?>

</div>