<?php

include ('../config.php');
require ('../content/fonctions.php');
include ('include/langue.php');


if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) 
    {
	// on teste si une entrée de la base contient ce couple login / pass

    /*
	$sql = 'SELECT count(*) FROM membre WHERE login="'.mysql_escape_string($_POST['login']).'" AND pass_md5="'.mysql_escape_string(md5($_POST['pass'])).'"';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = mysql_fetch_array($req);
    */

    $sql = 'SELECT * FROM membres WHERE login = "'.$_POST['login'].'" AND password = "'.$_POST['pass'].'"';

    $req = $pdo->prepare($sql);
    $req->execute();

	// si on obtient une réponse, alors l'utilisateur est l'admin, on crée la session
	if ($req->rowCount ()  == 1) 
        {
        session_start();
		$_SESSION['login'] = $_POST['login'];

        /* Enregistrement de l'action dans le journal */
		putOnLogB(OPEN_SESSION." ".$_SESSION['login']);
		header('Location: index.php');
		exit();
	    }

	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($req->rowCount () == 0) 
        {
        $erreur = LOG_NO_FND;
	    }
	// sinon, alors la, il y a un gros problème :)
	else 
        {
        $erreur = SESSION_ERROR_01;
	    }
	}
    else 
        {
        $erreur = SESSION_ERROR_02;
        }

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

        <!-- icons de Bootstrap visants à remplacer Fontawesome -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><?php echo SESSION_TTL; ?></h3></div>
                                    <div class="card-body">

                                        <form action="login.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="login"/>
                                                <label for="inputEmail"><?php echo SESSION_LOGIN; ?></label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="pass"/>
                                                <label for="inputPassword"><?php echo SESSION_PWD; ?></label>
                                            </div>
                                            <div class="d-grid d-md-flex justify-content-md-end mt-3">
                                                <button class="btn btn-primary" type="submit"><?php echo SESSION_BTN; ?></button>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($erreur))
                                            {
                                            echo '<div class="alert alert-danger d-flex align-items-center mt-2" role="alert">';
                                            echo '<i class="bi bi-exclamation-triangle-fill me-2"></i>'.$erreur;
                                            echo '</div>';

                                            /* Enregistrement de l'action dans le journal */
                                            putOnLogB($erreur);
                                            }
                                        ?>

                                    </div>
                                    
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a class="small" href="password.php"><?php echo SESSION_FGT_PWD; ?></a></div>
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
