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
  <title>Administrar Cotizaciones</title>
</head>
  <body>
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
          <a id="nav-link" class="navbar-brand" href="../paginas_administracion/cotizaciones_administrativo.php">Administrar Cotizaciones<span class="sr-only">Administrar Cotizaciones</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/principal_administrativo.php">Menu Principal<span class="sr-only">Vehiculos</span></a>
              </li>
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/vehiculos_administrativo.php">Vehiculos<span class="sr-only">Vehiculos</span></a>
              </li>
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/usuarios_administrativo.php">Usuarios<span class="sr-only">Usuarios</span></a>
              </li>
              <li id="li_navbar" class="nav-item">
                <a id="nav-link" class="nav-link" href="../paginas_administracion/marcas_administrativo.php">Marcas<span class="sr-only">Marcas</span></a>
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
            <h4>COTIZACIONES <span id="title_red">PENDIENTES</span>&nbsp;&nbsp;<span class="text-muted" style="font-size:15px;">Cotizando vehiculo</span></h4>
        </div>
      </div>
      <div id="form_vehiculos">
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark" >
                <tr>
                  <th>Codigo</th>
                  <th>Fecha</th>
                  <th>Vehiculo*</th>
                  <th>Nombre </th>
                  <th>Telefono </th>
                  <th>Email </th>
                  <th>Mensaje</th>
                  <th>Pasar a</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <?php
                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\busqueda_cotizaciones.php';
               ?>
            </table>
          </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4>COTIZACIONES <span id="title_red">PENDIENTES</span>&nbsp;&nbsp;<span class="text-muted" style="font-size:15px;">Solo consultas</span></h4>
        </div>
      </div>
      <div id="form_vehiculos">
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark" >
                <tr>
                  <th>Codigo</th>
                  <th>Fecha</th>
                  <th>Nombre </th>
                  <th>Telefono </th>
                  <th>Email </th>
                  <th>Mensaje</th>
                  <th>Pasar a</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <?php
                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\busqueda_cotizaciones_consulta.php';
               ?>
            </table>
          </div>
      </div>
     <br>
     <hr>
     <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <h4>COTIZACIONES <span id="title_red">REALIZADAS</span></h4>
       </div>
     </div>
     <div id="form_vehiculos">
         <div>
           <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <input id="input_busqueda_cotizacion" onkeyup="busqueda_avanzada()" class="form-control" type="text" name="" value="" placeholder="Busqueda por cliente">
             </div>
           </div>
           <hr>
           <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="table-responsive">
                 <table class="table" id="tablacotizaciones">
                   <thead class="thead-dark" >
                     <tr>
                       <th>Codigo</th>
                       <th>Fecha</th>
                       <th>Cliente</th>
                       <th>Telefono </th>
                       <th>Email </th>
                       <th>Mensaje</th>
                     </tr>
                   </thead>
                   <?php
                     include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\busqueda_cotizaciones_comprobadas.php';
                    ?>
                 </table>
               </div>
             </div>
           </div>
         </div>
     </div>
        <br>
     <!--Mas-->

    <!--Javascript al final para optimizacion-->
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js">  </script>
    <script type="text/javascript" src="../js/bootstrap.bundle.js"> </script>
    <script src="../js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" ></script>
    <script type="text/javascript">
      function busqueda_avanzada() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("input_busqueda_cotizacion");
          filter = input.value.toUpperCase();
          table = document.getElementById("tablacotizaciones");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];//Toma el td 3->Cliente
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
    </script>

  </body>
</html>
