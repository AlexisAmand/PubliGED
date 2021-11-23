<div class="container-fluid px-4">

<?php 

$article = new articles();
$BaseDeDonnees = new BasesDeDonnees;

if(isset($_GET['id']) and isset($_GET['action']))
{
	switch ($_GET['action'])
	{
		case 'publish':
			/* On commence par publier la catégorie */
			$sql = $pdo->prepare("UPDATE categories SET publication = '1' WHERE ref=:ref");
			$sql->bindparam ( ':ref', $_GET['id'] );
			$req = $sql->execute ();

			/* Puis on publie les articles de la catégorie correspondante */
			$sql = $pdo->prepare("UPDATE articles SET publication = '1' WHERE id_cat=:ref"); 
			$sql->bindparam ( ':ref', $_GET['id'] );
			$req = $sql->execute ();

			$msg = '<div class="alert alert-success d-flex align-items-center" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
	  		<div>'.CAT_NB.$_GET['id'].CAT_PUBLISHED.'</div></div>'; 

			/* Enregistrement de l'action dans le journal */
			putOnLogB(CAT_NB.$_GET['id'].CAT_PUBLISHED);
			break;
		case 'unpublish':
			/* on commence par dépublier la catégorie */
			$sql = $pdo->prepare("UPDATE categories SET publication = '0' WHERE ref=:ref");
			$sql->bindparam ( ':ref', $_GET['id'] );
			$req = $sql->execute ();

			/* Puis on dépublie les articles de la catégorie correspondante */
			$sql = $pdo->prepare("UPDATE articles SET publication = '0' WHERE id_cat=:ref"); 
			$sql->bindparam ( ':ref', $_GET['id'] );
			$req = $sql->execute ();

			$msg = '<div class="alert alert-success d-flex align-items-center" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
	  		<div>'.CAT_NB.$_GET['id'].CAT_UNPUBLISHED.'</div></div>'; 
			
			/* Enregistrement de l'action dans le journal */
			putOnLogB(CAT_NB.$_GET['id'].CAT_UNPUBLISHED);
			break;
		case 'delete':
			$sql = $pdo->prepare('DELETE FROM categories WHERE ref=:ref');
			$sql->bindparam ( ':ref', $_GET['id'] );
			$req = $sql->execute ();

			/* TODO : Les articles qui font partis de la catégorie sont-ils supprimés ? */

			$msg = '<div class="alert alert-success d-flex align-items-center" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
	  		<div>'.CAT_NB.$_GET['id'].CAT_DELETED.'</div></div>'; 

			/* Enregistrement de l'action dans le journal */
			putOnLogB(CAT_NB.$_GET['id'].CAT_DELETED);
			break;
		default:
			/* TODO: surement rien à mettre ici */
			break;
	}
}

?>
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
			<li class="breadcrumb-item"><a href="index.php?page=cat-list"><?php echo CAT_BREAD; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_RUB_MODIF_C; ?></li>
		</ol>

        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-tags me-2"></i><?php echo ADM_RUB_MODIF_C; ?>
					</div>
					<div class="card-body">

              			<table class="table" id="datatablesSimple">
              
			            <?php
			            $req = $pdo->prepare ("SELECT * FROM categories");
			            $req->execute ();
			            ?>        
                
                  			<thead>
                   				<tr>
                      				<th>#</th>
                      				<th><?php echo ADM_CAT_NAME; ?></th>
                      				<th style="width: 3.5em;"><?php echo ADM_ART_EDIT; ?></th>
                      				<th style="width: 3.5em;"><?php echo ADM_ART_SUPPR; ?></th>
                      				<th style="width: 3.5em;"><?php echo ADM_ART_PUBLISH; ?></th>
                    			</tr>
                  			</thead>
                            <tfoot>
	                 			<tr>
	                      			<th>#</th>
	                      			<th><?php echo ADM_CAT_NAME; ?></th>
	                      			<th style="width: 3.5em;"><?php echo ADM_ART_EDIT; ?></th>
	                      			<th style="width: 3.5em;"><?php echo ADM_ART_SUPPR; ?></th>
	                      			<th style="width: 3.5em;"><?php echo ADM_ART_PUBLISH; ?></th>
	                    		</tr>
                  			</tfoot>  
                 			<tbody>
                   
		                  	<?php
		                 
		                  	while ($data = $req->fetch(PDO::FETCH_ASSOC))
		                    	{
		                      	echo "<tr>";
		                      	echo "<td>".$data ['ref']."</td>";
		                      	echo "<td>".$data ['nom']."</td>";
		                      	echo '<td class="text-center"><a href="index.php?page=cat-edit&cat='.$data['ref'].'" data-toggle="tooltip" data-placement="left" title="Editer"><i class="bi bi-pencil-square text-success"></i></a></td>';
		                      	echo '<td class="text-center"><button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#SupprCat" data-bs-whatever="'.$data['ref'].'"><i class="bi bi-trash  text-danger"></i></button></td>';                                
		                      	// echo '<td class="text-center"><a href="#"><i class="bi bi-star text-warning"></i></a></td>';

								if ($data['publication'] == '0')
								  {
								  echo '<td class="text-center"><button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#PublishCat"  data-bs-whatever="'.$data['ref'].'"><i class="bi bi-star text-warning"></i></button></td>';
								  }
								else
								  {
								  echo '<td class="text-center"><button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#UnPublishCat" data-bs-whatever="'.$data['ref'].'"><i class="bi bi-star-fill text-warning"></i></button></td>';
								  }	

		                        echo "</tr>";	                    
		                        }		                      
		                    ?> 
                                  
                  			</tbody>
                		</table>
              		</div>
                                    
				</div>

			</div> 
			
		</div>
		
