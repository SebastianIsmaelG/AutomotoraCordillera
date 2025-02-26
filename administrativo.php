<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/icons/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Ingreso Administrativo </title>
</head>

<body>
    <?php 
        require_once 'funciones/dbcall.php';
        require_once 'funciones/login.php';
    ?>
    <div class="container">
        <form action="administrativo.php" method="post">
            <div class="row">
                <div class="col-12">
                    <img src="images/Cordillera2.png" class="img-fluid"></img>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="container">
                        <h3>Ingreso Administración</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="container text-end">
                        <button onclick="window.history.back();" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Volver atrás
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container max-width-600">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nombreUsuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" aria-describedby="nombreUsuario" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="passwordUsuario" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="passwordUsuario" id="passwordUsuario">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="selectPrivilegio" class="form-label">Tipo de Ingreso </label>
                            <select name="selectPrivilegio" id="selectPrivilegio" class="form-control">
                                <option value="1">Administración</option>
                                <option value="2">Secretaríado</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" class=" form-control btn btn-primary" name="ingresoLogin" value="Ingresar">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>