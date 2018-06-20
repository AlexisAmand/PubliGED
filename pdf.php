<?php 

require ('content/fonctions.php');
include ('config.php');
// include ('include/langue.php');
include ('langues/fr.php');
include ('class/class.php');

?>

<?php

require('lib/fpdf.php');

switch($_GET['page'])
    {
    case "categories":
        
        $req = $pdo->query ( "SELECT * FROM articles WHERE ref = '" . $_GET ['ref'] . "'" );
        
        $article = new articles();
        
        while ( $row = $req->fetch () ) {
            $article->contenu = $row['article'];
            $article->titre = $row['titre'];
        }
              
        $pdf = new FPDF();
        $pdf->AddPage();
             
        /* Titre du pdf */ 
        $pdf->SetTitle("toto");
        
        /* Affichage du titre sur le pdf */
        $pdf->SetFont('Arial','',16);
        $pdf->MultiCell(0,5,$article->titre);
        
        $pdf->Ln(10);
        
        /* Affichage du texte sur le pdf */
        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell(0,5,$article->contenu);
        
        /* Hop ! Le pdf */
        $pdf->Output();
        
        break;
    case "blog":
    	
    	$req = $pdo->query ( "SELECT * FROM articles WHERE ref = '" . $_GET ['ref'] . "'" );
    	
    	$article = new articles();
    	
    	while ( $row = $req->fetch () ) {
    		$article->contenu = $row['article'];
    		$article->titre = $row['titre'];
    	}
    	
    	$pdf = new FPDF();
    	$pdf->AddPage();
    	
    	/* Titre du pdf */
    	$pdf->SetTitle("toto");
    	
    	/* Affichage du titre sur le pdf */
    	$pdf->SetFont('Arial','',16);
    	$pdf->MultiCell(0,5,$article->titre);
    	
    	$pdf->Ln(10);
    	
    	/* Affichage du texte sur le pdf */
    	$pdf->SetFont('Arial','',10);
    	$pdf->MultiCell(0,5,$article->contenu);
    	
    	/* Hop ! Le pdf */
    	$pdf->Output();
    	
    	break;
        
    default:
        echo "oups !";
    }
    
?>