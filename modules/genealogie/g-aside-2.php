<!-- GENEALOGIE - MODULE DES STATS -->

<div class="card mb-3">

	<?php 
	
	/* TODO : ici, faire une boucle qui répupére toutes les pages de table page ayant g-aside-2 dans le champ module */
	
	?>

	<div class="card-header"><?php echo ASIDE_2 ?></div>
	<ul class="list-group">
	
	<?php
	
	$sqlModuleStat = "select * from pages where module = 'g-aside-2'";
	$reqModuleStat = $pdo2->prepare($sqlModuleStat);
	$reqModuleStat->execute();

	/* On vérifie si la page demandée existe. Si elle n'existe pas, on redirige vers le blog */

	while ($row = $reqModuleStat->fetch(PDO::FETCH_ASSOC))
		{
		echo '<li class="list-group-item"><a href="index.php?page='.$row['nom'].'">'.$row['titre'].'</a></li>';
		}
		
	?>	
		
	</ul>
</div>