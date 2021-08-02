	<h3><?php echo $GLOBALS['Page']->titre; ?></h3>
    	
    <?php 	
    if(VerifGedcom($pdo2) == "1")
		{
	    ?>	
	    	
			<div id="map" style="width: 100%;height: 600px;"></div>

	<script>

	/* TODO : mettre le setview sur un des sosa */

	var map = L.map("map").setView([50.3001, 3.3542], 5);

	var basemaps = [
		L.tileLayer("//stamen-tiles-{s}.a.ssl.fastly.net/toner-lite/{z}/{x}/{y}.png", {
			attribution:
				'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
			subdomains: "abcd",
			maxZoom: 20,
			minZoom: 0,
			label: "Toner Lite"
		}),
		L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
			attribution: '&copy; OpenStreetMap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
			maxZoom: 20,
			minZoom: 0,
			label: "Test fr"
		}),
		L.tileLayer("//stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}.png", {
			attribution:
				'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
			subdomains: "abcd",
			maxZoom: 20,
			minZoom: 0,
			label: "Terrain"
		}),
		L.tileLayer("//stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}.png", {
			attribution:
				'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
			subdomains: "abcd",
			maxZoom: 20,
			minZoom: 0,
			label: "Toner"
		}),
		L.tileLayer("//stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.png", {
			attribution:
				'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
			subdomains: "abcd",
			maxZoom: 16,
			minZoom: 1,
			label: "Watercolor"
		})
	];

	map.addControl(
		L.control.basemaps({
			basemaps: basemaps,
			tileX: 0,
			tileY: 0,
			tileZ: 1
		})
	);
				
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
	    marker[i].addTo(map);
	    marker[i].on('click', onMapClick);
	    };
	
	/* Cliquer  sur un marker ouvre une page */
	
	function onMapClick(e) 
		{
	    alert("la ville " + this.options.url);
	    window.open("index.php?page=lieuxpatro&id=" + this.options.url);
	 	}
	    
	</script>