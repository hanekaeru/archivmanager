<!doctype html>
<html lang="fr">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Se connecter | ArchivesManager</title>
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

<body>
    <div class="splash-container">
        <div class="card ">
            <a class="navbar-brand" href="#">ArchivesManager</a>
            <span class="splash-description">Veuillez vous connecter.</span>
            <div class="card-body">
                <form method="post" action="./models/login-confirm.php">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Utilisateur" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Se souvenir de moi</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Se connecter</button>
                </form>
            </div>
            <?php
                    if((isset($_GET['success'])) && $_GET['success'] == "registred") {
                        echo "
                            <div class=\"alert alert-success\" role=\"alert\">
                                Inscription validée ! Connectez-vous.
                            </div>";
                    } else if((isset($_GET['error'])) && $_GET['error'] == "wrong_password") {
                        echo "
                            <div class=\"alert alert-danger\" role=\"alert\">
                                Mauvais mot de passe.
                            </div>";
                    } else if((isset($_GET['error'])) && $_GET['error'] == "no_user") {
                        echo "
                            <div class=\"alert alert-danger\" role=\"alert\">
                                Aucun utilisateur. Veuillez réessayer.
                            </div>";
                    }
                ?>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="register.php" class="footer-link">Créer un compte</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="password-reset.php" class="footer-link">Un problème ?</a>
                </div>
            </div>
        </div>
    </div>
  
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>