</div>

<!-- Modal qui confirme la volonté de supprimer une catégorie -->

<div class="modal fade" id="SupprCat" tabindex="-1" role="dialog" aria-labelledby="SupprCatLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="SupprCatLabel"><?php echo SUPPR_CAT_MODAL_TITLE; ?></h5>
		<button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body"><p class="ConfirmText">&nbsp;</p></div>
	<div class="modal-footer">
		<button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo SUPPR_CAT_MODAL_NO; ?></button>
		<a class="btn btn-primary truc" href="#"><?php echo SUPPR_CAT_MODAL_YES; ?></a>
	</div>
	</div>
</div>
</div>

<!-- Modal qui confirme la volonté de publier une catégorie -->

<div class="modal fade" id="PublishCat" tabindex="-1" role="dialog" aria-labelledby="PublishCatLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="PublishCatLabel"><?php echo SUPPR_CAT_MODAL_TITLE; ?></h5>
		<button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		</div>
		<div class="modal-body"><p class="ConfirmText">&nbsp;</p></div>
		<div class="modal-footer">
		<button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo SUPPR_ARTICLE_MODAL_NO; ?></button>
		<a class="btn btn-primary truc" href="#"><?php echo SUPPR_ARTICLE_MODAL_YES; ?></a>
		</div>
	</div>
	</div>
</div>

<!-- Modal qui confirme la volonté de dépublier une catégorie -->

<div class="modal fade" id="UnPublishCat" tabindex="-1" role="dialog" aria-labelledby="UnPublishCatLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="UnPublishCatLabel"><?php echo SUPPR_CAT_MODAL_TITLE; ?></h5>
		<button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		</div>
		<div class="modal-body"><p class="ConfirmText">&nbsp;</p></div>
		<div class="modal-footer">
		<button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo SUPPR_ARTICLE_MODAL_NO; ?></button>
		<a class="btn btn-primary truc" href="#"><?php echo SUPPR_ARTICLE_MODAL_YES; ?></a>
		</div>
	</div>
	</div>
</div>

<!-- JS pour la modale qui confirme la publication d'une catégorie -->

<script>
var PublishCat = document.getElementById('PublishCat')
PublishCat.addEventListener('show.bs.modal', function (event) {

var button = event.relatedTarget
var recipient = button.getAttribute('data-bs-whatever')

var modalTitle = PublishCat.querySelector('.modal-title')
var modalBodyInput = PublishCat.querySelector('.ConfirmText')
var modalLien = PublishCat.querySelector('.truc')	

modalTitle.textContent = '<?php echo SUPPR_CAT_MODAL_TITLE; ?>' 
modalBodyInput.textContent = "<?php echo ADM_CAT_CONFIRM_02; ?>" + recipient + " ?"
modalLien.href = "index.php?page=cat-list&action=publish&id=" + recipient	  
})
</script>

<!-- JS pour la modale qui confirme la dépublication d'une catégorie -->

<script>
var UnPublishCat = document.getElementById('UnPublishCat')
UnPublishCat.addEventListener('show.bs.modal', function (event) {

var button = event.relatedTarget
var recipient = button.getAttribute('data-bs-whatever')

var modalTitle = UnPublishCat.querySelector('.modal-title')
var modalBodyInput = UnPublishCat.querySelector('.ConfirmText')
var modalLien = UnPublishCat.querySelector('.truc')	

modalTitle.textContent = '<?php echo SUPPR_CAT_MODAL_TITLE; ?>' 
modalBodyInput.textContent = "<?php echo ADM_CAT_CONFIRM_03; ?>" + recipient + " ?"
modalLien.href = "index.php?page=cat-list&action=unpublish&id=" + recipient	  
})
</script>

<!-- JS pour la modale qui confirme la suppression d'une catégorie -->

<script>
var SupprCat = document.getElementById('SupprCat')
SupprCat.addEventListener('show.bs.modal', function (event) {

var button = event.relatedTarget
var recipient = button.getAttribute('data-bs-whatever')

var modalTitle = SupprCat.querySelector('.modal-title')
var modalBodyInput = SupprCat.querySelector('.ConfirmText')
var modalLien = SupprCat.querySelector('.truc')	

modalTitle.textContent = '<?php echo SUPPR_CAT_MODAL_TITLE; ?>' 
modalBodyInput.textContent = "<?php echo ADM_CAT_CONFIRM_01; ?>" + recipient + " ?"
modalLien.href = "index.php?page=cat-list&action=delete&id=" + recipient	  
})
</script>

