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
    <title>Formulario Venta Vehiculos</title>
  </head>
  <body class="fb">
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
    <section class="container_fluid">
      <div class="container-fluid">
        <div class="border-0 p-5 ">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container d-none d-sm-block ">
                      <img src="images/header-cl.png" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container">
                      <h1 class="font-weight-light lgtittle text-light">Compramos tu vehiculo al instante</h1>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="list-inline">
                          <li class="list-inline-item"><div><p class="span_iconos2"><span><img src="images/icons/icons8-fiat-500-filled-50.png" class="tamaño_iconos2"></span> Cotización en linea</p></div></li>
                          <li class="list-inline-item"><div><p class="span_iconos2"><span><img src="images/icons/icons8-lista-de-verificación-filled-50.png" class="tamaño_iconos2"></span> Inspección sin costo</p></div></li>
                          <li class="list-inline-item"><div><p class="span_iconos2"><span><img src="images/icons/icons8-montón-de-dinero-48.png" class="tamaño_iconos2"></span> Pago al instante</p></div></li>
                        </ul>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-warning btn-lg text-light " type="button" data-toggle='modal' data-target='#modal_form_vehiculos'>Tasar mi vehiculo</button>
                        <hr>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div>
                <ul class="list-group">
                  <li class="list-group-item li_option_list"><p><span><img src="images/icons/icons8-de-acuerdo-48.png" class="tamaño_iconos3"></span> Sin largos tramites ni tiempos de espera.</p></li>
                  <li class="list-group-item li_option_list"><p><span><img src="images/icons/icons8-de-acuerdo-48.png" class="tamaño_iconos3"></span> Recibimos vehiculos con deudas.</p></li>
                  <li class="list-group-item li_option_list"><p><span><img src="images/icons/icons8-de-acuerdo-48.png" class="tamaño_iconos3"></span> Tu vehiculo sera tasado por expertos.</p></li>
                  <li class="list-group-item li_option_list"><p><span><img src="images/icons/icons8-de-acuerdo-48.png" class="tamaño_iconos3"></span> Seguridad y confianza a toda prueba.</p></li>
                </ul>
              </div>
            </div>
          </div>
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
    <!--Inicio del modal tasar vehiculo form-->
    <!--Modal Cotizar-->
    <div class="modal fade" id="modal_form_vehiculos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container">
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                 <div class="container">
                   <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h5>Paso 1 - Datos de contacto</h5>
                     </div>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                <input class="form-control" type="text" name="txt_nombre" id="txt_nombre" placeholder="Nombres">
                              </div>
                              <div class="form-group">
                                <input class="form-control" type="text" name="txt_apellidos" id="txt_apellidos" placeholder="Apellidos">
                              </div>
                              <div class="form-group">
                                <input class="form-control" type="text" name="txt_telefono" id="txt_telefono" placeholder="Telefono">
                              </div>
                              <div class="form-group">
                                <input class="form-control" type="text" name="txt_email" id="txt_email" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <Select class="form-control">
                                  <option>Seleccione Region</option>
                                  <?php include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_region.php'; ?>
                                </Select>
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="comuna">
                              <!--Usar Ajax-->
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            </div>
                          </div>
                        </div>
                     </div>
                   </div>
                 </div>
              </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!--Fin Modal-->
    <!--Comienzo del codigo JAVASCRIPT--->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js">  </script>
    <script type="text/javascript" src="js/bootstrap.bundle.js"> </script>
    <script src="js/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" ></script>
    <script type="text/javascript" src="js/chat_menu.js"></script>
  </body>
</html>
