<?php

/*

$sql = "SELECT * FROM modules WHERE visible='1' AND type='blog' ORDER BY position";
$req = $pdo->query ( $sql );

while ( $row = $req->fetch () ) {
    
    echo "<br />";
    
	include ("modules/blog/" . $row ['nomdumodule'] . ".php");
}

*/

?>

<div class="panel panel-default">

<div class="panel-heading"><strong><?php echo ASIDE_BLOG_1 ?></strong></div>

<ul class='list-group'>
	<li class='list-group-item'><a href="index.php?page=blog"><?php echo TITRE_RUB_0; ?></a></li>
</ul>

</div>

<?php

$req_intro = "SELECT * FROM articles GROUP BY id_cat";
$resultat = $pdo2->prepare ( $req_intro );
$resultat->execute ();

?>

<div class="panel panel-default">

<div class="panel-heading"><strong><?php echo ASIDE_BLOG_2 ?></strong></div>

<?php 

echo "<ul class='list-group'>";

while ( $data = $resultat->fetch () ) {
	echo "<li class='list-group-item'>";
	// get_category_name ( $pdo, $data ['id_cat'] );
	
	echo "<a href='index.php?page=categories&id=" . $data ['id_cat']  . "'>" . get_category_name ( $pdo2, $data ['id_cat'] ) . "</a>";
	
	$req_nbcat = "SELECT id_cat, count(*) AS nbcat FROM articles WHERE id_cat=:id_cat GROUP BY id_cat";
	$res_nbcat = $pdo2->prepare($req_nbcat);
	$res_nbcat->bindparam(':id_cat', $data ['id_cat']);
	$res_nbcat->execute();
	
	while ( $data_nbcat = $res_nbcat->fetch () ) 
	   {
	       echo "<span class='badge'>".$data_nbcat['nbcat']."</span>";
	   }
	echo "</li>";
}

echo "</ul>";

?>

</div>

<div class="panel panel-default">

<div class="panel-heading"><strong><?php echo ASIDE_BLOG_3 ?></strong></div>

<?php

$req_intro = "SELECT * FROM articles ORDER BY date DESC limit 0,5";
$resultat = $pdo2->prepare ( $req_intro );
$resultat->execute ();

echo "<ul class='list-group'>";

while ( $data = $resultat->fetch () ) {
	echo "<li class='list-group-item'><a href='index.php?page=article&id=" . $data ['ref'] . "'>" . html_entity_decode ( $data ['titre'] ) . "</a></li>";
}

echo "</ul>";

?>    

</div>

<div class="panel panel-default">

<div class="panel-heading"><strong><?php echo ASIDE_BLOG_5 ?></strong></div>

<div class="text-center">

<a href="#"><i class="fab fa-facebook-square fa-3x"></i></a>
<a href="#"><i class="fab fa-twitter-square fa-3x"></i></a>
<a href="#"><i class="fab fa-google-plus-square fa-3x"></i></a>
<a href="#"><i class="fab fa-vimeo-square  fa-3x"></i></a>
<!--  >a href="#"><i class="fab fa-linkedin fa-3x"></i></a -->

<br />

<a href="#"><i class="fas fa-rss-square fa-3x"></i></a>
<a href="#"><i class="fab fa-pinterest-square fa-3x"></i></a>
<a href="#"><i class="fab fa-instagram fa-3x"></i></a>
<a href="#"><i class="fab fa-youtube-square fa-3x"></i></a>

</div>

</div>
