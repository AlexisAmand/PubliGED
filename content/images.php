	<h3><?php echo TITRE_RUB_3; ?></h3>

	<?php

	if(VerifGedcom($pdo2) == "1")
		{
		echo '<p>Prochainement...</p>';
		}
	else
		{
		echo NO_GEDCOM;
		}
		
	?>