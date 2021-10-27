<?php

include ('../config.php');
require ('../content/fonctions.php');
include ('include/langue.php');

/* 
Start Bootstrap - SB Admin v7.0.2 (https://startbootstrap.com/template/sb-admin) 
Copyright 2013-2021 Start Bootstrap 
Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
Adapté par Alexis AMAND pour le projet PubliGED
*/ 

?>

<!DOCTYPE html>
<html lang="<?php echo chooseAdminLang($pdo) ?>">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo BCK_TITLE; ?></title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><?php echo PWD_FGT_TLT; ?></h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted"><?php echo PWD_FGT_TEXT;?></div>
                                        <form>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail"><?php echo PWD_FGT_EMAIL;?></label>
                                            </div>
                                            <div class="d-grid d-md-flex justify-content-md-end mt-3">
                                                <button class="btn btn-primary" type="submit"><?php echo PWD_FGT_RESET;?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a class="small" href="login.php"><?php echo PWD_FGT_LOGIN; ?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"><?php echo CREATED_BY.'<a href="https://www.publiged.com" title="site officiel du PubliGED">PubliGED</a><br />'; ?></div>
                            <div>
                                <a href="https://startbootstrap.com/"><?php echo FOOTER_CREDITS; ?></a>
                                &middot;
                                <a href="#"><?php echo FOOTER_LICENCE; ?></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
