<?php session_start(); ?>

<!doctype html>
<html lang="fr">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Tables</title>
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
                            <h2 class="pageheader-title">Affichage de la requête sélectionnée</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Accueil</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Visualisation</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Requête</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <?php
                        $requete_choisie = $_GET['request'];
                        require_once('./includes/database-infos.php');
                        if($requete_choisie == "all-articles-orleans") {
                            echo "Date de tous les articles sur Orléans";
                            $sql = "SELECT d.jour as jour, d.mois as mois, d.année AS annee
                            FROM DateFormat d, Article a, SituationGéographique s
                            WHERE d.IndexDate = a.Date
                            AND a.SituationGéographique = s.IndexLieu
                            AND s.Ville LIKE '%Orléans%'
                            AND d.jour IS NOT NULL
                            LIMIT 500;";

                            echo "
                            <div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12\">
                            <div class=\"card\">
                            <h5 class=\"card-header\">Résultat</h5>
                            <div class=\"card-body\">
                            <div class=\"table-responsive\">
                            <table class=\"table table-striped table-bordered first\">
                            <thead>
                            <tr>
                            <th>Jour</th>
                            <th>Mois</th>
                            <th>Année</th>
                            </tr>
                            </thead>
                            <tbody>";

                            foreach ($conn->query($sql) as $row) {
                                echo "
                                <tr>
                                <td>" . $row['jour'] . "</td>
                                <td>" . $row['mois'] . "</td>
                                <td>" . $row['annee'] . "</td>
                                </tr>";
                            }

                            echo "
                            </tbody>
                            <tfoot>
                            <tr>
                            <th>Jour</th>
                            <th>Mois</th>
                            <th>Année</th>
                            </tr>
                            </tfoot>
                            </table>
                            </div>
                            </div>
                            </div>
                            </div>";

                        } else if($requete_choisie == "where-jacques-chirac") {
                            echo "Où apparait Jacques CHIRAC ?";
                            $sql = "SELECT DISTINCT s.ville as ville
                            FROM SituationGéographique S, Article A, Personne P
                            WHERE S.IndexLieu=A.SituationGéographique
                            AND A.Personne=P.indexPersonne 
                            AND P.nom LIKE '%CHIRAC, Jacques%';";

                            echo "
                            <div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12\">
                            <div class=\"card\">
                            <h5 class=\"card-header\">Résultat</h5>
                            <div class=\"card-body\">
                            <div class=\"table-responsive\">
                            <table class=\"table table-striped table-bordered first\">
                            <thead>
                            <tr>
                            <th>Ville</th>
                            </tr>
                            </thead>
                            <tbody>";

                            foreach ($conn->query($sql) as $row) {
                                echo "
                                <tr>
                                <td>" . $row['ville'] . "</td>
                                </tr>";
                            }

                            echo "
                            </tbody>
                            <tfoot>
                            <tr>
                            <th>Ville</th>
                            </tr>
                            </tfoot>
                            </table>
                            </div>
                            </div>
                            </div>
                            </div>";

                        } else if($requete_choisie == "nombre-cliche-lieu") {
                            echo "Nombre de clichés par lieu";
                            $sql = "SELECT DISTINCT S.Ville as ville, count(*) as nb
                            FROM SItuationGéographique S, Article A
                            WHERE SituationGéographique = indexLieu
                            GROUP BY ville
                            ORDER BY ville ASC;";
                            echo "
                            <div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12\">
                            <div class=\"card\">
                            <h5 class=\"card-header\">Résultat</h5>
                            <div class=\"card-body\">
                            <div class=\"table-responsive\">
                            <table class=\"table table-striped table-bordered first\">
                            <thead>
                            <tr>
                            <th>Nombre De Cliché</th>
                            <th>Ville</th>
                            </tr>
                            </thead>
                            <tbody>";

                            foreach ($conn->query($sql) as $row) {
                                echo "
                                <tr>
                                <td>" . $row['nb'] . "</td>
                                <td>" . $row['ville'] . "</td>
                                </tr>";
                            }

                            echo "
                            </tbody>
                            <tfoot>
                            <tr>
                            <th>Nombre De Cliché</th>
                            <th>Ville</th>
                            </tr>
                            </tfoot>
                            </table>
                            </div>
                            </div>
                            </div>
                            </div>";
                        } else if($requete_choisie == "nombre-cliche-annee") {
                            echo "Nombre de clichés par année";
                            $sql = "SELECT distinct d.année as annee, count(c.indexcliché) as nb
                            FROM dateformat d, article a, cliché c
                            WHERE d.indexdate = a.date
                            AND a.cliché = c.indexcliché
                            AND d.année is not null
                            AND c.couleurounb = 'nb'
                            GROUP by d.année;";
                            echo "
                            <div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12\">
                            <div class=\"card\">
                            <h5 class=\"card-header\">Résultat</h5>
                            <div class=\"card-body\">
                            <div class=\"table-responsive\">
                            <table class=\"table table-striped table-bordered first\">
                            <thead>
                            <tr>
                            <th>Nombre De Cliché</th>
                            <th>Année</th>
                            </tr>
                            </thead>
                            <tbody>";

                            foreach ($conn->query($sql) as $row) {
                                echo "
                                <tr>
                                <td>" . $row['nb'] . "</td>
                                <td>" . $row['annee'] . "</td>
                                </tr>";
                            }

                            echo "
                            </tbody>
                            <tfoot>
                            <tr>
                            <th>Nombre De Cliché</th>
                            <th>Année</th>
                            </tr>
                            </tfoot>
                            </table>
                            </div>
                            </div>
                            </div>
                            </div>";
                        } else if($requete_choisie == "coordonnees-nom-status") {
                            echo "Coordonnées et nom de toutes les status";
                            $sql = "SELECT loi.coordonnees_gps AS localisation, p.nom AS nom
                            FROM villes_communes_loiret loi, situationgéographique situ, article a, personne p
                            WHERE a.situationgéographique = situ.indexlieu
                            AND a.personne = p.indexpersonne
                            AND p.nom LIKE '%statue%'
                            AND loi.nom_commune LIKE upper(situ.ville);";
                            echo "
                            <div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12\">
                            <div class=\"card\">
                            <h5 class=\"card-header\">Résultat</h5>
                            <div class=\"card-body\">
                            <div class=\"table-responsive\">
                            <table class=\"table table-striped table-bordered first\">
                            <thead>
                            <tr>
                            <th>Localisation</th>
                            <th>Nom</th>
                            </tr>
                            </thead>
                            <tbody>";

                            foreach ($conn->query($sql) as $row) {
                                echo "
                                <tr>
                                <td>" . $row['localisation'] . "</td>
                                <td>" . $row['nom'] . "</td>
                                </tr>";
                            }

                            echo "
                            </tbody>
                            <tfoot>
                            <tr>
                            <th>Localisation</th>
                            <th>Nom</th>
                            </tr>
                            </tfoot>
                            </table>
                            </div>
                            </div>
                            </div>
                            </div>";
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