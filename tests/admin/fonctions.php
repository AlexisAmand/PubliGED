<?php

/* fonction qui récupére le titre d'un article à partir de son numéro */

function RecupTitreArticle($pdo2, $a) {
	$res = $pdo2->prepare ( "SELECT * FROM articles WHERE ref = :ref" );
	$res->bindparam ( ':ref', $a );
	$res->execute ();

	while ( ($row = $res->fetch ( PDO::FETCH_ASSOC )) ) {
		return $row ['titre'];
	}
}

?>