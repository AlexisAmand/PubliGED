<?php 

require ('content/fonctions.php');
include ('config.php');

// include ('include/langue.php');
/*
include ('langues/fr.php');
include ('class/class.php');
*/
/* librairie mpdf version 7 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
		
		/* envoi du pdf par mail avec PHPMailer */
		
		$mail = new PHPMailer();
		
		/* TODO : Serveur SMTP */
		 
		$mail->SMTPDebug = 2;                                 
		$mail->isSMTP();                                      
		$mail->Host = 'smtp.gmail.com';  
		$mail->SMTPAuth = true;                               
		$mail->Username = 'alexis.amand@gmail.com';                 
		$mail->Password = '66R4HBBH';                           
		$mail->SMTPSecure = 'tls';                            
		$mail->Port = 587;                                    
		
		/* Expéditeur */
		
		$mail->SetFrom('alexis.amand@gmail.com', 'Expéditeur');
		
		/* Destinataire */
		
		$mail->AddAddress('alexis.amand@gmail.com');
		
		/* Contenu */
		
		$mail->IsHTML(true);	
		$mail->CharSet = "utf-8";			
		$mail->Subject = 'Essai pour publiGED';
		$mail->Body = '<p><b>E-Mail</b> au format <i>HTML</i>.</p>';
		$mail->AddAttachment('./'.$filename);
			
		/* envoi */
		
		$mail->Send();
												
	}
catch (Exception $e)
	{
		echo 'Exception : ',  $e->getMessage(), "\n";
	}
		
?>