<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icons/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
            <input class="form-control mr-sm-2" type="search" name="busqueda_index" placeholder="Marcas, Modelo, Año.." aria-label="Search" maxlenght="15">
            <button class="btn btn-light my-2 my-sm-0 input_busqueda" name="btn_busc" value="Buscar" type="submit">Busca tu vehiculo</button>
          </form>
        </div>
      </nav>
    </header>
    <br>
    <div class="container-fluid">
      <section>
        <div class="text-center">
          <h3 class="title_historia_background">AUTOMOTORA CORDILLERA</h3>
        </div>
      </section>
      <section>
        <div class="container">
            <div class="text-center fondo_historia"></div>
        </div>
        <br>
      </section>
      <section>
        <div class="container">
          <div class="section_historia">
            <p>Automotora Cordillera nace en el año 2011, cuando su dueño Juan Pablo Montecinos, se da cuenta de las pocas facilidades que los clientes de escasos recursos tienen para poder acceder y lograr a concretar el tan ansiado sueño del auto propio. A raíz de esto, comienza a trabajar para revertir esta situación.</p>
              <p>Es así como en mayo del 2011, se da inicio a Automotora Cordillera, la cual en sus inicios comenzo como un negocio de compra de vehiculos usados para reventa.</p>
              <p>A la fecha, disponemos con un stock de más de 40 unidades 0 kilometros, dos sucursales, centro de financiamiento en nuestra oficina, servicio técnico y un grupo de profesionales, que estarán a su disposición para dar solución a todos sus requerimientos.</p>
          </div>
        </div>
      </section>
      <br>
      <br>
      <section>
        <div class="container" >
          <div style="padding:10px;">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="padding:4px;">
                <h3 class="title_vision_mision">VISIÓN</h3>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="padding:4px;">
                <img src="images\misionvision-y-valores.jpg" alt="" style="width:100%;">
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 d-none d-md-block" style="padding:4px;">
                <img src="images\misionvision-y-valores2.jpg" alt="" style="width:100%;">
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="padding:4px;">
                <h3 class="title_vision_mision">MISIÓN</h3>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <div class="col-lg-6 d-block d-md-none" style="padding:4px;">
                <img src="images\misionvision-y-valores2.jpg" alt="" style="width:100%;">
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="container">
          <div style="padding:10px;">
            <div class="row">
              <div class="col-lg-12" style="padding:4px;">
                <h3 class="title_vision_mision">VALORES</h3>
                <hr>
              </div>
              <div class="col-lg-12" style="padding:4px;">
                <div class="row">
                  <div class="col-lg-4 col-md-6" style="padding:5px;">
                    <div class=" div_valores">
                      <div class="container">
                        <h3 class="title_valores">COMPROMISO</h3>
                        <div class="content_valores">
                          <p>Nuestro conocimiento, experiencias y esfuerzo adquiridas a traves de los años son claves para poder ofrecer el mejor servicio a nuestros clientes. Le atenderemos siempre con una sonrisa, en un ambiente que promueva el enriquecimiento, en el cual se valoran y se respetan todas las opiniones e ideas.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6" style="padding:5px;">
                    <div class=" div_valores">
                      <div class="container">
                        <h3 class="title_valores">HONESTIDAD</h3>
                        <div class="content_valores">
                          <p>Con transparencia, honradez e integridad en nuestras relaciones del día a día, empezando por nosotros mismos y rechazando prácticas de negocio injustas, orientadas a obtener una ventaja particular y siendo ejemplo para los demás.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6" style="padding:5px;">
                    <div class=" div_valores">
                      <div class="container">
                        <h3 class="title_valores">PASIÓN</h3>
                        <div class="content_valores">
                          <p>Contamos con mas de 8 años de experiencia en el mundo automotriz, nos emocionamos con los vehiculos al igual que nuestros clientes. Recordando siempre nuestras raices, siempre soñamos con poder formar una organización con pasión dirigida a nuestros clientes </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
  </body>
</html>
