<?php session_start(); ?>

<!doctype html>
<html lang="fr">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Utilisateur | ArchivesManager</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>

<body>

    <div class="dashboard-main-wrapper">
         
        <?php include('./includes/navbar.php'); ?>
        
        <?php include('./includes/menu_left_side.php'); ?>

        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Modification (utilisateur)</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Accueil</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Administration</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Données</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <?php

                        require_once('./includes/database-infos.php');
                        $check_user = "SELECT * FROM users WHERE id = " . $_GET['user'] . ";";
                        foreach ($conn->query($check_user) as $row) {
                            $_POST['id'] = $row['id'];
                            echo "<form action=\"./models/edit-confirm.php\" method=\"post\">
                                    <div class=\"form-group\">
                                        <label for=\"input-select\">Rôle</label>
                                        <select class=\"form-control\" name=\"role\" id=\"input-select\">
                                            <option value=\"visualisation\">visualisation</option>
                                            <option value=\"admin\">admin</option>
                                        </select>
                                    </div>
                                    <div class=\"form-group\">
                                        <label for=\"inputText3\" class=\"col-form-label\">ID</label>
                                        <input id=\"inputText3\" name=\"idUser\" type=\"text\" class=\"form-control\" value=\"" . $row['id'] . "\">
                                    </div>
                                    <div class=\"form-group\">
                                        <label for=\"inputText3\" class=\"col-form-label\">Date</label>
                                        <input id=\"inputText3\" name=\"date\" disabled type=\"text\" class=\"form-control\" value=\"" . $row['inscription_date'] . "\">
                                    </div>
                                    <div class=\"form-group\">
                                        <label for=\"inputText3\" class=\"col-form-label\">Nom d'utilisateur</label>
                                        <input id=\"inputText3\" name=\"username\" type=\"text\" class=\"form-control\" value=\"" . $row['username'] . "\">
                                    </div>
                                    <div class=\"form-group\">
                                        <label for=\"inputText3\" class=\"col-form-label\">Email</label>
                                        <input id=\"inputText3\" name=\"email\" type=\"text\" class=\"form-control\" value=\"" . $row['email'] . "\">
                                    </div>
                                    <div class=\"form-group\">
                                        <label for=\"inputText3\" class=\"col-form-label\">Mot de passe</label>
                                        <input id=\"inputText3\" name=\"password\" type=\"text\" class=\"form-control\" value=\"" . $row['password'] . "\">
                                    </div>
                                    <button type=\"submit\" class=\"btn btn-primary\">Sauvegarder</button>
                                </form>";
                        }
                    ?>
                </div>
                
            </div>

            <?php include('./includes/footer.php'); ?>

        </div>
    </div>
<!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
</body>
 
</html>