<!DOCTYPE html>
<?php
    session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    //Comprueba el usuario aceptado y trae datos
    include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\prepare_admin_user.php';

 ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Sebastian Gutierrez">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/icons/favicon.ico" />
    <title>Administrar Vehiculos</title>
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
          <a id="nav-link" class="navbar-brand" href="../paginas_administracion/vehiculos_administrativo.php">Administrar vehiculos<span class="sr-only">Home</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/principal_administrativo.php">Menu Principal<span class="sr-only">Vehiculos</span></a>
              </li>
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/marcas_administrativo.php">Marcas<span class="sr-only">Marcas</span></a>
              </li>
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/usuarios_administrativo.php">Usuarios<span class="sr-only">Usuarios</span></a>
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
            <h4>NUEVO <span id="title_red">VEHICULO</span></span></h4>
        </div>
      </div>
      <form class="" action="../paginas_funciones/nuevo_vehiculo.php" method="post" enctype="multipart/form-data" >
        <div id="form_vehiculos">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="sel_categoria"><strong>Categoria</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <select class="form-control" id="sel_categoria"  name="sel_categoria" required>
                  <?php
                      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_categorias.php';
                   ?>
                </select>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="sel-estado"><strong>Estado vehiculo</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <select class="form-control" id="sel_estado" name="sel_estado"  required>
                  <option value="Nuevo">Nuevo</option>
                  <option value="Usado">Usado</option>
                </select>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="sel-marca"><strong>Marca</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <select id="sel_marca" name="sel_marca" class="form-control" required>
                  <?php
                      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_marcas.php';
                   ?>
                </select>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="text_modelo"><strong>Modelo</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <input class="form-control" type="text" id="text_modelo" name="text_modelo" maxlength="13" placeholder="Ingrese un modelo" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="text_precio"><strong>Precio(CLP)</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <input type="text" name="text_precio" id="evento_miles" maxlength="10" class="form-control" onkeypress="return soloNumeros(event)" placeholder="Ingrese el valor de venta del vehiculo" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="text_color"><strong>Color</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
              <input type="text" id="text_color" name="text_color" class="form-control" maxlength="12" onkeypress="return soloLetras(event)"  placeholder="Ingrese el color del vehiculo" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="sel_año"><strong>Año</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <select id="sel_año" class="form-control" name="sel_año" required>
                      <option value="0">Año</option>
                      <?php
                      for($i=1990;$i<=2018;$i++) {
                         echo "<option value='".$i."'>".$i."</option>";
                      }

                    ?>
                </select>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="sel_combustible"><strong>Combustible</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <select id="sel_combustible" name="sel_combustible" class="form-control" required>
                  <?php
                    include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_combustibles.php';
                   ?>
                </select>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="sel_trasmision"><strong>Transmisión</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <select id="sel_trasmision" class="form-control" name="sel_trasmision" required>
                  <?php
                    include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_transmision.php';
                   ?>
                </select>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="text_kilometraje"><strong>Kilometraje</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <input type="text" id="text_kilometraje" class="form-control" name="text_kilometraje"  placeholder="Ingrese el kilometraje actual del vehiculo" maxlength="6" onkeypress="return soloNumeros(event)" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="text_cilindrada"><strong>Cilindrada</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <input type="text" id="text_cilindrada" class="form-control" name="text_cilindrada"  id="evento_miles2"  placeholder="Ingrese la cilindrada del vehiculo cc" maxlength="6" onkeypress="return soloNumeros(event)" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="sel_ubicacion"><strong>Ubicación</strong></label>
              </div>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <select id="sel_ubicacion" class="form-control" name="sel_ubicacion" required>
                    <?php
                      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_sucursales.php';
                     ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="text_equipamiento"><strong>Equipamiento</strong></label>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <textarea id="text_equipamiento" class="form-control" name="text_equipamiento"  style="height:100px" placeholder="Ingrese detalles del vehiculo" required></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="fotografia_1"><strong>Fotografia 1</strong></label>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <input type="file" id="fotografia_1" class="form-control" name="fotografia_1" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="fotografia_2"><strong>Fotografia 2</strong></label>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <input type="file" id="fotografia_2" class="form-control" name="fotografia_2" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="fotografia_3"><strong>Fotografia 3</strong></label>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <input type="file" id="fotografia_3" class="form-control" name="fotografia_3" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="fotografia_4"><strong>Fotografia 4</strong></label>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <input type="file" id="fotografia_4" class="form-control" name="fotografia_4" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="form-group">
                <label class="control-label" for="fotografia_5"><strong>Fotografia 5</strong></label>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <div class="form-group">
                <input type="file" id="fotografia_5" class="form-control" name="fotografia_5" required>
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
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4>VEHICULOS <span id="title_red">INGRESADOS</span></span></h4>
        </div>
      </div>
      <div id="form_vehiculos">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Codigo Vehiculo</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Estado</th>
                <th>Año</th>
                <th>Ver mas Detalles</th>
              </tr>
            </thead>
            <?php
              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\busqueda_vehiculos.php';
             ?>
          </table>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4>MODIFICAR <span id="title_red">VEHICULO</span></span></h4>
        </div>
      </div>
    <form action="../paginas_funciones/edicion_vehiculo.php" method="post">
      <div id="form_vehiculos">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
              <div class="form-group">
                <label for="nombre_auto_cambiar"><strong>Dato del vehiculo</strong></label>
              </div>
            </div>
            <div class="col-lg-9 col-md-6 col-sm-6 col-xs-6">
              <div class="form-group">
                <div class="">
                  <input type="text" id="nombre_auto_cambiar" class=" form-control" name="nombre_auto_cambiar" placeholder="Ingrese ID o Modelo del vehiculo" required>
                </div>
              </div>
            </div>
          </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <input type="submit" class="btn btn-success form-control" name="btn_ver" value="Ver Datos">
          </div>
        </div>
      </div>
    </form>
    <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4>ELIMINAR <span id="title_red">VEHICULO</span></span></h4>
        </div>
      </div>
      <div id="form_vehiculos">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
              <div class="form-group">
                <label for="nombre_auto_cambiar2"><strong>Dato del vehiculo</strong></label>
              </div>
            </div>
            <div class="col-lg-9 col-md-6 col-sm-6 col-xs-6">
              <div class="form-group">
                <div class="">
                  <input type="text" class="form-control" onkeypress="return soloNumeros(event)" name="nombre_auto_cambiar2"  value="" placeholder="Ingrese ID"  required>
                </div>
              </div>
            </div>
          </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="form-group">
            <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#modaleliminar">Eliminar</button>
          </div>
        </div>
      </div>
      <!--Modal confirmacion-->
      <div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit"  name="btn_eliminar" value="Eliminar">
            </div>
          </div>
        </div>
      </div>
      <!--Fin modal-->
    </div>
    <!--JavaScript al final para optimizar-->
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js">  </script>
    <script type="text/javascript" src="../js/bootstrap.bundle.js"> </script>
    <script src="../js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" ></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/jquery-ui.css">
    <!--Scripts para la busqueda dinamica-->
    <script type="text/javascript">
      <?php
        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\busqueda_dinamica_vehiculos.php';
       ?>
        $(document).ready(function(){
          var items = <?= json_encode($array_vehiculos)  ?>//trae el array desde el busqueda_dinamica_vehiculos.php
        $("#nombre_auto_cambiar").autocomplete({
          source: items
        });
      });
    </script>

    <!--------------------->
    <script language="javascript">
    //onkeypress="return soloNumeros(event)"
        function soloNumeros(e){
              key = e.keyCode || e.which;
              tecla = String.fromCharCode(key).toLowerCase();
              letras = " 0123456789";//caracteres permitidos
              especiales = "8-37-39-46";//teclas especiales ejem espacio, se puede ver en numero de la letra en el mapa de caracteres

              tecla_especial = false
              for(var i in especiales){
                   if(key == especiales[i]){
                       tecla_especial = true;
                       break;
                   }
               }

               if(letras.indexOf(tecla)==-1 && !tecla_especial){
                   return false;
               }
           }
           function soloLetras(e){
              key = e.keyCode || e.which;
              tecla = String.fromCharCode(key).toLowerCase();
              letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";//caracteres permitidos
              especiales = "8-37-39-46";//teclas especiales ejem espacio, se puede ver en numero de la letra en el mapa de caracteres

              tecla_especial = false
              for(var i in especiales){
                   if(key == especiales[i]){
                       tecla_especial = true;
                       break;
                   }
               }

               if(letras.indexOf(tecla)==-1 && !tecla_especial){
                   return false;
               }
           }
       </script>
       <script type="text/javascript">
             $("#evento_miles").on({
            "focus": function(event) {
              $(event.target).select();
            },
            "keyup": function(event) {
              $(event.target).val(function(index, value) {
                return value.replace(/\D/g, "")
                 //.replace(/([0-9])([0-9]{2})$/, '$1.$2')
                  .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
              });
            }
            });

            $("#evento_miles2").on({
           "focus": function(event) {
             $(event.target).select();
           },
           "keyup": function(event) {
             $(event.target).val(function(index, value) {
               return value.replace(/\D/g, "")
                //.replace(/([0-9])([0-9]{2})$/, '$1.$2')
                 .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
             });
           }
           });
       </script>

  </body>
</html>
