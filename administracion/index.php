
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/icons/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Index Administracion</title>
</head>
<body>
    <?php
    require '../config.php';
    session_start();
    //si no hay session se va para el login
    if (!isset($_SESSION['usuario']) && (int)$_SESSION['privilegio'] !== 1){
        header("Location:".BASE_URL."administrativo.php?error");
        exit();
    }else {
        //con el username y el privilegio vemos en la db sus otros datos;
        $usuarioEncontrado = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
        $privilegio = (int)$_SESSION['privilegio'];
    }
?>    
</body>
</html>