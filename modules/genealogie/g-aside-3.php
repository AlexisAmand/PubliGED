<!-- GENEALOGIE - MODULE DES LIEUX -->

<div class="card mb-3">
	<div class="card-header"><?php echo ASIDE_3 ?></div>
	<ul class="list-group list-group-flush">
	
	<?php
	
	$sqlModuleLieux = "select * from pages where module = 'g-aside-3'";
	$reqModuleLieux = $pdo2->prepare($sqlModuleLieux);
	$reqModuleLieux->execute();

	while ($row = $reqModuleLieux->fetch(PDO::FETCH_ASSOC)) 
		{
		echo '<li class="list-group-item"><a href="index.php?page='.$row['nom'].'">'.$row['titre'].'</a></li>';
		}
		
	?>
	
	</ul>
</div>
