/* ---------------------------- */
/* Pour la fixation du pillmenu */
/* ---------------------------- */

$(function () {
		  $(document).scroll(function () {
		    var $nav = $(".navbar-fixed-top");
		    // $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
		    $nav.toggleClass('scrolled', $(this).scrollTop() > 200);		   
		  });
		});

/* TinyMCE pour les commentaires */

tinymce.init({
	selector: 'textarea',
    menubar:false,
    language: "fr_FR",
    });