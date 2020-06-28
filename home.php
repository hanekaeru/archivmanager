<?php session_start(); ?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="icon" href="favicon.ico">
    <title>ArchivesManager | Logiciel de gestion d'archives</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        
        <?php include('./includes/navbar.php'); ?>

        <?php include('./includes/menu_left_side.php'); ?>

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Bienvenue sur ArchivesManager, <?php echo $_SESSION['username']; ?> !</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Accueil</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Nombre de photos</h5>
                                        <div class="metric-value d-inline-block">
                                            <?php 
                                            require("./includes/database-infos.php");
                                            $sql = "select count(*) as nombre from article;";
                                            foreach ($conn->query($sql) as $row) {
                                                echo "<h1 class=\"mb-1\">" .  $row['nombre'] . "</h1>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Taille BDD</h5>
                                        <div class="metric-value d-inline-block">
                                        <?php 
                                            require("./includes/database-infos.php");
                                            $sql = "SELECT pg_size_pretty( pg_database_size('projet') ) as size;";
                                            foreach ($conn->query($sql) as $row) {
                                                echo "<h1 class=\"mb-1\">" .  $row['size'] . "</h1>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Nombre d'utilisateurs</h5>
                                        <div class="metric-value d-inline-block">
                                        <?php 
                                            require("./includes/database-infos.php");
                                            $sql = "select count(*) as nombre from users;";
                                            foreach ($conn->query($sql) as $row) {
                                                echo "<h1 class=\"mb-1\">" .  $row['nombre'] . "</h1>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Villes gérées</h5>
                                        <div class="metric-value d-inline-block">
                                        <?php 
                                            require("./includes/database-infos.php");
                                            $sql = "select count(*) as nombre from Villes_communes_loiret;";
                                            foreach ($conn->query($sql) as $row) {
                                                echo "<h1 class=\"mb-1\">" .  $row['nombre'] . "</h1>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Derniers enregistrements</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Réf.CINDOC</th>
                                                        <th class="border-0">Nombre</th>
                                                        <th class="border-0">Taille</th>
                                                        <th class="border-0">Type</th>
                                                        <th class="border-0">Année</th>
                                                        <th class="border-0">Ville</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php

                                                    require_once('./includes/database-infos.php');

                                                    $check_user = "SELECT * FROM (SELECT art.idarticle as idarticle, art.refcindoc as refcindoc, cli.nombre as nbcliche, cli.taille as taille, cli.couleurounb as couleur, dateF.année as année, geo.ville as ville
                                                    FROM article art, cliché cli, dateformat dateF, situationgéographique geo
                                                    WHERE 
                                                        art.cliché = cli.indexcliché
                                                    and art.situationgéographique = geo.indexlieu
                                                    and art.date = dateF.indexdate
                                                    LIMIT 5) SUB
                                                    ORDER BY idarticle ASC";

                                                    foreach ($conn->query($check_user) as $row) {
                                                        
                                                        echo "
                                                        <tr>
                                                            <td> " . $row['refcindoc'] . " </td>
                                                            <td> " . $row['nbcliche'] . " </td>
                                                            <td> " . $row['taille'] . " </td>
                                                            <td> " . $row['couleur'] . " </td>
                                                            <td> " . $row['année'] . " </td>
                                                            <td> " . $row['ville'] . " </td>
                                                        </tr>";

                                                    } 
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->    
                            <!-- ============================================================== -->
                        </div>

                        <div class="row">
                            
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- category revenue  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Inversible ou négatif ?</h5>
                                    <div class="card-body">
                                        <div id="c3chart_category" style="height: 420px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Noir et blanc ou couleur ?</h5>
                                    <div class="card-body">
                                        <div id="c3chart_noirblanc" style="height: 420px;"></div>
                                    </div>
                                </div>
                            </div>  

                        </div>
                    </div>
                </div>
            </div>
            <?php include('./includes/footer.php'); ?>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->

    <?php include('./includes/scripts.php'); ?>

    <script>
        var chart = c3.generate({
        bindto: "#c3chart_category",
        data: {
            columns: [
                ['Inversible', <?php 
                                    require("./includes/database-infos.php");
                                    $sql = "select count(*) as nb from cliché where négatifouinversible LIKE '%négatif%';";
                                    foreach ($conn->query($sql) as $row) {
                                        echo $row['nb'];
                                    }
                                    ?>],
                ['Négatif', <?php 
                                    require("./includes/database-infos.php");
                                    $sql = "select count(*) as nb from cliché where négatifouinversible LIKE '%inversible%';";
                                    foreach ($conn->query($sql) as $row) {
                                        echo $row['nb'];
                                    }
                                    ?>],
            ],
            type: 'donut',

            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); },

            colors: {
                Inversible: '#5969ff',
                Négatif: '#c815d9'

            }
        },
        donut: {
            label: {
                show: true
            }
        },

    });

    var chart = c3.generate({
        bindto: "#c3chart_noirblanc",
        data: {
            columns: [
                ['Noir', <?php 
                                    require("./includes/database-infos.php");
                                    $sql2 = "select count(*) as nb from cliché where CouleurOuNb LIKE '%nb%';";
                                    foreach ($conn->query($sql2) as $row) {
                                        echo $row['nb'];
                                    }
                                    ?>],
                ['Couleur', <?php 
                                    require("./includes/database-infos.php");
                                    $sql3 = "select count(*) as nb from cliché where CouleurOuNb LIKE '%couleur%';";
                                    foreach ($conn->query($sql3) as $row) {
                                        echo $row['nb'];
                                    }
                                    ?>],
            ],
            type: 'donut',

            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); },

            colors: {
                Noir: '#7F7F7F',
                Couleur: '#10631b'

            }
        },
        donut: {
            label: {
                show: true
            }
        },

    });

    
    </script>

</body>
 
</html>