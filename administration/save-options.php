<?php

include ('../config.php');

/* les champs "à remplir" ne doivent pas être vides */

if (isset ( $_POST ['top'] ))
{
	
	$valeur = "top";
	
	$stmt = $pdo->prepare ( "UPDATE configuration SET valeur=:valeur WHERE nom=:nom" );
	
	$stmt->bindParam ( ':nom', $valeur, PDO::PARAM_STR );
	$stmt->bindParam ( ':valeur', $_POST ['top'], PDO::PARAM_STR );
	$stmt->execute ();
	
	/* TODO: dans la table configuration, le champ nrpp pourra surement être supprimé */
	
	if (!empty($_POST['tabOptions']))
	{
		
		foreach($_POST['tabOptions'] as $cle => $valeur) 
			{
			echo $cle.' : '.$valeur.'<br>';
			}
	}
	
?>
            
<div class="alert alert-success" role="alert">
<?php echo "Les options ont bien été enregistrées"; ?>
</div>
		            
<?php
} 
else
{
?>

	<div class="alert alert-danger" role="alert">
	<?php echo "Attention ! Certains champs n'ont pas été remplis.<br />Les options n'ont pas pu être enregistrées."; ?>
	</div>

<?php 
}
?>