<?php 
/*
require ('content/fonctions.php');
*/
include ('config.php');
// include ('include/langue.php');
/*
include ('langues/fr.php');
include ('class/class.php');
*/
/* librairie mpdf version 7 */

require_once 'vendor/autoload.php';

/* récupération de l'article */

$req = "select * from articles where ref='{$_GET['id']}'";
$res = $pdo->prepare ($req);
$res->execute ();

/* affichage du pdf */

while ( $data = $res->fetch () ) 
	{
		$mpdf = new \Mpdf\Mpdf();
		
		$stylesheet = file_get_contents('style/style.css');	
		
		$mpdf->WriteHTML($stylesheet,1);
				
		$mpdf->WriteHTML("<h1>".$data['titre']."</h1>".$data ['article'],2);
		
		$mpdf->Output();
	}
	
	
	
?>