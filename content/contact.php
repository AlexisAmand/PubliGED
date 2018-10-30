<?php

/* ------------------ */
/* ENVOYER UN MESSAGE */
/* ------------------ */

/* TODO : Le fil d'ariane */
/* TODO : faire passer le script à PHPMailer */

if (isset ( $_POST ['nom'] ) and $_POST ['email'] and $_POST ['sujet'] and $_POST ['message']) {
	// le proprio du site
	$to = ' ';

	// celui qui envoie le message
	$from = $_POST ['email'];

	$subject = $_POST ['sujet'];

	$message = $_POST ['message'];

	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'To: <' . $to . '>\r\n';
	$headers .= 'From: Anniversaire <anniversaire@example.com>' . "\r\n";

	// Envoi
	mail ( $to, $subject, $message, $headers );
} else {
}

?>

<h3>Contact</h3>

<form action="index.php?page=contact" method="POST"
	class="form-vertical">

	<p>Tous les champs sont obligatoires</p>

	<div class="form-group">
		<label for="pseudo">Votre nom</label> <input id="pseudo" type="text"
			name="nom" class="form-control" />
	</div>

	<div class="form-group">
		<label for="email">Votre email</label> <input id="email" type="text"
			name="email" class="form-control" />
	</div>

	<div class="form-group">
		<label for="sujet">Votre sujet</label> <input id="sujet" name="sujet"
			class="form-control" />
	</div>

	<div class="form-group">
		<label for="message">Votre message</label>
		<textarea id="message" name="message" class="form-control"></textarea>
	</div>



	<input type="submit" class="btn btn-default">

</form>