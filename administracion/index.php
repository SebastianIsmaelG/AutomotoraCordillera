<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../images/icons/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Menu Administracion</title>
</head>

<body>
    <?php
    session_start();
    require_once '../config.php';
    require_once 'controllers/UsuarioController.php';
    //si no hay session se va para el login
    if (!isset($_SESSION['usuario']) && !isset($_SESSION['privilegio'])) {
        header("Location:" . BASE_URL . "administrativo.php?error");
        exit();
    } else {
        //con el username y el privilegio vemos en la db sus otros datos;
        $usuarioEncontrado = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
        $privilegio = (int)$_SESSION['privilegio'];
        //buscamos en la db


        $usuarioController = new UsuarioController();
        $datosUsuario = $usuarioController->login($usuarioEncontrado);
    }
    ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
            <div class="p-2">
                <a id="nav-link" class="navbar-brand" href="">Menu Principal<span class="visually-hidden">Menu Principal</span></a>
            </div>
            <div class="p-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenuPrincipal" aria-controls="navbarMenuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarMenuPrincipal">
                <ul class="navbar-nav mr-auto px-3">
                    <li class="nav-item"><a class="nav-link" href="">Vehiculos</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Marcas</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Cotizaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Estadisticas</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Usuarios</a></li>
                </ul>
                <div class="d-flex align-items-center px-3">
                    <span class="text-light me-2"><?php echo " " . htmlspecialchars($datosUsuario['nombres']) . " " . htmlspecialchars($datosUsuario['apellidos']); ?></span>
                    <form action="../funciones/logout.php" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
</body>

</html>