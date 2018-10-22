<?php 

require ('content/fonctions.php');
include ('config.php');

// include ('include/langue.php');
/*
include ('langues/fr.php');
include ('class/class.php');
*/
/* librairie mpdf version 7 */

require_once 'vendor/autoload.php';
		
$filename = "DocPourEssayer.pdf";

try
	{

		/* si le pdf existe, on le supprime */
		
		if (file_exists($filename))
			{
				unlink($filename);
			}
		
		
		/* Génération du pdf de l'article */
		
		$req = "select * from articles where ref='".$_GET['id']."'";
		$res = $pdo->prepare ($req);
		$res->execute ();
				
		while ( $data = $res->fetch () )
		{
			$mpdf = new \Mpdf\Mpdf();
			$stylesheet = file_get_contents('style/style.css');
			$mpdf->WriteHTML($stylesheet,1);
			$mpdf->WriteHTML("<h1>".$data['titre']."</h1>".$data ['article'],2);
			
			$mpdf->Output($filename);
		}
		
		/* envoi du pdf par mail */
		
			
		$dest = "cible@mail.com";
		$objet = "sujet du message";
		$message ="Plop ! C'est un pdf super cool";
		
		$entetes = "From: Alex";
		$entetes .= "MIME-Version 1.0\r\n";
		$entetes .= "Content-Type:text/html; charset=utf-8\r\n";
		$entetes .= "Content-Transfert-Encoding:8 bit\r\n";
		
		$mail = mail($dest, $objet, $message, $entetes);
						
	}
catch (Exception $e)
	{
		echo 'Exception : ',  $e->getMessage(), "\n";
	}
		
?>