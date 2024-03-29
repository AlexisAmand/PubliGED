<?php
require ('content/fonctions.php');
include ('config.php');
include ('include/langue.php');

/*
 * include ('langs/fr.php');
 * include ('class/class.php');
 */
/* librairie mpdf version 7 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

$filename = "article.pdf";

/* si le pdf existe, on le supprime */

if (file_exists ( $filename )) {
	unlink ( $filename );
}

/* Génération du pdf de l'article */

$sqlArticle = "SELECT * FROM articles WHERE publication ='1' AND ref='".$_GET['id']."'";
$reqArticle = $pdo->prepare($sqlArticle);
$reqArticle->execute();

while ($data = $reqArticle->fetch(PDO::FETCH_ASSOC)) {
	$mpdf = new \Mpdf\Mpdf();
	$stylesheet = file_get_contents ('style/style.css');
	$mpdf->WriteHTML ($stylesheet, 1 );
	$mpdf->WriteHTML ("<h1>".$data['titre']."</h1>".$data ['article'], 2);

	$mpdf->Output ($filename);
}

/* envoi du pdf par mail avec PHPMailer */

$mail = new PHPMailer ();

/* TODO : Serveur SMTP */

$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'alexis.amand@gmail.com';
$mail->Password = '......'; /* TODO : j'ai supprimé le mdp pour la mise sur GitHub*/
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

/* non recommandé : ça allow insecure connections */

$mail->SMTPOptions = array (
		'ssl' => array (
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
		)
);

/* Expéditeur */

$mail->SetFrom ( 'alexis.amand@gmail.com', 'Expéditeur' );

/* Destinataire */

$mail->AddAddress ( 'alexis.amand@gmail.com' );

/* Contenu */

$mail->IsHTML ( true );
$mail->CharSet = "utf-8";
$mail->Subject = 'Essai pour publiGED';
$mail->Body = '<p><b>E-Mail</b> au format <i>HTML</i>.</p>';
$mail->AddAttachment ( './' . $filename );

/* Envoi */

$mail->Send ();

?>