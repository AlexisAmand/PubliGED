<?php

include ('config.php');

require_once 'vendor/autoload.php';

/* récupération de l'article */

$sqlArticle = "select * from articles where ref='{$_GET['id']}'";
$reqArticle = $pdo->prepare($sqlArticle);
$reqArticle->execute();

/* Affichage du pdf */

while ($data = $reqArticle->fetch()) {
	$mpdf = new \Mpdf\Mpdf();

	$stylesheet = file_get_contents('style/style.css');

	$mpdf->WriteHTML($stylesheet, 1 );

	$mpdf->WriteHTML("<h1>".$data['titre']."</h1>".$data['article'], 2 );

	$mpdf->Output ();
}

?>