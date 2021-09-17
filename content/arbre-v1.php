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

?>

<div class="col-sm-10 col-sm-push-1">

<style>
#Tree tr td {
	border:1px solid black;
}
</style>

<table border="0" id="Tree">

	<tr>
		<td colspan="2" rowspan="2" style="text-align:center">
		<?php 
		/* 1 */
		if (! empty ( $ref_case_1 )) {
			casearbre ( $pdo2, $ref_case_1 );
		}
		?>
		</td>
		<td colspan="2">a</td>
		<td colspan="2" rowspan="2" style="text-align:center">
		<?php 
		/* 2 */
		if (! empty ( $ref_case_2 )) {
			casearbre ( $pdo2, $ref_case_2 );
		}
		?>
		</td>
		<td colspan="2">z</td>
		<td colspan="2" rowspan="2" style="text-align:center">
		<?php 
		/* 3 */
		if (! empty ( $ref_case_3 )) {
			casearbre ( $pdo2, $ref_case_3 );
		}
		?>
		</td>
		<td colspan="2">e</td>
		
		<td colspan="2" rowspan="2" style="text-align:center">
		<?php
		/* 4 */
		if (! empty ( $ref_case_4 )) {
			casearbre ( $pdo2, $ref_case_4 );
		}
		?>
		</td>
	</tr>
	<tr>
    	<td style="border-bottom:0px solid black;">r</td>
	    <td colspan="5">t</td>
    </tr>
	<tr style="height: 16px;">
	    <td>u</td>
	    <td style="border-left:2px solid #6B6B6B;border-bottom:2px solid #6B6B6B;"></td>
	    <td style="border-bottom:2px solid #6B6B6B;"></td>
	    <td style="border-bottom:2px solid #6B6B6B;"></td>
	    <td style="border-bottom:2px solid #6B6B6B;border-right:2px solid #6B6B6B;"></td>
	    <td colspan="4"></td>
	    <td style="border-left:2px solid #6B6B6B;border-bottom:2px solid #6B6B6B;"></td>
	    <td style="border-bottom:2px solid #6B6B6B;"></td>
	    <td style="border-bottom:2px solid #6B6B6B;"></td>
	    <td style="border-bottom:2px solid #6B6B6B;border-right:2px solid #6B6B6B;"></td>
	    <td></td>
	</tr>
	<tr style="height: 16px;">
	    <td colspan="2"></td>
	    <td style="border-right:2px solid #6B6B6B;"></td>
	    <td colspan="7"></td>
	    <td style="border-right:2px solid #6B6B6B;"></td>
	    <td colspan="3"></td>
	</tr>
	<tr>
	    <td colspan="2"></td>
	    <td colspan="2" rowspan="2" style="text-align:center">
		<?php 
	  	/* 5 */
		if (! empty ( $ref_case_5 )) 
			{
			casearbre ( $pdo2, $ref_case_5 );
			}
		?>	
		</td>
	    <td colspan="6"></td>
	    <td colspan="2" rowspan="2" style="text-align:center">
		<?php 
		/* 6 */
		if (! empty ( $ref_case_6 )) 
	  		{
			casearbre ( $pdo2, $ref_case_6 );
			}
		?>
		</td>
	    <td colspan="2"></td>
	</tr>
	<tr>
	    <td colspan="10"></td>
	</tr>
    <tr style="height: 16px;">
	    <td colspan="2"></td>
	    <td style="border-right:2px solid #6b6b6b;"></td>
	    <td style="border-bottom:2px solid #6b6b6b;"></td>
	    <td style="border-bottom:2px solid #6b6b6b;"></td>
	    <td style="border-bottom:2px solid #6b6b6b;"></td>
	    <td style="border-bottom:2px solid #6b6b6b;"></td>
	    <td style="border-bottom:2px solid #6b6b6b;"></td>
	    <td style="border-bottom:2px solid #6b6b6b;"></td>
	    <td style="border-bottom:2px solid #6b6b6b;"></td>
	    <td style="border-right:2px solid #6b6b6b;border-bottom:2px solid #6b6b6b;"></td>
	    <td colspan="3"></td>
	</tr>
    <tr style="height: 16px;">
	    <td colspan="6"></td>
	    <td style="border-right:2px solid #6b6b6b;"></td>
	    <td colspan="7"></td>
	</tr>
    <tr>
	    <td colspan="6"></td>
	    <td colspan="2" rowspan="2" style="text-align:center">
        <?php 
        /* individu de la case n°7 */
		casearbre ( $pdo2, $_GET ['ref'] );
		?>
		</td>	
        <td colspan="6"></td>
	</tr>
    <tr>
	    <td colspan="12"></td>
    </tr>
</table>

</div>