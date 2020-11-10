<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Sebastian Gutierrez">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/icons/favicon.ico" />
  <title>Ingreso Administrativo</title>
</head>
<body style="background-color:#ffff;">
  <div class="container">
    <form action="paginas_funciones/login.php" method="post">
      <div id="contenedor_principalL">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <img src="images/Cordillera2.png" class="img-fluid"></img>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4>Ingreso Administración</h4>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
              <label for="txt_nombre_admin">Nombre Usuario: </label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
              <input type="text" class="form-control" name="txt_nombre_admin" id="txt_nombre_admin" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
              <label for="txt_password_admin">Contraseña: </label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
              <input type="password" class="form-control" id="txt_password_admin" name="txt_password_admin" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
              <label for="sel_privilegio">Ingreso: </label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
              <select name="sel_privilegio" id="sel_privilegio" class="form-control">
                    <option value="1">Administración</option>
                    <option value="2">Secretaría</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="form-group">
              <input type="submit" class=" form-control btn btn-primary" name="btn_ingreso" value="Ingresar">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</body>

</html>
