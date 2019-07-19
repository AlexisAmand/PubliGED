<!-- GENEALOGIE - MODULE DES INDIVIDUS -->

<div class="card bg-light border-secondary mb-3">
	<div class="card-header"><?php echo ASIDE_4 ?></div>
	<ul class="list-group">
		<li class="list-group-item"><a href="index.php?page=patro"><?php echo TITRE_RUB_6; ?></a></li>
			
		<?php 	
		$resultat = $pdo2->prepare("select substring(surname from 1 for 1) from individus order by surname LIMIT 1");
		$resultat->execute();
		$row = $resultat->fetch ();
		?>
		
		<li class="list-group-item"><a href="index.php?page=liste_individu&l=<?php echo $row[0]; ?>"><?php echo TITRE_RUB_8; ?></a></li>
		<li class="list-group-item"><a href="index.php?page=eclair"><?php echo TITRE_RUB_10; ?></a></li>
		<li class="list-group-item"><a href="index.php?page=sosa"><?php echo TITRE_RUB_11; ?></a></li>
	</ul>
</div>