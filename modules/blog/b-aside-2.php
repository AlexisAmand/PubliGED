<!-- MODULE QUI AFFICHE LA LISTE DES CATEGORIES -->

<?php

$req_intro = "SELECT * FROM articles GROUP BY id_cat";
$resultat = $pdo2->prepare ( $req_intro );
$resultat->execute ();

?>

<div class="card bg-light border-secondary mb-3">

<div class="card-header"><?php echo ASIDE_BLOG_2 ?></div>

<?php 

echo "<ul class='list-group'>";

while ( $data = $resultat->fetch () ) {
	echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
	// get_category_name ( $pdo, $data ['id_cat'] );
	
	echo "<a href='index.php?page=categories&id=" . $data ['id_cat']  . "'>" . get_category_name ( $pdo2, $data ['id_cat'] ) . "</a>";
	
	$req_nbcat = "SELECT id_cat, count(*) AS nbcat FROM articles WHERE id_cat=:id_cat GROUP BY id_cat";
	$res_nbcat = $pdo2->prepare($req_nbcat);
	$res_nbcat->bindparam(':id_cat', $data ['id_cat']);
	$res_nbcat->execute();
	
	while ( $data_nbcat = $res_nbcat->fetch () ) 
	   {
	       echo "<span class='badge badge-primary badge-pill'>".$data_nbcat['nbcat']."</span>";
	   }
	echo "</li>";
}

echo "</ul>";

?>

</div>

<br />