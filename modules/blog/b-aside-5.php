<!-- MODULE SOCIAL -->

<div class="card bg-light border-secondary mb-3">

	<div class="card-header"><?php echo ASIDE_BLOG_5 ?></div>
	
	<div class="text-center">
	
	<?php
	
	$sqlSocial = "select * from module_reseau where actif='1'";
	$reqSocial = $pdo2->prepare($sqlSocial);
	$reqSocial->execute();
		
	while ($row = $reqSocial->fetch())
		{
		echo '<a href="'.$row['url'].'"><i class="'.$row['icone'].'"></i></a>';
		}
	
	?>

	</div>

</div>