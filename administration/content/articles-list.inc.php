<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>

<?php 
$utilisateur = new Utilisateurs();
$utilisateur->information($pdo, $_SESSION['login']);

$article = new articles();
$BaseDeDonnees = new BasesDeDonnees;

if(isset($_GET['id']) and isset($_GET['action']))
{
	switch ($_GET['action'])
	{
		case 'publish':
			/* Publication d'un article */
			/* NB : Si on republie un article qui dont la catégorie n'est plus publiée, il est tout de même publié dans cette catégorie */
			$sql = $pdo->prepare("UPDATE articles SET publication = '1' WHERE ref=:ref");
			$sql->bindparam ( ':ref', $_GET['id'] );
			$req = $sql->execute ();

			$msg = '<div class="alert alert-success d-flex align-items-center" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
	  		<div>'.ARTICLE_NB.$_GET['id'].ARTICLE_PUBLISHED.'</div></div>'; 

			/* Enregistrement de l'action dans le journal */	
			putOnLogB(ARTICLE_NB.$_GET['id'].ARTICLE_PUBLISHED);
			
			break;
		case 'unpublish':
			/* Dépublication d'un article */
			$sql = $pdo->prepare("UPDATE articles SET publication = '0' WHERE ref=:ref");
			$sql->bindparam ( ':ref', $_GET['id'] );
			$req = $sql->execute ();

			$msg = '<div class="alert alert-success d-flex align-items-center" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
	  		<div>'.ARTICLE_NB.$_GET['id'].ARTICLE_UNPUBLISHED.'</div></div>'; 
			
			/* Enregistrement de l'action dans le journal */
			putOnLogB(ARTICLE_NB.$_GET['id'].ARTICLE_UNPUBLISHED);
			
			break;
		case 'delete':
			$sql = $pdo->prepare('DELETE FROM articles WHERE ref=:ref');
			$sql->bindparam ( ':ref', $_GET['id'] );
			$req = $sql->execute ();
			$msg = '<div class="alert alert-success d-flex align-items-center" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
	  		<div>'.ARTICLE_NB.$_GET['id'].ARTICLE_DELETED.'</div></div>'; 

			/* Enregistrement de l'action dans le journal */
			putOnLogB(ARTICLE_NB.$_GET['id'].ARTICLE_DELETED);

			break;
		default:
			/* TODO: surement rien à mettre ici */
			break;
	}
}

?>

