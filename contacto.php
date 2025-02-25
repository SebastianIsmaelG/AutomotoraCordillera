<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Sebastian Gutierrez">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icons/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Contactanos </title>
  </head>
  <body>
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
              <a class="nav-link" href="menu_busqueda.php?estado=usados&nav=buscar">Usados</a>
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
            <input class="form-control mr-sm-2" type="search" name="busqueda_index" placeholder="Marcas, Modelo, Año.." aria-label="Search" maxlenght="15">
            <button class="btn btn-light my-2 my-sm-0 input_busqueda" name="btn_busc" value="Buscar" type="submit">Busca tu vehiculo</button>
          </form>
        </div>
      </nav>
    </header>
    <br>
    <div class='container-fluid'>
      <section>
        <div class="text-center">
          <h3>¿DONDE NOS ENCONTRAMOS?</h3>
        </div>
        <br>
      </section>
      <section class="areamap">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
                  <div class="circlemap" id="scrollHere1">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3331.3961994531483!2d-70.55500888500409!3d-33.38682628079219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c9352cbe61f1%3A0x53eaf862e96dce97!2sLas+Tranqueras+1395%2C+Vitacura%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1553999263460!5m2!1ses!2scl" height="100%;" width="100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3);">
                  <div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <img src="images/sucursalTranqueras.jpg" alt="" class="photo_sucursal">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <h5 >SUCURSAL  <span id="title_red">TRANQUERAS</span></h5>
                    </div>
                    <div class="datos_sucursal">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><span id="title_red">Ubicación</span> &nbsp;&nbsp;Las Tranqueras N° 1395, Vitacura. Region Metropolitana.</p>
                        <p><span id="title_red">Horario de atención</span> &nbsp;&nbsp;Lunes a Viernes de 10:00 a 18:30.  Sabados de 10:00 a 14:30.</p>
                        <p><span id="title_red">Contacto</span> &nbsp;&nbsp;(2)32 468 670</p>
                        <p><span id="title_red">Email</span> &nbsp;&nbsp;contacto@autoscordillera.com.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <br>
      <section class="areamap">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="circlemap" id="scrollHere2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d832.2919572172204!2d-70.66524117079187!3d-33.44493379879845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c5abc84beaad%3A0x181aecedf6e7f4a9!2sAv.+Brasil+59%2C+Santiago%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1553999985715!5m2!1ses!2scl" height="100%;" width="100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3);">
                  <div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <img src="images/sucursalBrazil.jpg" alt="" class="photo_sucursal">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <h5>SUCURSAL  <span id="title_red">AV BRAZIL</span></h5>
                    </div>
                    <div class="datos_sucursal">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><span id="title_red">Ubicación</span> &nbsp;&nbsp;Avenida Brazil N° 159, Santiago. Region Metropolitana.</p>
                        <p><span id="title_red">Horario de atención</span> &nbsp;&nbsp;Lunes a Viernes de 10:00 a 18:30.  Sabados de 10:00 a 14:30.</p>
                        <p><span id="title_red">Contacto</span> &nbsp;&nbsp;(2)94 012 999</p>
                        <p><span id="title_red">Email</span> &nbsp;&nbsp;contacto@autoscordillera.com.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <br>
    </div>
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
    <!--COMIENZO DE CODIGO JAVASCRIPT------------------------------------------------------->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js">  </script>
    <script type="text/javascript" src="js/bootstrap.bundle.js"> </script>
    <script src="js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" ></script>
    <script type="text/javascript" src="js/chat_menu.js"></script>
    <!--Scroll Function-->
    <?php
      if (isset($_GET["ub"])) {
        $sucursalbuscada=$_GET["ub"];

        switch ($sucursalbuscada) {
          case 'Sucursal Las Tranqueras':
              echo "<script type='text/javascript'>
                    function setCookie(cname, cvalue) {
                    var d = new Date();
                    d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
                    var expires = 'expires='+d.toUTCString();
                    document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
                  }

                  function getCookie(cname) {
                    var name = cname + '=';
                    var ca = document.cookie.split(';');
                    for(var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length, c.length);
                        }
                    }
                    return '';
                  }


                  $(function(){
                  var isScroll = getCookie('isScroll');
                  if(isScroll == ''){
                  setCookie('isScroll', '0');
                  }
                  $('#btnSimulator').click(function(){
                      setCookie('isScroll', '1');
                      window.location.reload();
                  });



                    var isScroll = '1';

                  if(isScroll == '1'){
                    $('html, body').animate({
                        scrollTop: $('#scrollHere1').offset().top
                    }, 2000);
                  }

                  });
              </script>";

            break;
          case 'Sucursal Av.Brazil':
              echo "<script type='text/javascript'>
                function setCookie(cname, cvalue) {
                var d = new Date();
                d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
                var expires = 'expires='+d.toUTCString();
                document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
              }

              function getCookie(cname) {
                var name = cname + '=';
                var ca = document.cookie.split(';');
                for(var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return '';
              }


              $(function(){
              var isScroll = getCookie('isScroll');
              if(isScroll == ''){
              setCookie('isScroll', '0');
              }
              $('#btnSimulator').click(function(){
                  setCookie('isScroll', '1');
                  window.location.reload();
              });



                var isScroll = '1';

              if(isScroll == '1'){
                $('html, body').animate({
                    scrollTop: $('#scrollHere2').offset().top
                }, 2000);
              }

              });
          </script>";
            break;
          default:
            // code...
            break;
        }

      }

     ?>
  </body>
</html>
