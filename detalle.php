<head>
  <meta charset="utf-8">
  <meta name="author" content="Sebastian Gutierrez">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="shortcut icon" href="images/icons/favicon.ico" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <title>Detalles</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-header navbar-expand-lg my-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img src="images/Cordillera2.png" class="img-fluid" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link fw-bold" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="menu_busqueda.php?Estado=usados">Usados</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link fw-bold dropdown-toggle" href="#" id="navbarDropdownMarcas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Marcas
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMarcas">
                <?php include 'paginas_funciones/a_marcas.php'; ?> <!--Marcas con logo-->
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link fw-bold dropdown-toggle" href="#" id="navbarDropdownServicios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Servicios
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownServicios">
                <li>
                  <a class="dropdown-item" href="form_vehiculos.php">Compramos tu vehículo <span class="badge bg-success"><small>Nuevo</small></span></a>
                </li>
                <li><a class="dropdown-item" href="financiamiento.php">Financiamiento</a></li>
                <li><a class="dropdown-item" href="#">Servicio Técnico</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="historia.php">Quiénes Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="contacto.php">Contacto</a>
            </li>
          </ul>

          <form class="d-flex" method="get" action="menu_busqueda.php">
            <div class="search-container position-relative">
              <input class="form-control me-2" type="search" name="busqueda_index" placeholder="Buscar por Marcas, Modelo, Año..." aria-label="Buscar" maxlength="15">
              <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3"></i> <!-- Icono de lupa -->
            </div>
          </form>

        </div>
      </div>
    </nav>
  </header>
  <section>
    <!--Traemos datos de id vehiculo desde varias secciones de la pagina los if definen esos botones-->
    <?php
      if (isset($_POST["input_index"])) {

        if (!isset($_POST["value_carID"])) {
          echo "<script>window.location='index.php';</script>";
        } else {
          $id_vehiculo = $_POST["value_carID"];
          include 'paginas_funciones/menu_busqueda_detalle.php';
        }
      }
    ?>
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class='row'>
              <div class='col-12' >
                <div id='carouselExampleIndicators<?php echo 1; ?>' class='carousel slide' data-ride='carousel'>
                  <ol class='carousel-indicators'>
                    <li data-target='#carouselExampleIndicators<?php echo 1; ?>' data-slide-to='0' class='active'></li>
                    <li data-target='#carouselExampleIndicators<?php echo 1; ?>' data-slide-to='1'></li>
                    <li data-target='#carouselExampleIndicators<?php echo 1; ?>' data-slide-to='2'></li>
                    <li data-target='#carouselExampleIndicators<?php echo 1; ?>' data-slide-to='3'></li>
                    <li data-target='#carouselExampleIndicators<?php echo 1; ?>' data-slide-to='4'></li>
                  </ol>
                  <div class='carousel-inner'>
                    <div class='carousel-item active'>
                      <img class='d-block w-100' src='images/autos/<?php echo $foto1; ?>' alt='First slide'>
                    </div>
                    <div class='carousel-item'>
                      <img class='d-block w-100' src='images/autos/<?php echo $foto2; ?>' alt='Second slide'>
                    </div>
                    <div class='carousel-item'>
                      <img class='d-block w-100' src='images/autos/<?php echo $foto3; ?>' alt='Third slide'>
                    </div>
                    <div class='carousel-item'>
                      <img class='d-block w-100' src='images/autos/<?php echo $foto4; ?>' alt='Four slide'>
                    </div>
                    <div class='carousel-item'>
                      <img class='d-block w-100' src='images/autos/<?php echo $foto5; ?>' alt='Five slide'>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-12">
                <div class="vehiculo_data_nombre">
                  <h4 id="linear" class="upper">VEHICULO - <span><?php echo "$marca $modelo" ?></span></h4>
                </div>
              </div>
              <div class="col-12">
                <div class="container">
                  <div class='row'>
                    <div class='col-lg-6 col-md-6-col-sm-6 col-xs-12'>
                      <div class="form-group">
                        <div id="precio_div2">
                          <h4><?php echo $precio; ?></h4>
                        </div>
                      </div>
                    </div>
                    <div class='col-lg-6 col-md-6-col-sm-6 col-xs-12'>
                      <div class="form-group">
                        <button data-toggle='modal' data-target='#cotizacionmodal' type='button' class='btn btn-light' id='input_index2' value='cotizar'><span class='cotizar_label'>COTIZAR</span></button>
                      </div>
                    </div>
                  </div>
                  <!--modal cotizar-->
                  <div class='modal fade' id='cotizacionmodal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span id='title_red'>NOSOTROS</span></h5>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <div class='modal-body'>
                          <div class='container'>
                            <form action='paginas_funciones/guardar_cotizacion.php' method='post'>
                              <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <p class='upper'>COD:<?php echo $setcodigo, $setmarca, $setmodelo; ?></p>
                              </div>
                              <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='form-group'>
                                  <label for='nombres_cotizacion' class='sr-only control-label'>Nombre</label>
                                  <input type='text' class='form-control' id='nombres_cotizacion' name='nombres_cotizacion' placeholder='Nombre' required>
                                </div>
                              </div>
                              <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='form-group'>
                                  <label for='telefono_cotizacion' class='sr-only control-label'>Telefono</label>
                                  <input type='text' class='form-control' id='telefono_cotizacion' name='telefono_cotizacion' placeholder='Telefono' onkeypress='return soloNumeros(event)' maxlength='12' required>
                                </div>
                              </div>
                              <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='form-group'>
                                  <label for='mail_cotizacion' class='sr-only control-label'>Correo</label>
                                  <input type='email' class='form-control' id='mail_cotizacion' name='mail_cotizacion' placeholder='Email' required>
                                </div>
                              </div>
                              <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='form-group'>
                                  <label for='mensaje_cotizacion' class='sr-only control-label'>Correo</label>
                                  <textarea id='mensaje_cotizacion' class='form-control' placeholder='Mensaje' name='mensaje_cotizacion' rows='2'></textarea>
                                </div>
                              </div>
                              <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='form-group'>
                                  <div style='padding:3px;' class='g-recaptcha' data-sitekey='6Lcpuo4UAAAAAMCbzkor4R21kx0bynHK92ncR_lW'></div>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-dismiss='modal' id='input_index2'><span class='cotizar_label'>CERRAR</span></button>
                          <button type='submit' name='btn_guardar' class='btn btn-secondary' id='input_index2'><span class='cotizar_label'>ENVIAR DATOS</span></button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!--Fin modal-->
                </div>
              </div>
              <!--Ocultar este en md-->
              <div class="col-1g-12 col-md-12 col-sm-12 col-xs-12 d-none d-lg-block">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="vehiculo_data_nombre">
                      <h5 id="linear">ESPECIFICACIONES <span id="title_red">TECNICAS</span></h5>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div>
                      <div class='container'>
                        <div class='row'>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-car-40.png'></span> <?php echo $estado ?> </p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-fill-color-40.png'></span> <?php echo $color; ?></p>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u128.png'></span> <?php echo $combustible; ?></p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u129.png'></span> <?php echo $kilometraje ?> KM</p>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u131.png'></span> <?php echo $ano; ?></p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-engine-48.png'></span> <?php echo $cilindrada ?> cc</p>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u130.png'></span> <?php echo $transmision ?></p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-marcador-48.png'> <a target='_blank' href='contacto.php?ub=$setubicacion'> <?php echo $ubicacion ?></a> </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="vehiculo_data_nombre">
                      <h5 id="linear">DETALLES <span id="title_red">EQUIPAMIENTO</span></h5>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div id="div_automovils">
                      <p id='texto_equipamiento2'><?php echo $equipamiento ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="vehiculo_data_nombre">
                      <h5 id="linear">UBICACIÓN <span id="title_red">SUCURSAL</span></h5>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div id="div_automovils">
                      <iframe src="<?php echo $ubicacion; ?>" height="160px;" width="100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <footer class="bg-dark">
    <div class="container footer_data">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="py-3">
            <h6>Contactanos</h6>
            <div>
              <p><i class="fa-solid fa-clock mx-2"></i> Lunes a Viernes de 10:00 a 18:30 hrs - Sábados de 10:00 a 14:30 hrs </p>
            </div>
            <div>
              <p><i class="fa-solid fa-location-dot mx-2"></i> Las Tranqueras 1395, Vitacura, Región Metropolitana </p>
            </div>
            <div>
              <p><i class="fa-solid fa-headset mx-2"></i>(2) - 3246 8670 </p>
            </div>
            <div>
              <p><i class="fas fa-envelope mx-2"></i>contacto@autoscordillera.com </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="py-3">
            <h6>Redes Sociales</h6>
            <div>
              <a class="text-white text-decoration-none" href="#"><i class="fab fa-facebook"></i> Facebook </a>
            </div>
            <div>
              <a class="text-white text-decoration-none" href="#"><i class="fab fa-instagram"></i> Instagram </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="py-3">
            <h6>Enlaces Rapidos</h6>
            <div>
              <a class="text-white text-decoration-none" href="#">Catalogo de vehiculos</a>
            </div>
            <div>
              <a class="text-white text-decoration-none" href="#">Financiamiento</a>
            </div>
            <div>
              <a class="text-white text-decoration-none" href="#">Servicio Tecnico</a>
            </div>
            <div>
              <a class="text-white text-decoration-none" href="#">Compra vehiculos usados</a>
            </div>
            <div>
              <a class="text-white text-decoration-none" href="contacto.php">Contacto</a>
            </div>
            <div>
              <a class="text-white text-decoration-none" href="historia.php">Quienes Somos</a>
            </div>
            <div>
              <a class="text-white text-decoration-none" href="ingreso_administrativo.php">Ingreso Administrativo</a>
            </div>
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

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/chat_menu.js"></script>
</body>