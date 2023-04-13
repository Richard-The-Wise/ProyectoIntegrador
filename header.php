<header>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="./admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="header_estilo.css">

    <h1 class="nombre-negocio"><a style="text-decoration: none; color:white;"
            href="<?= isset($_SESSION['user']) ? "index_view.php" : "index.php"; ?>">Boletera Integra</a></h1>
    <nav>
        <ul>
            <li><a href="<?= isset($_SESSION['user']) ? "index_view.php" : "index.php"; ?>">Inicio</a></li>
            <?= isset($_SESSION['user']) ? "":"<li><a href='login.php'>Iniciar Sesión</a></li>"; ?>
            <li><a href="contacto.php">Contacto</a></li>
            <?= (isset($_SESSION['user']) && $_SESSION['user'] == "admin") ? "<li><a href='./admin/index.html'>Administrar</a></li>" : ""; ?>
            <?= isset($_SESSION['user']) ? "<li class='nav-item dropdown no-arrow'>
                            <a class='nav-link dropdown-toggle' href='#'  role='button'
                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span>" . $_SESSION['user'] . "</span>
                            </a>

                            <div class='dropdown-menu dropdown-menu-right'
                                aria-labelledby='userDropdown'>
                                <a class='dropdown-item' href='misBoletos.php'>
                                    <i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i>
                                    Mis boletos
                                </a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='index.php?logout'>
                                    <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>" : ""; ?>
        </ul>
    </nav>
    <!-- Bootstrap core JavaScript-->
    <script src="./admin/vendor/jquery/jquery.min.js"></script>
    <script src="./admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./admin/js/demo/chart-area-demo.js"></script>
    <script src="./admin/js/demo/chart-pie-demo.js"></script>
</header>