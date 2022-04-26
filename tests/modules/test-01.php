<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style>

    #draggable1, #draggable2, #draggable3, #draggable4 {
      width: 100%;
      height: 25px;
      text-align: center;
      background: white;
      margin-top: 7px;
      margin-bottom:7px;
      border: 2px solid rgb(87, 85, 85);
    }

    .dropzone {
      /* width: 100%; */
      height: 50px;
      border:1px solid red;
      /* background: blueviolet; */ 
    }

    </style>

  </head>
  
<body>
 
<div class="container">

<h1>Hello, world!</h1>

<div class="row">

	<div class="col-2">
	
    	<div class="card m-3">
      		<div class="card-header">
      		Les modules dispos
      		</div>
	      	<div class="card-body">
		        <div class="dropzone" id="colo1">
		          <div id="draggable1" draggable="true" ondragstart="event.dataTransfer.setData('text/plain',null)">
		          Module 1
		          </div>
		          <div id="draggable2" draggable="true" ondragstart="event.dataTransfer.setData('text/plain',null)">
		          Module 2
		          </div>
		          <div id="draggable3" draggable="true" ondragstart="event.dataTransfer.setData('text/plain',null)">
		          Module 3
		          </div>
		          <div id="draggable4" draggable="true" ondragstart="event.dataTransfer.setData('text/plain',null)">
		          Module 4
		          </div>
		        </div>
      		</div>
    	</div>
    	
	</div>

 	<div class="col-10">

    	<div class="card m-3">
      		<div class="card-header">
      		Les modules dispos
      		</div>
      		<div class="card-body">
      		
    			<div class="row">
			        <div class="col-2" id="colo2">
			       		<div class="dropzone"></div>
			        </div>		
			        <div class="col-2" id="colo3">
			       		<div class="dropzone"></div>
			        </div>
			        <div class="col-2" id="colo4">
			        	<div class="dropzone"></div>
        			</div>
    			</div>  
    			
    			<div class="row mt-2">
			        <div class="col-2" id="colo2">
			       		<div class="dropzone"></div>
			        </div>		
			        <div class="col-2" id="colo3">
			       		<div class="dropzone"></div>
			        </div>
			        <div class="col-2" id="colo4">
			        	<div class="dropzone"></div>
        			</div>
    			</div>  
    			
    			<div class="row mt-2">
			        <div class="col-3" id="colo2">
			       		<div class="dropzone"></div>
			        </div>	
			        <div class="col-3" id="colo2">
			       		<div class="dropzone"></div>
			        </div>			
    			</div>  
    			
    			<div class="row mt-2">
			        <div class="col-3" id="colo2">
			       		<div class="dropzone"></div>
			        </div>	
			        <div class="col-3" id="colo2">
			       		<div class="dropzone"></div>
			        </div>			
    			</div>   
    			    			
			</div> 
		</div> 

	</div>  

</div>

</div>

<div class="d-grid d-md-flex justify-content-md-end mt-3">
  <a href="#" class="btn btn-sm btn-secondary" id="lienModule"><?php echo "Sauvegarder"; ?></a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>

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

    dropzone = event.target;
    dragX = event.pageX, dragY = event.pageY;
    console.log("x=" + dragX + " et y="+ dragY + " element=" + dragged.id + " zone d'arrivée=" + dropzone.id );

}, false);

</script>

</body>
</html>