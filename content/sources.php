	<?php 
	
	/* ----------------- */
	/* LISTE DES SOURCES */
	/* ---------------- */
	
	if (isset($_GET['ids']))
	{
	    echo "<h3>".TITRE_SRC." ".$_GET['ids']."</h3>";
	    
	    $stmt = $pdo2->prepare("SELECT * FROM sources WHERE ref=:ref");
	    $stmt->bindParam ( ":ref", $_GET['ids'], PDO::PARAM_INT );
	    $stmt->execute();	  
	    
	    echo "<table class='table table-bordered'>";	    
	    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC ))
	        {
	        echo "<tr><th>".REFSRC."</td><td>".$row['ref']."</th></tr>";
	        echo "<tr><th>".TITRESRC."</td><td>".$row['titre']."</th></tr>";
	        echo "<tr><th>".NOMSRC."</td><td>".$row['nom']."</th></tr>";
	        echo "<tr><th>".SOURCESRC."</td><td>".$row['source']."</th></tr>";
		        
	        $stmt2 = $pdo2->prepare("SELECT * FROM media WHERE ref=:ref");
	        $stmt2->bindParam ( ":ref", $row['media'], PDO::PARAM_STR );
	        $stmt2->execute();	
	        
	        while ( $row2 = $stmt2->fetch(PDO::FETCH_ASSOC ))
	           {
	           echo "<tr><th>".MEDIASRC."</td><td>".$row2['fichier']."</th></tr>";
	           // echo "<tr><td class='case'>".MEDIASRC."</td><td><img src='file:///".$row2['fichier']."'></td></tr>";
	           }
	          
	        }	    
	    echo "</table>";
	}
	else 
	{
			
		echo "<h3>".$GLOBALS['InfoPage']->titre."</h3>";
	    
	    $stmt = $pdo2->prepare("SELECT * FROM sources");
	    $stmt->execute();
	    ?>
	    
	    <div class="table-responsive">
	    
	    <table class="table table-bordered" id="dataTable">
	    
	    <thead>
	    <tr>
		    <th><?php echo REFSRC ?></th>
			<th><?php echo TITRESRC ?></th>
			<th><?php echo NOMSRC ?></th>
			<th><?php echo SOURCESRC ?></th>
			<th><?php echo MEDIASRC ?></th>
		</tr>
		</thead>
		
		<tfoot>
		<tr>
			<th><?php echo REFSRC ?></th>
			<th><?php echo TITRESRC ?></th>
			<th><?php echo NOMSRC ?></th>
			<th><?php echo SOURCESRC ?></th>
			<th><?php echo MEDIASRC ?></th>
		</tr>
		</tfoot>	
	    <tbody>
                   
		<?php
				
		while ( $row = $stmt->fetch(PDO::FETCH_ASSOC ))
			{
		    echo "<tr>";
		    echo "<td><a href='index.php?page=sources&ids=".$row['ref']."'>".$row['ref']."</a></td>";
		    echo "<td>".$row['titre']."</td>";
		    echo "<td>".$row['nom']."</td>";
		    echo "<td>".$row['source']."</td>";
		    echo "<td>".SRC_IMG_LINK."</td>";
		    echo "</tr>";
		    }
		
		?>
				
		</tbody>
    	</table>
        </div>
                
    <?php 
	}
    ?>   