<?php

if(isset($_GET['id']) and isset($_GET['action']))
  {
  switch ($_GET['action']) 
    {
      case 'publish':
        /* Publication d'un commentaire */
        $sql = $pdo->prepare("UPDATE commentaires SET publication = '1' WHERE ref=:ref");
        $sql->bindparam ( ':ref', $_GET['id'] );
        $req = $sql->execute ();
        $msg = '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>'.COMM_NB.$_GET['id'].COMM_PUBLISHED.'</div></div>'; 

        /* Enregistrement de l'action dans le journal */
        putOnLogB(COMM_NB.$_GET['id'].COMM_PUBLISHED);
        break;
      case 'unpublish':
        /* dépublication d'un commentaire */
        $sql = $pdo->prepare("UPDATE commentaires SET publication = '0' WHERE ref=:ref");
        $sql->bindparam ( ':ref', $_GET['id'] );
        $req = $sql->execute ();
        $msg = '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>'.COMM_NB.$_GET['id'].COMM_UNPUBLISHED.'</div></div>'; 

        /* Enregistrement de l'action dans le journal */
		putOnLogB(COMM_NB.$_GET['id'].COMM_UNPUBLISHED);		
        break;
      case 'delete':
        /* Suppression d'un commentaire */
        $sql = $pdo->prepare('DELETE FROM commentaires WHERE ref=:ref');	
        $sql->bindparam ( ':ref', $_GET['id'] );
				$req = $sql->execute ();
        $msg = "<div class='alert alert-success d-flex align-items-center' role='alert'>"
				."<i class='bi bi-check-circle-fill me-2'></i>".COMM_NB.$_GET['id'].COMM_DELETED."</div>";

        /* Enregistrement de l'action dans le journal */
		putOnLogB(COMM_NB.$_GET['id'].COMM_DELETED);	
        break;
      default:
        # code...
        break;
    }
  }

?>

<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=comm-list"><?php echo ASIDE_ADMIN_2; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo ADM_COMM_LIST; ?></li>
		</ol>
        
    <div class="row">
        
      <div class="col-xl-12">
			    <div class="card mb-4">
					    <div class="card-header">
                <i class="bi bi-chat-text me-2"></i><?php echo ADM_COMM_GEST; ?>
					    </div>
					    <div class="card-body">

              <?php
              $sqlCommentaires = "SELECT * FROM commentaires";				
              $reqCommentaires = $pdo->prepare($sqlCommentaires);
              $reqCommentaires->execute();
              ?>
                  	                 	          
              <table class="table table-bordered" id="dataTable">
                <thead>
                  <tr>
                    <th>#</th>	
                    <th><?php echo ADM_COMM_DATE; ?></th>
                    <th><?php echo ADM_COMM_AUTHOR; ?></th>
                    <th><?php echo ADM_COMM_TITLE; ?></th>
                    <th><?php echo ADM_COMM_TEXT; ?></th>
                    <th style="width: 3.5em;"><?php echo ADM_COMM_EDIT; ?></th>
                    <th style="width: 3.5em;"><?php echo ADM_COMM_SUPPR; ?></th>
                    <th style="width: 3.5em;"><?php echo ADM_COMM_PUBLISH; ?></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>	
                    <th><?php echo ADM_COMM_DATE; ?></th>
                    <th><?php echo ADM_COMM_AUTHOR; ?></th>
                    <th><?php echo ADM_COMM_TITLE; ?></th>
                    <th><?php echo ADM_COMM_TEXT; ?></th>
                    <th style="width: 3.5em;"><?php echo ADM_COMM_EDIT; ?></th>
                    <th style="width: 3.5em;"><?php echo ADM_COMM_SUPPR; ?></th>
                    <th style="width: 3.5em;"><?php echo ADM_COMM_PUBLISH; ?></th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
                while ($rowCommentaires = $reqCommentaires->fetch(PDO::FETCH_ASSOC))
                	{
						      echo "<tr>";
						      echo "<td>".$rowCommentaires['ref']."</td>";
                  echo "<td>".$rowCommentaires['date_com']."</td>";
                  echo "<td>".$rowCommentaires['nom_auteur']."</td>";
                  echo "<td>";
                  echo "<a href='index.php?page=article&id=".$rowCommentaires ['id_article']."'>".RecupTitreArticle( $pdo, $rowCommentaires['id_article'] )."</a>"; 
                  echo "</td>";
                  echo "<td>".substr($rowCommentaires ['contenu'], 0, 150)."...</td>";						
                  echo '<td class="text-center"><a class="btn btn-link" href="index.php?page=comm-edit&id='.$rowCommentaires['ref'].'"><i class="bi bi-pencil-square text-success"></i></i></a></td>';
						      echo '<td class="text-center"><button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#SupprComm" data-bs-whatever="'.$rowCommentaires['ref'].'"><i class="bi bi-trash text-danger"></i></button></td>';
						
                  if ($rowCommentaires['publication'] == '0')
                      {
                      echo '<td class="text-center"><button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#PublishComm"  data-bs-whatever="'.$rowCommentaires['ref'].'"><i class="bi bi-star text-warning"></i></button></td>';
                      }
                  else
                      {
                      echo '<td class="text-center"><button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#UnPublishComm" data-bs-whatever="'.$rowCommentaires['ref'].'"><i class="bi bi-star-fill text-warning"></i></button></td>';
                      }
                  }
					      ?>
                </tbody>
                </table>
              </div>

            </div>
    
          </div> 
          
        </div>
        