<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$utilisateur->login; ?>.</h1>
	
        <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=articles-list"><?php echo ASIDE_ADMIN_1; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_RUB_MODIF_A; ?></li>
		</ol>

        <div class="row">
        
        	<div class="col-xl-12">
				<div class="card mb-4">
					<div class="card-header">
						<i class="bi bi-newspaper me-2"></i><?php echo ADM_ARTICLE_LIST; ?>
					</div>
					<div class="card-body">
						<p><?php echo ADM_ARTICLE_MODIF_INTRO; ?></p>

				        <?php 
				        
				        /* Si le formulaire a été envoyé, on affiche le message qui correspond à l'action demandée */
				          
				        if(isset($msg))
				        	{
				        	echo $msg;
				            }
				                        
			            $nb_a = "SELECT * FROM articles ORDER BY date DESC";
			            $res_nb_a = $pdo->prepare ( $nb_a );
			            $res_nb_a->execute ();
              
              			?>
              
						<table class="table" id="datatablesSimple">
                  			<thead>
                    			<tr>
                      				<th>#</th>
			                      	<th><?php echo ADM_ARTICLE_TITLE; ?></th>
			                      	<th><?php echo ADM_ARTICLE_AUTHOR; ?></th>
			                      	<th><?php echo ADM_ARTICLE_CAT; ?></th>
			                      	<th><?php echo "date"; ?></th>
			                      	<th style="width: 3.5em;"><?php echo ADM_ART_EDIT; ?></th>
			                      	<th style="width: 3.5em;"><?php echo ADM_ART_SUPPR; ?></th>
			                      	<th style="width: 3.5em;"><?php echo ADM_ART_PUBLISH; ?></th>
                    			</tr>
                  			</thead>
                            <tfoot>
                  				<tr>
                      				<th>#</th>
				                    <th><?php echo ADM_ARTICLE_TITLE; ?></th>
				                    <th><?php echo ADM_ARTICLE_AUTHOR; ?></th>
				                    <th><?php echo ADM_ARTICLE_CAT; ?></th>
				                    <th><?php echo "date"; ?></th>
				                    <th style="width: 3.5em;"><?php echo ADM_ART_EDIT; ?></th>
				                    <th style="width: 3.5em;"><?php echo ADM_ART_SUPPR; ?></th>
				                    <th style="width: 3.5em;"><?php echo ADM_ART_PUBLISH; ?></th>
                    			</tr>
                  			</tfoot>  
                  			<tbody>
                   
                  			<?php
                  	
                  			foreach ($BaseDeDonnees->ListeTitreArticle($pdo) as $value) 
                  				{
                  				echo "<tr>";
                  				echo "<td>".$value['ref']."</td>";
                  				echo "<td>".$value['titre']."</td>";
                  				echo "<td>".RecupAuteurArticle($pdo, $value['auteur'])."</td>";
                  				echo "<td>".get_category_name($pdo, $value['id_cat'])."</td>";
                      			echo "<td>".$value['date']."</td>";
                  				echo '<td class="text-center"><a class="btn btn-link" href="index.php?page=article-edit&id='.$value['ref'].'" data-bs-toggle="tooltip" data-placement="left"><i class="bi bi-pencil-square text-success"></i></a>';
                        		echo '<td class="text-center"><button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#SupprArticle" data-bs-whatever="'.$value['ref'].'"><i class="bi bi-trash  text-danger"></i></button></td>';
                      
                     			if ($value['publication'] == '0')
                        			{
                        			echo '<td class="text-center"><button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#PublishArticle"  data-bs-whatever="'.$value['ref'].'"><i class="bi bi-star text-warning"></i></button></td>';
                        			}
                  				else
                        			{
                  		  			echo '<td class="text-center"><button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#UnPublishArticle" data-bs-whatever="'.$value['ref'].'"><i class="bi bi-star-fill text-warning"></i></button></td>';
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

  <!-- Modal qui confirme la volonté de supprimer un article -->
  
  <div class="modal fade" id="SupprArticle" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel"><?php echo SUPPR_ARTICLE_MODAL_TITLE; ?></h5>
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

    <!-- Modal qui confirme la volonté de publier un article -->
  
    <div class="modal fade" id="PublishArticle" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel"><?php echo SUPPR_ARTICLE_MODAL_TITLE; ?></h5>
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

    <!-- Modal qui confirme la volonté de dépublier un article -->
  
    <div class="modal fade" id="UnPublishArticle" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel"><?php echo SUPPR_ARTICLE_MODAL_TITLE; ?></h5>
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
  
  <!-- JS pour la modale qui confirme la suppression d'un article -->
  
  <script>
  var SupprArticle = document.getElementById('SupprArticle')
  SupprArticle.addEventListener('show.bs.modal', function (event) {
  
  var button = event.relatedTarget
  var recipient = button.getAttribute('data-bs-whatever')
  
  var modalTitle = SupprArticle.querySelector('.modal-title')
  var modalBodyInput = SupprArticle.querySelector('.ConfirmText')
  var modalLien = SupprArticle.querySelector('.truc')	
  
  modalTitle.textContent = '<?php echo SUPPR_ARTICLE_MODAL_TITLE; ?>' 
  modalBodyInput.textContent = "<?php  echo ADM_ART_CONFIRM_01; ?>" + recipient + " ?"
  modalLien.href = "index.php?page=articles-list&action=delete&id=" + recipient	  
  })
  </script>

  <!-- JS pour la modale qui confirme la publication d'un article -->
  
  <script>
  var PublishArticle = document.getElementById('PublishArticle')
  PublishArticle.addEventListener('show.bs.modal', function (event) {
  
  var button = event.relatedTarget
  var recipient = button.getAttribute('data-bs-whatever')
  
  var modalTitle = PublishArticle.querySelector('.modal-title')
  var modalBodyInput = PublishArticle.querySelector('.ConfirmText')
  var modalLien = PublishArticle.querySelector('.truc')	
  
  modalTitle.textContent = '<?php echo SUPPR_ARTICLE_MODAL_TITLE; ?>' 
  modalBodyInput.textContent = "<?php  echo ADM_ART_CONFIRM_02; ?>" + recipient + " ?"
  modalLien.href = "index.php?page=articles-list&action=publish&id=" + recipient	  
  })
  </script>
   
  <!-- JS pour la modale qui confirme la dépublication d'un article -->
  
  <script>
  var UnPublishArticle = document.getElementById('UnPublishArticle')
  UnPublishArticle.addEventListener('show.bs.modal', function (event) {
  
  var button = event.relatedTarget
  var recipient = button.getAttribute('data-bs-whatever')
  
  var modalTitle = UnPublishArticle.querySelector('.modal-title')
  var modalBodyInput = UnPublishArticle.querySelector('.ConfirmText')
  var modalLien = UnPublishArticle.querySelector('.truc')	
  
  modalTitle.textContent = '<?php echo SUPPR_ARTICLE_MODAL_TITLE; ?>' 
  modalBodyInput.textContent = "<?php  echo ADM_ART_CONFIRM_03; ?>" + recipient + " ?"
  modalLien.href = "index.php?page=articles-list&action=unpublish&id=" + recipient	  
  })
  </script>