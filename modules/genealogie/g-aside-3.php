<!-- GENEALOGIE - MODULE DES LIEUX -->

<div class="card bg-light border-secondary mb-3">
	<div class="card-header"><?php echo ASIDE_3 ?></div>
	<ul class="list-group">
	
	<?php
	
	$sqlModuleLieux = "select * from pages where module = 'g-aside-3'";
	$reqModuleLieux = $pdo2->prepare($sqlModuleLieux);
	$reqModuleLieux->execute();

	/* On vérifie si la page demandée existe. Si elle n'existe pas, on redirige vers le blog */

	while ($row = $reqModuleLieux->fetch(PDO::FETCH_ASSOC)) 
		{
		echo '<li class="list-group-item"><a href="index.php?page='.$row['nom'].'">'.$row['titre'].'</a></li>';
		}
		
	?>
	
	</ul>
</div>
