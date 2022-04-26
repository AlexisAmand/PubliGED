<?php

include ('content/fonctions.php');
include ('config.php');
include ('include/langue.php');
include ('class/class.php');

$Page = new Pages($pdo);

require_once 'vendor/autoload.php';

?>

<!DOCTYPE html>

<html lang="fr">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php $Page->AfficherMeta($pdo); ?>

	<?php $Page->AfficherCSS($pdo); ?>

	<!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//matomo.boitasite.com/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '5']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->
		
</head>

<body>

<div class="container-lg container-fluid fixed-top">

	<div class="row">

		<div class="col-md-12">
		
			<?php $Page->AfficherPillmenu($pdo); ?>

		</div>

	</div>

</div>

<div class="container-lg container-fluid">

	<header class="row">

		<div class="col-12">

			<?php $Page->AfficherHeader($pdo); ?>
		
		</div>
					
	</header>	

	<div class="row" style="margin-top: 10px;">

		<div class="col-md-12" aria-label="breadcrumb">

			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php?page=blog" title="Accueil"><?php echo HERE;?></a></li>
				<li class="breadcrumb-item"><a href=""><?php echo $Page->rubrique; ?></a></li>
				<li class="breadcrumb-item active"><?php echo $Page->titre; ?></li>
			</ol>

		</div>

	</div>

	<section class="row">
           
        <?php $Page->AfficherAside($pdo); ?>
              	
    	<?php $Page->AfficherContenu($pdo); ?>		
    	
	</section>

	<footer class="row">

    	<?php $Page->AfficherFooter(); ?>
                	        
	</footer>

</div>

	<?php $Page->AfficherLib(); ?>

</body>
</html>