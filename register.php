<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>S'inscrire | ArchivesManager</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->

    

    <form class="splash-container" action="./models/register-confirm.php" method="post">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">S'inscrire</h3>
                <p>Veuillez saisir vos informations.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required placeholder="Utilisateur" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" name="password" type="password" required placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="password" required name="password-confirm" placeholder="Confirmation du mot de passe">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Créer un compte</button>
                </div>
                <?php
                    if((isset($_GET['error'])) && $_GET['error'] == "wrong_pass") {
                        echo "
                            <div class=\"alert alert-danger\" role=\"alert\">
                                Les mots de passe ne sont pas similaires.
                            </div>";
                    }
                ?>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" required type="checkbox"><span class="custom-control-label">En créant votre compte, vous acceptez <a href="#">les CGU du site.</a></span>
                    </label>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Déjà un compte ? <a href="login.php" class="text-secondary">Connectez-vous ici.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>