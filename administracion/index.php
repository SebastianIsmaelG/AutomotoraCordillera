<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../images/icons/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Index Administracion</title>
</head>

<body>
    <?php
    session_start();
    require_once 'controllers/UsuarioController.php';
    //si no hay session se va para el login
    if (!isset($_SESSION['usuario']) && (int)$_SESSION['privilegio'] !== 1) {
        header("Location:" . BASE_URL . "administrativo.php?error");
        exit();
    } else {
        //con el username y el privilegio vemos en la db sus otros datos;
        $usuarioEncontrado = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
        $privilegio = (int)$_SESSION['privilegio'];
        //buscamos en la db


        $usuarioController = new UsuarioController();
        $usuarioController->login($usuarioEncontrado);
    }
    ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
            <div class="p-2">
                <a id="nav-link" class="navbar-brand" href="">Menu Principal<span class="visually-hidden">Menu Principal</span></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li id="li_navbar" class="nav-item">
                        <a id="nav-link" class="nav-link" href="">Vehiculos<span class="visually-hidden">Vehiculos</span></a>
                    </li>
                    <li id="li_navbar" class="nav-item">
                        <a id="nav-link" class="nav-link" href="">Marcas<span class="visually-hidden">Marcas</span></a>
                    </li>
                    <li id="li_navbar" class="nav-item">
                        <a id="nav-link" class="nav-link" href="">Cotizaciones<span class="visually-hidden">Cotizaciones</span></a>
                    </li>
                    <li id="li_navbar" class="nav-item">
                        <a id="nav-link" class="nav-link" href="">Estadisticas<span class="visually-hidden">Estadisticas</span></a>
                    </li>
                    <li id="li_navbar" class="nav-item">
                        <a id="nav-link" class="nav-link" href="">Usuarios<span class="visually-hidden">Usuarios</span></a>
                    </li>
                </ul>
            </div>
            <div class="p-2">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>
    <h1> <?php  ?> </h1>
</body>

</html>