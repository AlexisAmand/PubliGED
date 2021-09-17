

<div class="container-fluid px-4">
	
    <h1 class="h3 mt-4"><?php echo HELLO." ".$_SESSION['login']; ?>.</h1>  
	
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php?page=main"><?php echo DASHBOARD; ?></a></li>
		    <li class="breadcrumb-item"><a href="index.php?page=articles-list">XXXX</a></li>
		    <li class="breadcrumb-item active" aria-current="page">XXXX</li>
		</ol>
        
    <div class="row">
        
        <div class="col-xl-12">
				  <div class="card mb-4">
					  <div class="card-header">
              <i class="bi bi-back me-2"></i><?php echo "XXXX" ?>
					  </div>
					  <div class="card-body">

                <div id="test"></div>

                <div class="row">

                  <div class="col">
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

                  <div class="col">
                    <div class="m-3 card">
                      <div class="card-header">
                      Le blog
                      </div>
                      <div class="card-body">
                          <div class="dropzone" id="colo2"></div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="m-3 card">
                      <div class="card-header">
                      La généalogie
                      </div>
                      <div class="card-body">
                          <div class="dropzone" id="colo3"></div> 
                      </div>
                    </div>
                  </div>

                </div>

                <div class="d-grid d-md-flex justify-content-md-end mt-3">
						  	  <a href="#" class="btn btn-sm btn-secondary" id="lienModule"><?php echo "Sauvegarder"; ?></a>
						    </div>

                <form method="POST" action="test-modules.php">
                  <input type='hidden' id="lienModule2" name='tablo'>
                  <button type="submit" class="btn btn-primary">Test</button>
                </form>

         	  </div>
          </div>
        </div>

    </div>

</div>