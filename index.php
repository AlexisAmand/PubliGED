<script>
var http = require('http');
var uc = require('upper-case');
http.createServer(function (req, res) {
  res.writeHead(200, {'Content-Type': 'text/html'});
  /*Use our upper-case module to upper case a string:*/
  res.write(uc.upperCase("Hello World!"));
  res.end();
}).listen(8080);
</script>

<?php
require ('content/fonctions.php');
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
		
</head>

<body>

<div class="container-lg container-fluid fixed-top">

	<div class="row">

		<div class="col-md-12">
		
			<?php $Page->AfficherPillmenu(); ?>
		
		</div>

	</div>

</div>

<div class="container-lg container-fluid">

	<header class="row" style="background-image: url('https://via.placeholder.com/2560x1560.png');">

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