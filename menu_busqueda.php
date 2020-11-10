<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Sebastian Gutierrez">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:900" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script async defer crossorigin="anonymous" src="js/sdk.js"></script>
    <link rel="shortcut icon" href="images/icons/favicon.ico" />
    <title>Busqueda Avanzada</title>
  </head>
  <body>
    <div id="fb-root"></div><!--FACEBOOK LINK-->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light navbar-default " style="background-color:#F8F8F9">
        <a class="navbar-brand" href="index.php"><img src="images/Cordillera2.png"  class="img-responsive" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menu_busqueda.php?Estado=usados">Usados</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Marcas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\a_marcas.php'; ?> <!--Marcas con logo-->
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Servicios
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="form_vehiculos.php">Compramos tu vehiculo <span class="badge badge-success"><small>Nuevo</small></span></a>
                <a class="dropdown-item" href="financiamiento.php">Financiamiento</a>
                <a class="dropdown-item" href="#">Servicio Tecnico</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="historia.php">Quienes Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacto.php">Contacto</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" method="get" action="menu_busqueda.php">
            <input class="form-control mr-sm-2" type="search" name="busqueda_index" placeholder="Marcas, Modelo, Año.." aria-label="Search" maxlength="15">
            <button class="btn btn-light my-2 my-sm-0 input_busqueda" name="btn_busc" value="Buscar" type="submit">Busca tu vehiculo</button>
          </form>
        </div>
      </nav>
    </header>
    <section class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="text-center" id="div_1">
            <h4>BUSCADOR <span style='color:#ff3333;'>SEMINUEVOS / USADOS</span></h4>
            <hr>
          </div>
          <form action="menu_busqueda.php" method="GET">
            <div class="row" style="margin:5px;">
                <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs" >
                  <label for="select_estado" class="sr-only" style="margin-right:5px;">Estado</label>
                  <select class="form-control" name="customRadioInline1" id="select_estado">
                    <option selected value="0">Estado</option>
                    <option value="0">Todos</option>
                    <option value="Nuevo">Nuevos</option>
                    <option value="Usado">Usados</option>
                  </select>
                </div>
                <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs" >
                  <label for="select_categoria" class="sr-only" style="margin-right:5px;">Categoria </label>
                  <select class="form-control col-12" name="sel_tipo" id="select_categoria">
                    <option selected value="0">Categoria</option>
                    <option value="0">Todos los disponibles</option>
                    <?php include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_categorias.php'; ?> <!--Marcas con logo-->
                  </select>
                </div>
                <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs" >
                  <label for="marca" class="sr-only" style="margin-right:5px;">Marca </label>
                  <select class="form-control" id="marca" name="marca">
                    <option selected  value="0">Marca</option>
                    <option value="0">Todas las disponibles</option>
                   <?php include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_marcas_index.php'; ?>
                  </select>
                </div>
                <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs" >
                    <div id="modelo" name="modelo">
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs" >
                  <label for="select_año_d" class="sr-only" style="margin-right:5px;">Año Desde </label>
                  <select class="form-control" id="select_año_d"  name="sel_año_desde" id="division_col_xs" >
                      <option selected  value="0">Año Desde</option>
                      <option value="0">Cualquiera</option>
                        <?php
                          for($i=1995;$i<=2018;$i++) {
                             echo "<option value='".$i."'>".$i."</option>";
                          }

                        ?>
                  </select>
                </div>
                <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs" >
                  <label for="select_año_h" class="sr-only" style="margin-right:5px;">Año Hasta </label>
                  <select class="form-control" id="select_año_h"  name="sel_año_hasta" id="division_col_xs" >
                      <option selected  value="0">Año Hasta</option>
                      <option value="0">Cualquiera</option>
                        <?php
                          for($i=1995;$i<=2018;$i++) {
                             echo "<option value='".$i."'>".$i."</option>";
                          }

                        ?>
                  </select>
                </div>
            </div>
            <div class="row" style="margin:5px;">
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                <input type="submit" class="btn btn-light input_busqueda col-lg-3 col-md-3 col-sm-6 col-xs-12"  name="btnindex_search" value="Buscar">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
              <div class="text-center" id="div_1">
                <h4 id="scrollHere" style='color:#ff3333;'>RESULTADOS</h4>
                <hr>
              </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
              <?php
                //Toma la variable desde el buscador avanzado en index
                if (isset($_GET["btnindex_search"])) {
                  $resultado_busqueda_index =$_GET["btnindex_search"];
                  include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\menu_busqueda.php';
                }
                //Toma la variable de la seccion del navbar marca y la almacena-->
                if (isset($_GET["codigoM"])) {
                  $codigoMarca = $_GET["codigoM"];
                  include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\menu_busqueda.php';
                }

                //Toma de variable de la seccion Boton Busqueda y la almacena-->
                if (isset($_GET["btn_busc"])) {
                  $resultado_index = $_GET["busqueda_index"];
                  include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\menu_busqueda.php';
                }
                //Busqueda desde el navbar USADOS
                if (isset($_GET["Estado"])) {
                  $buscarestados="usado";
                  include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\menu_busqueda.php';
                }

               ?>
          </div>
      </div>
    </section>
    <footer style="background-color:#252628">
      <div class="container footer_data">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 section_footer">
              <div>
                <h6>Contactanos</h6>
                <div class="recuadro_contacto_social">
                  <p class="text-muted"><span><img class="tamaño_iconos" src="images/icons/icons8-clock-50.png"></span>&nbsp;&nbsp;Lunes a Viernes de 10:00 a 18:30 hrs - Sábados de 10:00 a 14:30 hrs </p>
                </div>
                <div class="recuadro_contacto_social">
                  <p class="text-muted"><span><img class="tamaño_iconos" src="images/icons/icons8-region-50.png"></span>&nbsp;&nbsp;Las Tranqueras 1395, Vitacura, Región Metropolitana </p>
                </div>
                <div class="recuadro_contacto_social">
                  <p class="text-muted"><span><img class="tamaño_iconos" src="images/icons/icons8-phone-50.png"></span>&nbsp;&nbsp;(2) - 3246 8670 </p>
                </div>
                <div class="recuadro_contacto_social">
                  <p class="text-muted"><span><img class="tamaño_iconos" src="images/icons/icons8-secured-letter-32.png"></span>&nbsp;&nbsp;contacto@autoscordillera.com </p>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 section_footer">
            <div class="div_redesociales">
              <h6>Redes Sociales</h6>
              <div class="recuadro_contacto_social">
                <a href="#" class="text-muted"><span><img class="tamaño_iconos" src="images/icons/icons8-facebook-50.png"></span> Facebook </a>
              </div>
              <div class="recuadro_contacto_social">
                <a href="#" class="text-muted"><span><img class="tamaño_iconos" src="images/icons/icons8-instagram-500.png"></span> Instagram </a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 section_footer">
            <div>
              <h6>Enlaces Rapidos</h6>
              <div class="recuadro_contacto_social">
                <a href="#" class="text-muted">Catalogo de vehiculos</a>
              </div>
              <div class="recuadro_contacto_social">
                <a href="#" class="text-muted">Financiamiento</a>
              </div>
              <div class="recuadro_contacto_social">
                <a href="#" class="text-muted">Servicio Tecnico</a>
              </div>
              <div class="recuadro_contacto_social">
                <a href="#" class="text-muted">Compra vehiculos usados</a>
              </div>
              <div class="recuadro_contacto_social">
                <a href="contacto.php" class="text-muted">Contacto</a>
              </div>
              <div class="recuadro_contacto_social">
                <a href="historia.php" class="text-muted">Quienes Somos</a>
              </div>
              <div class="recuadro_contacto_social">
                <a href="ingreso_administrativo.php" class="text-muted">Ingreso Administrativo</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div id="creditos">
                <p class="text-muted text-right font-weight-light">2019 © Autos Cordillera — Diseño y desarrollo por Sebastian Gutierrez</p>
              </div>
          </div>
        </div>
      </div>
    </footer>
    <section class="chat_container">
      <div class="chat_button2">
        <div class="banner_container">
          <span class="banner_contacto">Contactanos via Messeger</span>
        </div>
      </div>
      <div class="chat_button">
        <div class="imagen_container">
          <img src="images/icons/messenger-48.png" class="img-fluid" alt="">
        </div>
      </div>
      <div class="chat_content">
        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAutomotora-Cordillera-298602454143345&tabs=messages&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
      </div>
    </section>

    <!--Comienzo del codigo JAVASCRIPT--->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/chat_menu.js"></script>
    <script src="js/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!--Twitter Script-->
    <script>
    window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
          t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "js/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
          t._e.push(f);
        };

        return t;
      }(document, "script", "twitter-wjs"));
    </script>
    <script language="javascript">
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

      $(document).ready(function(){
        cargaselectmodelo();
        $('#marca').change(function(){
          cargaselectmodelo();
        });
      })//lleva ;?

    </script>
    <script type="text/javascript">

      function cargaselectmodelo(){
        $.ajax({
          type:"POST",
          url:"paginas_funciones/select_busqueda_avanzada2.php",
          data:"marca="+ $('#marca').val(),
          success:function(r){
            $('#modelo').html(r);
          }
        });
      }

    </script>
    <!--JS CAPTHA-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </body>
</html>
