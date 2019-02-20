<?php

/* ------------------ */
/* ENVOYER UN MESSAGE */
/* ------------------ */

/* TODO : Le fil d'ariane */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

require_once 'vendor/autoload.php';

$mail = new PHPMailer ();

/* TODO : Serveur SMTP */

$mail->isSMTP ();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'alexis.amand@gmail.com';
$mail->Password = '66R4HBBH'; /* TODO : le mdp */
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

?>

<h3><?php  echo PILLMENU_4; ?></h3>

<?php 

if (isset ($_POST ['nom'] ) and isset ($_POST ['email']) and isset ($_POST ['sujet']) and isset ($_POST ['message'])) 
	{
	/* note perso : Peut-être que j'aurais pu utiliser filter_input() au lieu de EmailValidator() */	
	$validator = new EmailValidator();
	
	if(	$validator->isValid($_POST ['email'], new RFCValidation()))
		{
		
		/* le proprio du site */
			
		$mail->AddAddress ( 'alexis.amand@gmail.com' );
			
		/* celui qui envoie le message */
		
		$mail->SetFrom ( $_POST ['email'], 'Expéditeur' );
		
		/* Contenu */
	
		$mail->IsHTML ( true );
		$mail->CharSet = "utf-8";
		$mail->Subject = $_POST ['sujet'];
		$mail->Body = $_POST ['message'];
	
		/* Envoi */
	
		if($mail->Send ())
			{
			echo '<div class="alert alert-success" role="alert">le mail a été envoyé</div>'; 
		
			}
		else 
			{
			echo '<div class="alert alert-warning" role="alert">le mail n\'a pas été envoyé</div>';
			}
		}
	else
		{
		echo '<div class="alert alert-warning" role="alert">le mail n\'est pas bon</div>';
		}
	} 
else
{
$erreur = 1
?>

<?php 
}
?>

<form action="index.php?page=contact" method="POST" class="form-vertical">

	<p><?php echo CONTACT_WARNING; ?></p>

	<div class="form-group">
		<label for="pseudo"><?php echo FRM_NAME; ?></label>
		<input id="pseudo" type="text" name="nom" class="form-control" value="<?php if (($erreur==1) and (empty($_POST['nom']))) {echo 'oups';}?>" />
	</div>

	<div class="form-group">
		<label for="email"><?php echo FRM_MAIL; ?></label>
		<input id="email" type="text" name="email" class="form-control" value="<?php if ($erreur==1) {echo 'oups';}?>" />
	</div>

	<div class="form-group">
		<label for="sujet"><?php echo FRM_TOPIC; ?></label>
		<input id="sujet" name="sujet" class="form-control" value="<?php if ($erreur==1) {echo 'oups';}?>" />
	</div>

	<div class="form-group">
		<label for="message"><?php echo FRM_MSG; ?></label>
		<textarea id="message" name="message" class="form-control" value="<?php if ($erreur==1) {echo 'oups';}?>"></textarea>
	</div>

	<input type="submit" class="btn btn-default">

</form>