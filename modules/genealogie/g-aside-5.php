<!-- GENEALOGIE - MODULE DES EVENEMENTS -->

<div class="card bg-light border-secondary mb-3">
	<div class="card-header"><?php echo ASIDE_5 ?></div>
	<ul class="list-group">
	
	<?php
	
	$sqlEvenements = "select * from pages where module = 'g-aside-5'";
	$reqEvenements = $pdo2->prepare($sqlEvenements);
	$reqEvenements->execute();

	/* On vérifie si la page demandée existe. Si elle n'existe pas, on redirige vers le blog */

	while ($row = $reqEvenements->fetch(PDO::FETCH_ASSOC)) 
		{
		echo '<li class="list-group-item"><a href="index.php?page='.$row['nom'].'">'.$row['titre'].'</a></li>';
		}
		
	?>
			
	</ul>
</div>