</div>

<!-- Modal qui confirme la volonté de supprimer un commentaire -->

<div class="modal fade" id="SupprComm" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
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
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo SUPPR_COMM_MODAL_NO; ?></button>
        <a class="btn btn-primary truc" href="#"><?php echo SUPPR_COMM_MODAL_YES; ?></a>
      </div>
    </div>
  </div>
</div>

<!-- Modal qui confirme la volonté de publier un commentaire -->

<div class="modal fade" id="PublishComm" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
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
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo SUPPR_COMM_MODAL_NO; ?></button>
        <a class="btn btn-primary truc" href="#"><?php echo SUPPR_COMM_MODAL_YES; ?></a>
      </div>
    </div>
  </div>
</div>

<!-- Modal qui confirme la volonté de dépublier un commentaire -->

<div class="modal fade" id="UnPublishComm" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
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
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo SUPPR_COMM_MODAL_NO; ?></button>
        <a class="btn btn-primary truc" href="#"><?php echo SUPPR_COMM_MODAL_YES; ?></a>
      </div>
    </div>
  </div>
</div>

<!-- Modale qui confirme la suppression d'un commentaire -->

<script>
var SupprComm = document.getElementById('SupprComm')
SupprComm.addEventListener('show.bs.modal', function (event) {
  
var button = event.relatedTarget
var recipient = button.getAttribute('data-bs-whatever')

var modalTitle = SupprComm.querySelector('.modal-title')
var modalBodyInput = SupprComm.querySelector('.ConfirmText')
var modalLien = SupprComm.querySelector('.truc')	
  
modalTitle.textContent = '<?php echo SUPPR_COMM_MODAL_TITLE; ?>' 
modalBodyInput.textContent = "<?php echo ADM_COMM_CONFIRM_01; ?>" + recipient + " ?"
modalLien.href = "index.php?page=comm-list&action=delete&id=" + recipient
})
</script>

<!-- Modale qui confirme la publication d'un commentaire -->

<script>
var PublishComm = document.getElementById('PublishComm')
PublishComm.addEventListener('show.bs.modal', function (event) {
  
var button = event.relatedTarget
var recipient = button.getAttribute('data-bs-whatever')

var modalTitle = PublishComm.querySelector('.modal-title')
var modalBodyInput = PublishComm.querySelector('.ConfirmText')
var modalLien = PublishComm.querySelector('.truc')	
  
modalTitle.textContent = '<?php echo SUPPR_COMM_MODAL_TITLE; ?>' 
modalBodyInput.textContent = "<?php echo ADM_COMM_CONFIRM_02; ?>" + recipient + " ?"
modalLien.href = "index.php?page=comm-list&action=publish&id=" + recipient
})
</script>

<!-- TODO : JS pour la modale qui confirme la dépublication d'un commentaire -->

<script>
var UnPublishComm = document.getElementById('UnPublishComm')
UnPublishComm.addEventListener('show.bs.modal', function (event) {
  
var button = event.relatedTarget
var recipient = button.getAttribute('data-bs-whatever')

var modalTitle = UnPublishComm.querySelector('.modal-title')
var modalBodyInput = UnPublishComm.querySelector('.ConfirmText')
var modalLien = UnPublishComm.querySelector('.truc')	
  
modalTitle.textContent = '<?php echo SUPPR_COMM_MODAL_TITLE; ?>' 
modalBodyInput.textContent = "<?php echo ADM_COMM_CONFIRM_03; ?>" + recipient + " ?"
modalLien.href = "index.php?page=comm-list&action=unpublish&id=" + recipient
})
</script>