/* --------------------------------------------------- */
/* JS qui gére le drag & drop des modules dans l'admin */
/* --------------------------------------------------- */

/* départ */

function onDragStart(event) {
    event
      .dataTransfer
      .setData('text/plain', event.target.id);

    event
      .currentTarget
      .style
  }

/* mouvement */

  function onDragOver(event) {
    event.preventDefault();
  }  

/* dépôt */

function onDrop(event) {
    const id = event
      .dataTransfer
      .getData('text');

    const draggableElement = document.getElementById(id);

    const dropzone = event.target;

    dropzone.appendChild(draggableElement);

    /* récup des coordonées du div au moment du dépôt */

    dragX = event.pageX, dragY = event.pageY;
    console.log("x=" + dragX + " et y="+ dragY + " element=" + draggableElement.id + " zone d'arrivée=" + dropzone.id );
    document.write('<?php echo "Test"; ?>');

    event
      .dataTransfer
      .clearData();
  }