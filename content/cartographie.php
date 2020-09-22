<?php

/* --------------------- */
/* CARTOGRAPHIE AVEC OSM */
/* --------------------- */

?>

<h3><?php echo $GLOBALS['InfoPage']->titre; ?></h3>

<?php
if (VerifGedcom ( $pdo2 ) == "1") {
?>

<div id="mapid"></div>

<script>

//Pour centrer la carte

var mymap = L.map('mapid').setView([51.505, -0.09], 13);

// affichage du fond de carte

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
	minZoom: 0,
	maxZoom: 18,
	zoomSnap: 0,
	zoomDelta: 0.25,
	attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
		         '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				 'Imagery © <a href="http://mapbox.com">Mapbox</a>',
    id:  'mapbox.streets'
	}).addTo(mymap);

/* Géolocalisation pour la France */

var points = [
		
<?php

$req = $pdo2->query ( "select * from lieux, villes_france WHERE lieux.ville LIKE villes_france.nom_commune AND villes_france.codepostal = lieux.cp" );

while ( $coord = $req->fetch ( PDO::FETCH_ASSOC ) )
{
	echo "[" . $coord ['latitude'] . "," . $coord ['longitude'] . "," . $coord ['ref'] . "],";
}

?>

</script>

<?php
}
?>