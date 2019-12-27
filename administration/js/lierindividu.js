var dialogConfig =  {
		  title: 'Lier un individu',
		  body: {
		    type: 'panel',
		    items: [
		      {
		        type: 'input',
		        name: 'nomData',
		        label: 'Entrez le nom de la personne'
		      }
		    ]
		  },
		  buttons: [
		    {
		      type: 'cancel',
		      name: 'closeButton',
		      text: 'Annuler'
		    },
		    {
		      type: 'submit',
		      name: 'submitButton',
		      text: 'Ok',
		      primary: true
		    }
		  ],
		  initialData: {
		    // catdata: '',
		    isdog: false
		  },
		  onSubmit: function (api) {
		    var data = api.getData();    
		    var truc = data.nomData;
		    		    		    
		    /* Je suis sûr que je peux glisser du PHP là où il y a truc */
		    
		    var truc2 = "<?php echo 'toto'; ?>";
		    
		    tinymce.activeEditor.execCommand('mceInsertContent', false, '<a href="#">' + truc2 +'</a>');
		   
		    //tinymce.activeEditor.execCommand('mceInsertContent', false, '<a href="#">' + <?php if(isset($_GET['test'])) { echo $_GET['test']; } else { echo "oups"; } ?> + '</a>');
		    
		    //tinymce.activeEditor.execCommand('mceInsertContent', false, '<p>My ' + pet +'\'s name is: <strong>' + data.catdata + '</strong></p>');
		    api.close();
		  }
		};

tinymce.init({
	  selector: "textarea.individu",	  
	  /* ajouter un tableau dans tinymce */
	  /* plugins: "table", */
	  tools: "inserttable",
	  /* ajouter une image
	  plugins: "image", */
	  /* par défaut */
	  toolbar: "insertfile undo redo | dialog-example-btn | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
	  plugins: [
	  	"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	        "save table contextmenu directionality emoticons template paste textcolor"
	        ],
	        selector: 'textarea',
	        language: "fr_FR",
	        style_formats: [
	        { title: 'Bold text', inline: 'b' },
	        { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
	        { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
	        { title: 'Example 1', inline: 'span', classes: 'example1' },
	        { title: 'Example 2', inline: 'span', classes: 'example2' },
	        { title: 'Table styles' },
	        { title: 'Table row 1', selector: 'tr', classes: 'tablerow1' }
	        ],	        
	  height: 500,
	  // toolbar: true,
	  menubar: 'file edit insert view format table tools help custom',
	  menu: {
	    custom: { title: "généalogie", items: "basicitem nesteditem toggleitem" }
	  },
	  content_css: [
	    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	    '//www.tiny.cloud/css/codepen.min.css'
	  ],
	  setup: function (editor) {
	    //var toggleState = false;

	   editor.ui.registry.addButton('dialog-example-btn', {
		 text: 'Lier un individu',
     	 // icon: 'code-sample',
      		onAction: function () {
        	editor.windowManager.open(dialogConfig)
	      }
	    });
	  }
	});