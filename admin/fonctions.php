<?php

/* fonction qui récupére le nombre de resultat à afficher par page */

function RecupTitreArticle($pdo2, $a)
    {
    
    $res = $pdo2->prepare("SELECT * FROM articles WHERE ref = :ref");
    $res->bindparam(':ref', $a);
    $res->execute ();
            
    while (($row = $res->fetch(PDO::FETCH_ASSOC)))
        {
        return $row['titre'];
        }
    
    }
    
?>