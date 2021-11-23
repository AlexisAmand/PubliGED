<?php

include ('../../content/fonctions.php');
include ('../../config.php');
include ('../../class/class.php');

$ref_case_7 = $_GET ['ref'];

$case_5 = "SELECT * FROM familles WHERE enfant = '{$ref_case_7}'";
$req_5 = $pdo->prepare ( $case_5 );
$req_5->execute ();

while ( $row_5 = $req_5->fetch ( PDO::FETCH_ASSOC ) ) {
	$ref_case_5 = $row_5 ['pere'];
	$ref_case_6 = $row_5 ['mere'];
}

if (! empty ( $ref_case_5 )) {
	$case_1 = "SELECT * FROM familles WHERE enfant = '{$ref_case_5}'";
	$req_1 = $pdo->prepare ( $case_1 );
	$req_1->execute ();

	while ( $row_1 = $req_1->fetch ( PDO::FETCH_ASSOC ) ) {
		$ref_case_1 = $row_1 ['pere'];
		$ref_case_2 = $row_1 ['mere'];
	}
}

if (! empty ( $ref_case_6 )) {
	$case_3 = "SELECT * FROM familles WHERE enfant = '{$ref_case_6}'";
	$req_3 = $pdo->prepare ( $case_3 );
	$req_3->execute ();

	while ( $row_3 = $req_3->fetch ( PDO::FETCH_ASSOC ) ) {
		$ref_case_3 = $row_3 ['pere'];
		$ref_case_4 = $row_3 ['mere'];
	}
}

?>

<svg width="100%" height="100%">

    <!-- Génération  3 -->

    <rect x="0" y="0" width="200" height="100" stroke="black" stroke-width="1px" fill="white" rx="5" ry="5"/>
    <text x="100" y="28" text-anchor="middle" style="font-family: Times New Roman;font-size:14;">
        <?php 
		/* 1 */
		if (! empty ( $ref_case_1 )) {
			casearbre ( $pdo, '100',  $ref_case_1 );
		}
		?>
    </text>

    <line x1="200" y1="50" x2="250" y2="50" stroke="black" />
    <line x1="225" y1="50" x2="225" y2="150" stroke="black" />

    <rect x="250" y="0" width="200" height="100" stroke="black" stroke-width="1px" fill="white" rx="5" ry="5"/>
    <text x="350" y="28" text-anchor="middle" style="font-family: Times New Roman;font-size:14;">
        <?php 
		/* 2 */
		if (! empty ( $ref_case_2 )) {
			casearbre ( $pdo, '350', $ref_case_2 );
		}
		?>
    </text>

    <rect x="500" y="0" width="200" height="100" stroke="black" stroke-width="1px" fill="white" rx="5" ry="5"/>
    <text x="600" y="28" text-anchor="middle" style="font-family: Times New Roman;font-size:14;">
        <?php 
		/* 3 */
		if (! empty ( $ref_case_3 )) {
			casearbre ( $pdo,'600',$ref_case_3 );
		}
		?>
    </text>

    <line x1="700" y1="50" x2="750" y2="50" stroke="black" />
    <line x1="725" y1="50" x2="725" y2="150" stroke="black" />

    <rect x="750" y="0" width="200" height="100" stroke="black" stroke-width="1px" fill="white" rx="15" ry="5"/>
    <text x="850" y="28" text-anchor="middle" style="font-family: Times New Roman;font-size:14;">
        <?php
		/* 4 */
		if (! empty ( $ref_case_4 )) {
			casearbre ( $pdo, '850', $ref_case_4 );
		}
		?>
    </text>

    <!-- Génération n°2 -->
    <rect x="125" y="150" width="200" height="100" stroke="black" stroke-width="1px" fill="white" rx="5" ry="5"/>
    <text x="225" y="178" text-anchor="middle" style="font-family: Times New Roman;font-size:14;">
        <?php 
	  	/* 5 */
		if (! empty ( $ref_case_5 )) 
			{
			casearbre ( $pdo, '225', $ref_case_5 );
			}
		?>	
    </text>

    <line x1="325" y1="200" x2="625" y2="200" stroke="black" />
    <line x1="475" y1="200" x2="475" y2="300" stroke="black" />

    <rect x="625" y="150" width="200" height="100" stroke="black" stroke-width="1px" fill="white" rx="5" ry="5"/>
    <text x="725" y="178" text-anchor="middle" style="font-family: Times New Roman;font-size:14;">
        <?php 
		/* 6 */
		if (! empty ( $ref_case_6 )) 
	  		{
			casearbre ( $pdo, '725', $ref_case_6 );
			}
		?>
    </text>

    <!-- Génération n°1 -->

    <rect x="375" y="300" width="200" height="100" stroke="black" stroke-width="1px" fill="white" rx="5" ry="5"/>
    <text x="475" y="328" text-anchor="middle" style="font-family: Times New Roman;font-size:14;">
        <?php 
        /* individu de la case n°7 */
		casearbre ( $pdo, '475', $_GET ['ref'] );
		?>
    </text>

</svg>
