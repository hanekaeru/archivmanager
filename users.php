<?php session_start(); ?>

<!doctype html>
<html lang="fr">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste des utilisateurs | ArchivesManager</title>
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
                            <h2 class="pageheader-title">Utilisateurs</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Accueil</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Administration</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Affichage des utilisateurs</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Date d'inscription</th>
                                                <th>Rôle</th>
                                                <?php if(isset($_SESSION['id']) && $_SESSION['role'] == "admin"): ?>
                                                <th>Actions</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                            require_once('./includes/database-infos.php');

                                            $check_user = "SELECT * FROM users;";

                                            foreach ($conn->query($check_user) as $row) {
                                                
                                                echo "
                                                <tr>
                                                    <td> " . $row['id'] . " </td>
                                                    <td> " . $row['username'] . " </td>
                                                    <td> " . $row['email'] . " </td>
                                                    <td> " . $row['inscription_date'] . " </td>
                                                    <td> " . $row['role_user'] . " </td> ";

                                                    if(!($_SESSION['id'] == $row['id'])) {
                                                        echo "<td>
                                                        <a class=\"btn btn-primary\" href=\"edituser.php?user=". $row['id'] ."\" > Modifier </a>
                                                        <a class=\"btn btn-primary\" href=\"#\" " . $row['id'] ."\" data-toggle=\"modal\" data-target=\"#modal" . $row['id'] . "\"> Supprimer </a>
                                                        </td>";
                                                    }
                                                    
                                               echo "</tr>
                                                
                                                <div class=\"modal fade\" id=\"modal" . $row['id'] . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                                                    <div class=\"modal-dialog\" role=\"document\">
                                                        <div class=\"modal-content\">
                                                            <div class=\"modal-header\">
                                                                <h5 class=\"modal-title\" id=\"exampleModalLabel\">Confirmer la suppression ?</h5>
                                                                <a href=\"#\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                                                    <span aria-hidden=\"true\">&times;</span>
                                                                </a>
                                                            </div>
                                                            <div class=\"modal-body\">
                                                                <p>Êtes-vous sûr de vouloir supprimer l'utilisateur selectionné ?</p>
                                                            </div>
                                                            <div class=\"modal-footer\">
                                                                <a href=\"#\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Annuler</a>
                                                                <a href=\"deleteuser.php?user=" . $row['id'] . "\" class=\"btn btn-primary\">Supprimer</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                            
                                            } 
                                        ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Date d'inscription</th>
                                                <th>Rôle</th>
                                                <?php if(isset($_SESSION['id']) && $_SESSION['role'] == "admin"): ?>
                                                <th>Actions</th>
                                                <?php endif; ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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