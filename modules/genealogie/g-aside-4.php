<!-- GENEALOGIE - MODULE DES INDIVIDUS -->

<div class="card bg-light border-secondary mb-3">
	<div class="card-header"><?php echo ASIDE_4 ?></div>
	<ul class="list-group">
		<li class="list-group-item"><a href="index.php?page=patro"><?php echo TITRE_RUB_6; ?></a></li>
		<li class="list-group-item"><a href="index.php?page=liste_individu&l=A"><?php echo TITRE_RUB_8; ?></a></li>
			
		<?php 
		
		/* trouver la 1ere lettre du premier nom par ordre alphabétique */
		
		$sql = "select * from individus";
		$resultat = $pdo2->prepare ( $sql );
		$resultat->execute ();
		
		$lettre = 'Z';
		
		while ($row = $resultat->fetch ())
		{
			$nom = $row['surname'];
			$FirstLettre = substr($nom, 0, 1);
			
			if ($fl < $lettre )
				{
				$lettre = $FirstLettre;	
				var_dump($fl);
				}
		}
		
		?>	
		
		<li class="list-group-item"><a href="index.php?page=liste_individu&l=<?php echo $lettre ?>"><?php echo TITRE_RUB_8; ?></a></li>
		<li class="list-group-item"><a href="index.php?page=eclair"><?php echo TITRE_RUB_10; ?></a></li>
		<li class="list-group-item"><a href="index.php?page=sosa"><?php echo TITRE_RUB_11; ?></a></li>
	</ul>
</div>

<br />