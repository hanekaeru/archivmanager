<!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            
                            <li class="nav-divider">
                                Visualisation
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="visualisation.php"><i class="fa fa-fw fa-table"></i>Données</a>
                            </li>
                            
                            <?php if($_SESSION['role'] == "admin"): ?>
                            <li class="nav-divider">
                                Administration
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="users.php"><i class="fa fa-fw fa-user"></i>Gestion des utilisateurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="add-article.php"><i class="fa fa-fw fa-plus"></i>Ajouter un article</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="requests.php"><i class="fa fa-fw fa-database"></i>Requêtes</a>
                            </li>

                            <?php endif; ?>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>