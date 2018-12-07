<div class="col-sm-10 col-sm-push-1">

<?php

/* ---------------------------------- */
/* AFFICHAGE D'UN ARBRE 3 GENERATIONS */
/* ---------------------------------- */
$ref_case_7 = $_GET ['ref'];

$case_5 = "SELECT * FROM familles WHERE enfant = '{$ref_case_7}'";
$req_5 = $pdo2->prepare ( $case_5 );
$req_5->execute ();

while ( $row_5 = $req_5->fetch ( PDO::FETCH_ASSOC ) ) {
	$ref_case_5 = $row_5 ['pere'];
	$ref_case_6 = $row_5 ['mere'];
}

if (! empty ( $ref_case_5 )) {
	$case_1 = "SELECT * FROM familles WHERE enfant = '{$ref_case_5}'";
	$req_1 = $pdo2->prepare ( $case_1 );
	$req_1->execute ();

	while ( $row_1 = $req_1->fetch ( PDO::FETCH_ASSOC ) ) {
		$ref_case_1 = $row_1 ['pere'];
		$ref_case_2 = $row_1 ['mere'];
	}
}

if (! empty ( $ref_case_6 )) {
	$case_3 = "SELECT * FROM familles WHERE enfant = '{$ref_case_6}'";
	$req_3 = $pdo2->prepare ( $case_3 );
	$req_3->execute ();

	while ( $row_3 = $req_3->fetch ( PDO::FETCH_ASSOC ) ) {
		$ref_case_3 = $row_3 ['pere'];
		$ref_case_4 = $row_3 ['mere'];
	}
}

echo '<table border="0" id="Tree"><tr><td colspan="2" rowspan="2" class="TreeCase">';

/* 1 */

if (! empty ( $ref_case_1 )) {
	casearbre ( $pdo2, $ref_case_1 );
}

echo '</td><td></td><td></td><td colspan="2" rowspan="2" class="TreeCase">';

/* 2 */

if (! empty ( $ref_case_2 )) {
	casearbre ( $pdo2, $ref_case_2 );
}

echo '</td><td></td><td></td><td colspan="2" rowspan="2" class="TreeCase">';

/* 3 */

if (! empty ( $ref_case_3 )) {
	casearbre ( $pdo2, $ref_case_3 );
}

echo '</td><td></td><td></td><td colspan="2" rowspan="2" class="TreeCase">';

/* 4 */

if (! empty ( $ref_case_4 )) {
	casearbre ( $pdo2, $ref_case_4 );
}

echo '</td>
	        </tr>
	        <tr>
    
	            <td style="border-bottom:0px solid black;"></td>
	            <td></td>
    
	            <td></td>
	            <td></td>
    
	            <td></td>
	            <td></td>
    
	        </tr>
	        <tr>
	            <td></td>
	            <td style="border-left:2px solid #6B6B6B;border-bottom:2px solid #6B6B6B;"></td>
	            <td style="border-bottom:2px solid #6B6B6B;"></td>
	            <td style="border-bottom:2px solid #6B6B6B;"></td>
	            <td style="border-bottom:2px solid #6B6B6B;border-right:2px solid #6B6B6B;"></td>
	            <td></td>
    
	            <td></td>
	            <td></td>
    
	            <td></td>
	            <td style="border-left:2px solid #6B6B6B;border-bottom:2px solid #6B6B6B;"></td>
	            <td style="border-bottom:2px solid #6B6B6B;"></td>
	            <td style="border-bottom:2px solid #6B6B6B;"></td>
	            <td style="border-bottom:2px solid #6B6B6B;border-right:2px solid #6B6B6B;"></td>
	            <td></td>
	        </tr>
	        <tr>
	            <td></td>
	            <td></td>
	            <td style="border-right:2px solid #6B6B6B;"></td>
	            <td></td>
	            <td></td>
	            <td></td>
    
	            <td></td>
	            <td></td>
    
	            <td></td>
	            <td></td>
	            <td style="border-right:2px solid #6B6B6B;"></td>
	            <td></td>
	            <td></td>
	            <td></td>
	        </tr>
	        <tr>
	            <td></td>
	            <td></td>
	            <td colspan="2" rowspan="2"  class="TreeCase">';

/* 5 */

if (! empty ( $ref_case_5 )) {
	casearbre ( $pdo2, $ref_case_5 );
}

echo '</td>
	            <td></td>
	            <td></td>
    
	            <td></td>
	            <td></td>
    
	            <td></td>
	            <td></td>
	            <td colspan="2" rowspan="2" class="TreeCase">';

/* 6 */

if (! empty ( $ref_case_6 )) {
	casearbre ( $pdo2, $ref_case_6 );
}

echo '</td>
	            <td></td>
	            <td></td>
	        </tr>
	        <tr>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	        </tr>
    
	        <tr>
	            <td></td>
	            <td></td>
	            <td style="border-right:2px solid #6b6b6b;"></td>
	            <td style="border-bottom:2px solid #6b6b6b;"></td>
	            <td style="border-bottom:2px solid #6b6b6b;"></td>
	            <td style="border-bottom:2px solid #6b6b6b;"></td>
	            <td style="border-bottom:2px solid #6b6b6b;"></td>
	            <td style="border-bottom:2px solid #6b6b6b;"></td>
	            <td style="border-bottom:2px solid #6b6b6b;"></td>
	            <td style="border-bottom:2px solid #6b6b6b;"></td>
	            <td style="border-right:2px solid #6b6b6b;border-bottom:2px solid #6b6b6b;"></td>
	            <td></td>
	            <td></td>
	            <td></td>
	        </tr>
    
	        <tr>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td style="border-right:2px solid #6b6b6b;"></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	        </tr>
    
    
	        <tr>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td colspan="2" rowspan="2"  class="TreeCase">';

/* individu de la case n°7 */

casearbre ( $pdo2, $_GET ['ref'] );

echo '
    
    
	            </td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	        </tr>
    
	        <tr>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
    
	        </tr>
    
    
    
	    </table>';

?>

</div>