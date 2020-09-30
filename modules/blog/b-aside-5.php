<!-- MODULE SOCIAL -->

<div class="card mb-3">

	<div class="card-header"><?php echo ASIDE_BLOG_5 ?></div>
	
	<div class="text-center">
	
	<?php
	
	$sqlSocial = "select * from module_reseau where actif='1'";
	$reqSocial = $pdo2->prepare($sqlSocial);
	$reqSocial->execute();
		
	while ($row = $reqSocial->fetch(PDO::FETCH_ASSOC))
		{
		echo '<a href="'.$row['url'].'"><i class="'.$row['icone'].' fa-2x"></i></a>';
		}
	
	?>

	</div>

</div>