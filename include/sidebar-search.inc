<!-- MODULE QUI AFFICHE LE MENU DE LA RECHERCHE -->

<?php 

if (isset ( $_POST ['recherche'] )) {
	// echo "Votre recherche: ".$_POST['recherche'] . "<br />";

	$sqlRechercheArticle = $pdo2->prepare("SELECT * FROM articles WHERE article LIKE '%" . $_POST ['recherche'] . "%' OR titre LIKE '%" . $_POST ['recherche'] . "%'");
	$sqlRechercheArticle->execute();
	$nbRechercheArticle= $sqlRechercheArticle->rowCount();
	
	$sqlRechercheIndividu = $pdo2->prepare("SELECT * FROM individus WHERE nom LIKE '%" . $_POST ['recherche'] . "%' OR surname LIKE '%" . $_POST ['recherche'] . "%'");
	$sqlRechercheIndividu->execute();
	$nbRechercheIndividu= $sqlRechercheIndividu->rowCount();
	
	$sqlRechercheLieu = $pdo2->prepare("SELECT * FROM lieux WHERE ville LIKE '%" . $_POST ['recherche'] . "%' OR region LIKE '%" . $_POST ['recherche'] . "%'");
	$sqlRechercheLieu->execute();
	$nbRechercheLieu= $sqlRechercheLieu->rowCount();
	
	/*
	$sqlRechercheEvenements = $pdo2->prepare(" ");
	$sqlRechercheEvenements->execute();
	$nbRechercheEvenements= $sqlRechercheEvenements->rowCount();
	*/
	
} else {
	$nbRechercheArticle = 0;
	$nbRechercheIndividu = 0;
	$nbRechercheLieu = 0;
	$nbRechercheEvenements = 0;
}

?>

<div class="card bg-light border-secondary mb-3">

	<div class="card-header"><?php echo MENU_RESULT; ?></div>

	<ul class='list-group'>
		<li class='list-group-item'><a href="#"><?php echo MENU_RESULT_ARTICLE; ?>
		<span class='badge badge-primary badge-pill'><?php echo $nbRechercheArticle; ?></span></a></li>
		<li class='list-group-item'><a href="#"><?php echo MENU_RESULT_INDIVIDU; ?>
		<span class='badge badge-primary badge-pill'><?php echo $nbRechercheIndividu; ?></span></a></li>
		<li class='list-group-item'><a href="#"><?php echo MENU_RESULT_PLACE; ?>
		<span class='badge badge-primary badge-pill'><?php echo $nbRechercheLieu; ?></span></li>
		<li class='list-group-item'><a href="#"><?php echo "Evenements" ?>
		<span class='badge badge-primary badge-pill'>X</span></li>
	</ul>

</div>