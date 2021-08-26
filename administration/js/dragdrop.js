var i = 0;
var tablo = new Array();

var dragged;

/* Les événements sont déclenchés sur les objets glissables */
document.addEventListener("drag", function( event ) {

}, false);

document.addEventListener("dragstart", function( event ) {
    // Stocke une référence sur l'objet glissable
    dragged = event.target;
    // transparence 50%
    event.target.style.opacity = .5;
}, false);

document.addEventListener("dragend", function( event ) {
    // réinitialisation de la transparence
    event.target.style.opacity = "";
}, false);

/* Les événements sont déclenchés sur les cibles du drop */
document.addEventListener("dragover", function( event ) {
    // Empêche le comportement par défaut afin d'autoriser le drop
    event.preventDefault();
}, false);

document.addEventListener("dragenter", function( event ) {
    // Met en surbrillance la cible de drop potentielle lorsque l'élément glissable y entre
    if ( event.target.className == "dropzone" ) {
        event.target.style.background = "rgba(0, 0, 0, 0.03)";
    }

}, false);

document.addEventListener("dragleave", function( event ) {
    // réinitialisation de l'arrière-plan des potentielles cible du drop lorsque les éléments glissables les quittent 
    if ( event.target.className == "dropzone" ) {
        event.target.style.background = "";
    }

}, false);

document.addEventListener("drop", function( event ) {
    // Empêche l'action par défaut (ouvrir comme lien pour certains éléments)
    event.preventDefault();
    // Déplace l'élément traîné vers la cible du drop sélectionnée
    if ( event.target.className == "dropzone" ) {
        event.target.style.background = "";
        dragged.parentNode.removeChild( dragged );
        event.target.appendChild( dragged );
    }

    /* récup des coordonées du div au moment du dépôt */
    /* y permettra de voir l'ordre des modules */
    /* dragged.id est le nom du module */
    /* dropzone.id est le nom de la zone d'arrivée */

    i++;
    dropzone = event.target;
    dragX = event.pageX, dragY = event.pageY;
    console.log("x=" + dragX + " et y="+ dragY + " element=" + dragged.id + " zone d'arrivée=" + dropzone.id );

    test = document.getElementById('test');
    test.innerHTML = dragged.id + " dans " + dropzone.id;

    // var tablo = [dragX, dragY, dragged.id, dropzone.id];
 
    tablo[i] = [dragX, dragY, dragged.id, dropzone.id];

    console.log(tablo[i]);
    console.log(i);
    console.log(tablo);

    /*
    $.ajax({ 
        type: "POST", 
        url: "#", 
        data: { tablo : tablo}, 
        success: function(data) { 
        document.write(data);
        } 
    }); 
    */  

    console.log(tablo.join());



    var lienModule = document.getElementById('lienModule');
    lienModule.href = tablo;	 

    var lienModule2 = document.getElementById('lienModule2');
    lienModule2.value = tablo.join();	 

}, false);

