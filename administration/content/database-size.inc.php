<?php
$utilisateur = new Utilisateurs();
$utilisateur->information($pdo, $_SESSION['login']);
?>

<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$utilisateur->login; ?>.</h1>  
	
		<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=database-size"><?php echo ASIDE_ADMIN_7; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_DB_SIZE; ?></li>
		</ol>
        
        <div class="row">
        
        	<div class="col-xl-12">
            <div class="card mb-4">
              <div class="card-header">
                <i class="bi bi-server me-2"></i><?php echo ADM_DB_SIZE; ?>
              </div>
              <div class="card-body">
                <?php 
                if($utilisateur->rang == 'administrateur')
                  {
                  /* récupération des infos */
                  
                  $req = "SHOW TABLE STATUS";
                  $res =  $pdo->prepare($req);
                  $res->execute();	

                  /* Taille totale */

                  $Size_Total = 0;

                  /* Affichage des résultats dans un tableau */

                  echo '<table class="table table-bordered">';
                  echo '<thead>';
                  echo "<tr>";
                  echo '<th class="scope">'.ADM_DB_TABLE_NAME.'</th>';
                  echo '<th class="scope">'.ADM_DB_TABLE_SIZE.'</th>';
                  echo "</tr>";
                  echo '</thead>';
                  echo '<tbody>';
                  while ($row = $res->fetch(PDO::FETCH_ASSOC))
                    {
                      $Size_Total = $Size_Total + $row['Data_length'];
                      echo '<tr>';
                      echo '<td>';
                      echo $row['Name'];
                      echo "</td>";
                      echo '<td>';
                      echo $row['Data_length'];
                      echo "</td>";
                      echo '</tr>';
                    }
                  echo "<tr><th class='scope'>".ADM_DB_TOTAL."</th><th class='scope'>".$Size_Total."</th></tr>";
                  echo '</tbody>';
                  echo '</table>';
                  }
                else
                  {
                  echo NO_ACCESS; /* message si l'utilisateur a le rôle "rédacteur" */
                  }
                ?>
              </div>
  					</div>
	  			</div>
		  	</div> 
</div>
