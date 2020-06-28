<?php session_start(); ?>

<!doctype html>
<html lang="fr">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ajouter Article | ArchivesManager</title>
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
                            <h2 class="pageheader-title">Ajouter un article</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Accueil</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Administration</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin: auto;">
                    <form method="POST" action="./models/add-confirm.php">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="inputText3" class="col-form-label">Description</label>
                                    <input id="inputText3" type="text" class="form-control" name="description_generale">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="inputText3" class="col-form-label">Remarques</label>
                                    <input id="inputText3" type="text" class="form-control" name="remarques">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="inputText3" class="col-form-label">Fichier numérique</label>
                                    <input id="inputText3" type="text" class="form-control" name="fichier_numerique">
                                </div>
                            </div>
                            <label for="inputText3" class="col-form-label">Notes de bas de page</label>
                            <input id="inputText3" type="text" class="form-control" name="notes_bas_de_page">

                            <label for="inputText4" class="col-form-label">Nombre de clichés</label>
                            <input id="inputText4" type="number" class="form-control" name="nb_cliches">

                            <label for="input-select">Couleur ou noir et blanc</label>
                            <select class="form-control" id="input-select" name="couleur_nb">
                                <option value="couleur">Couleur</option>
                                <option value="nb">Noir et blanc</option>
                            </select>

                            <label for="input-select">Négatif ou inversible</label>
                            <select class="form-control" id="input-select" name="negatif">
                                <option value="negatif">Négatif</option>
                                <option value="inversible">Inversible</option>
                            </select>

                            <label for="inputText3" class="col-form-label">Taille des clichés</label>
                            <input id="inputText3" type="text" class="form-control" name="taille_cliches">

                            <label for="inputText3" class="col-form-label">Personne</label>
                            <input id="inputText3" type="text" class="form-control" name="nom_personne">

                            <label for="inputText3" class="col-form-label">Description iconographique</label>
                            <input id="inputText3" type="text" class="form-control" name="desc_icono">

                            <label for="inputText3" class="col-form-label">Discriminant géographique</label>
                            <input id="inputText3" type="text" class="form-control" name="discriminant">

                            <label for="inputText3" class="col-form-label">Ville</label>
                            <input id="inputText3" type="text" class="form-control" name="ville">

                            <div class="form-row">
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="inputText4" class="col-form-label">Jour</label>
                                    <input id="inputText4" type="number" min="1" max="31" class="form-control" name="jour">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="inputText4" class="col-form-label">Mois</label>
                                    <input id="inputText4" type="text" class="form-control" name="mois">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label for="inputText4" class="col-form-label">Année</label>
                                    <input id="inputText4" type="number" min="0" max="16000" class="form-control" name="annee">
                                </div>
                            </div>

                            <label for="inputText3" class="col-form-label">Précision sur la date</label>
                            <input id="inputText3" type="text" class="form-control" name="datetxt">

                            <label for="inputText3" class="col-form-label">Référence Cindoc</label>
                            <input id="inputText3" type="text" class="form-control" name="cindoc">

                            <label for="inputText3" class="col-form-label">Série</label>
                            <input id="inputText3" type="text" class="form-control" name="serie">

                            <label for="inputText3" class="col-form-label">Sujet</label>
                            <input id="inputText3" type="text" class="form-control" name="sujet">

                            <hr>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>        
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