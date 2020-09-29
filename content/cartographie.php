	<h3><?php echo $GLOBALS['InfoPage']->titre; ?></h3>
    	
    <?php 	
    if(VerifGedcom($pdo2) == "1")
		{
	    ?>	
	    	
		<div id="mapid" style="width: 100%;height: 600px;"></div>
		
		<script>
		
		var mymap = L.map('mapid').setView([50.3001, 3.3542], 5);
	
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			minZoom: 0,
			maxZoom: 18,
			zoomSnap: 0,
			zoomDelta: 0.25,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.streets'
		}).addTo(mymap);
				
		/* Géolocalisation pour la France */
	
		var points = [
		
		<?php

		$a = "";
		
		$req = $pdo2->query ( "select * from lieux, villes_france WHERE lieux.ville LIKE villes_france.nom_commune AND villes_france.codepostal = lieux.cp" );
		
		while ( $coord = $req->fetch (PDO::FETCH_ASSOC) )
		{
		   $a = $a."[".$coord['latitude'].",".$coord['longitude'].",".$coord['ref']."],";
		}    
			
		echo substr($a, 0, -1);
		
		/* Géolocalisation pour la Belgique */
											
		$req = $pdo2->query ( "select * from lieux, villes_belgique WHERE lieux.ville LIKE villes_belgique.name" );
											
		while ( $coord_B = $req->fetch (PDO::FETCH_ASSOC) ) 
			{	    
			    echo "[".$coord_B['latitude'].",".$coord_B['longitude'].",".$coord_B['ref']."],";
			}   	
	
		}
	else
		{
		echo NO_GEDCOM;
		}
		
	?>
	
	];       

	/* ajout des points sur la carte */
	
	var marker = [];
	var i;
	for (i = 0; i < points.length; i++) 
		{
		marker[i] = new L.Marker([points[i][0], points[i][1]], {url: points[i][2]});
	    marker[i].addTo(mymap);
	    marker[i].on('click', onMapClick);
	    };
	
	/* Cliquer  sur un marker ouvre une page */
	
	function onMapClick(e) 
		{
	    alert("la ville " + this.options.url);
	    window.open("index.php?page=lieuxpatro&id=" + this.options.url);
	 	}
	    
	</script>