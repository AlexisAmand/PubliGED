window.addEventListener('DOMContentLoaded', event => {

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple, {
	    labels: {
	    placeholder: "Recherche...",
	    perPage: "{select} entrées par page",
	    noRows: "Pas de résultats",
	    info: "Affichage des éléments {start} à {end} sur {rows} éléments"  
		}
	});
    }
});



