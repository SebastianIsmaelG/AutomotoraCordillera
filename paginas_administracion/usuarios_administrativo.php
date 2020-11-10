<!DOCTYPE html>
<?php
  session_start();
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  //Comprueba el usuario aceptado y trae datos
  include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\prepare_admin_user.php';

 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Sebastian Gutierrez">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/icons/favicon.ico" />
    <title>Usuarios Administrativo</title>
  </head>
  <body style="background-color:#ffff;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <img src="../images/Cordillera2.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-4 col-md-4 d-none d-md-block">

        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="" id="div_usuario">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="division_col_xs">
                <div class="">
                  <h5 >Usuario conectado: </h5>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="division_col_xs">
                <div class="">
                  <p><?php echo $ns; ?>  <?php echo $as; ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form class="" action="../paginas_funciones/logout.php" method="post">
                  <div class="text-right">
                    <input class="btn btn-danger" type="submit" value="Cerrar Sesión" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="container-fluid">
      <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbar_administracion" >
          <a id="nav-link" class="navbar-brand" href="../paginas_administracion/usuarios_administrativo.php">Administrar usuarios<span class="sr-only">Home</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/principal_administrativo.php">Menu Principal<span class="sr-only">Menu Principal</span></a>
              </li>
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/vehiculos_administrativo.php">Vehiculos<span class="sr-only">Vehiculos</span></a>
              </li>
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/marcas_administrativo.php">Marcas<span class="sr-only">Marcas</span></a>
              </li>
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/cotizaciones_administrativo.php">Cotizaciones<span class="sr-only">Cotizaciones</span></a>
              </li>
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/detalles_administrativo.php">Estadisticas</a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4>USUARIOS <span id="title_red">REGISTRADOS</span></span></h4>
        </div>
      </div>
      <div id="form_vehiculos">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Nombre Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Privilegio</th>
                <th>Email</th>
                <th>Modificar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <?php
              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\busqueda_usuarios.php';
             ?>
          </table>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4>NUEVO <span id="title_red">USUARIO</span></span></h4>
        </div>
      </div>
      <form class="" action="../paginas_funciones/nuevo_usuario.php" method="post" id="formCheckPassword">
        <div id="form_vehiculos">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label class="control-label" for="usuario"><strong>Nombre De Usuario</strong></label>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="form-group">
                  <input type="text" name="text_user" placeholder="Ingrese un nombre de usuario" class="form-control" id="usuario" autofocus required>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label class="control-label" for="password"><strong>Contraseña</strong></label>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="form-group">
                  <input type="password" class="form-control" name="password" id="password"required>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label class="control-label" for="cfmPassword"><strong>Confirme Contraseña</strong></label>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="form-group">
                  <input type="password" class="form-control" name="cfmPassword" id="cfmPassword" required>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label class="control-label" for="nombre_real"><strong>Nombre</strong></label>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="form-group">
                  <input type="text" id="nombre_real" class="form-control" name="nombre_real" placeholder="Ingrese su nombre" required>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label class="control-label" for="apellido_real"><strong>Apellido</strong></label>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="form-group">
                  <input type="text" class="form-control" id="apellido_real" name="apellido_real" placeholder="Ingrese su apellido" required>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                  <label class="control-label" for="email_real"><strong>Email</strong></label>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="form-group">
                  <input type="text" class="form-control" id="email_real" name="email" placeholder="Ingrese su email" required>
                </div>
              </div>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="submit" class="btn btn-success form-control" name="btn_guardar" value="Guardar">
            </div>
          </div>
        </div>
      </form>

    <!--JavaScript al final para optimizar-->
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/chat_menu.js"></script>
    <script src="../js/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>

    <script type="text/javascript">
              $("#formCheckPassword").validate({
               rules: {
                   password: {
                     required: true,
                        minlength: 6,
                        maxlength: 15,

                   } ,

                       cfmPassword: {
                        equalTo: "#password",
                         minlength: 6,
                         maxlength: 15
                   }


               },
          messages:{
             password: {
                     required:"Password Requerido",
                     minlength: "Minimo 6 caracteres",
                     maxlength: "Maximo 10 caracteres"
                   },
           cfmPassword: {
             equalTo: "El password debe ser igual al anterior",
             minlength: "Minimo 6 caracteres",
             maxlength: "Maximo 10 caracteres"
           }
          }

          });
    </script>

    <script type="text/javascript">
          $(document).ready(function(){

                var consulta;
                //hacemos focus
                $("#usuario").focus();
                //comprobamos si se pulsa una tecla
                $("#usuario").keyup(function(e){
                       //obtenemos el texto introducido en el campo
                       consulta = $("#usuario").val();
                       //hace la búsqueda
                       $("#resultado").delay(2000).queue(function(n) {
                            $("#resultado").html('<img src="/images/ajax-loader.gif" />');
                                  $.ajax({
                                        type: "POST",
                                        url: "/paginas_funciones/comprobar_usuario.php",
                                        data: "b="+consulta,
                                        dataType: "html",
                                        error: function(){
                                              alert("error petición ajax");
                                        },
                                        success: function(data){
                                              $("#resultado").html(data);
                                              n();
                                        }
                            });
                       });
                });
          });
    </script>
  </body>
</html>
