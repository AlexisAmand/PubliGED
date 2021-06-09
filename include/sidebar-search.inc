<?php

$sqlArticles = $pdo2->prepare ( "SELECT * FROM articles publication = '1' AND WHERE article LIKE '%" . $_GET['recherche'] . "%' OR titre LIKE '%" . $_GET['recherche'] . "%'" );
$sqlArticles->execute ();
$nbSearchArticles = $sqlArticles->rowCount ();

$sqlIndividu = $pdo2->prepare ( "SELECT * FROM individus WHERE nom LIKE '%" . $_GET['recherche'] . "%' OR prenom LIKE '%" . $_GET['recherche'] . "%'" );
$sqlIndividu->execute ();
$nbSearchIndividus = $sqlIndividu->rowCount();

$sqlLieux = $pdo2->prepare ( "SELECT * FROM lieux WHERE ville LIKE '%" . $_GET['recherche'] . "%' OR dep LIKE '%" . $_GET['recherche'] . "%'" );
$sqlLieux->execute ();
$nbSearchLieux = $sqlLieux->rowCount();

?>

<!-- MODULE QUI AFFICHE LE MENU DE LA RECHERCHE -->

<div class="card mb-3">

	<div class="card-header"><?php echo MENU_RESULT; ?></div>

	<ul class='list-group'>
		<li class='list-group-item d-flex justify-content-between align-items-center'>
			<a href="index.php?page=search&type=1&recherche=<?php echo $_GET['recherche']; ?>">
			<?php echo MENU_RESULT_ARTICLE; ?>
			<span class='badge badge-primary badge-pill'><?php echo $nbSearchArticles; ?></span>
			</a>
		</li>
		<li class='list-group-item d-flex justify-content-between align-items-center'>
			<a href="index.php?page=search&type=2&recherche=<?php echo $_GET['recherche']; ?>">
			<?php echo MENU_RESULT_INDIVIDU; ?>
			<span class='badge badge-primary badge-pill'><?php echo $nbSearchIndividus; ?></span>
			</a>
		</li>
		<li class='list-group-item d-flex justify-content-between align-items-center'>
			<a href="index.php?page=search&type=3&recherche=<?php echo $_GET['recherche']; ?>">
			<?php echo MENU_RESULT_PLACE; ?>
			<span class='badge badge-primary badge-pill'><?php echo $nbSearchLieux; ?></span>
			</a>
		</li>
		<li class='list-group-item d-flex justify-content-between align-items-center'>
			<a href="index.php?page=search&type=3&recherche=<?php echo $_GET['recherche']; ?>">
			<?php /* a ajouter dans le menu de langue */ echo "Evenements"; ?>
			<span class='badge badge-primary badge-pill'>X</span>
			</a>
		</li>
	</ul>

</div>