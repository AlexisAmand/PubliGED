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
$mail->Password = '...'; /* TODO : le mdp */
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

if (isset ( $_POST ['nom'] ) and $_POST ['email'] and $_POST ['sujet'] and $_POST ['message']) 
	{
	
	/* le proprio du site */
	$mail->AddAddress ( 'alexis.amand@gmail.com' );

	/* celui qui envoie le message */
	
	$validator = new EmailValidator();
	
	if(	$validator->isValid($_POST ['email'], new RFCValidation()))
		{
		$mail->SetFrom ( $_POST ['email'], 'Expéditeur' );
		}
	
	/* Contenu */
	
	$mail->IsHTML ( true );
	$mail->CharSet = "utf-8";
	$mail->Subject = $_POST ['sujet'];
	$mail->Body = $_POST ['message'];
	
	/* Envoi */
	
	if($mail->Send ())
		{
		echo '<div class="alert alert-success" role="alert">'.SEND_SUCCESS.'</div>'; 
		}
	else
		{
		echo '<div class="alert alert-warning" role="alert">'.SEND_FAIL.'</div>';
		}
		
	} 
else 
	{
	/* TODO : Si la personne arrive ici, c'est que l'un des champs n'a pas été complété */
	}

?>

<h3><?php  echo PILLMENU_4; ?></h3>

<form action="index.php?page=contact" method="POST" class="form-vertical">

	<p><?php echo CONTACT_WARNING; ?></p>

	<div class="form-group">
		<label for="pseudo"><?php echo FRM_NAME; ?></label> <input id="pseudo" type="text" name="nom" class="form-control" />
	</div>

	<div class="form-group">
		<label for="email"><?php echo FRM_MAIL; ?></label> <input id="email" type="text" name="email" class="form-control" />
	</div>

	<div class="form-group">
		<label for="sujet"><?php echo FRM_TOPIC; ?></label> <input id="sujet" name="sujet" class="form-control" />
	</div>

	<div class="form-group">
		<label for="message"><?php echo FRM_MSG; ?></label>
		<textarea id="message" name="message" class="form-control"></textarea>
	</div>

	<input type="submit" class="btn btn-default">

</form>