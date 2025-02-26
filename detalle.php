<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="shortcut icon" href="images/icons/favicon.ico" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!--googleReCaptcha-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <title>Detalles</title>
</head>

<body>
  <?php 
    require_once 'funciones/dbcall.php';
    $arrayMarcas = 'funciones/arrayMarcas.php';
    $menuBusquedaDetalle = 'funciones/menuBusquedaDetalle.php';
  ?>
  <header>
    <nav class="navbar navbarHeader navbar-expand-lg ">
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
              <a class="nav-link fw-bold" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="busqueda.php?estado=usados&nav=buscar">Usados</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link fw-bold dropdown-toggle" href="#" id="navbarDropdownMarcas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Marcas
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMarcas">
                <?php require_once $arrayMarcas; ?>
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
              <a class="nav-link fw-bold" href="about.php">Quiénes Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="contacto.php">Contacto</a>
            </li>
          </ul>

          <form class="d-flex" method="get" action="busqueda.php">
            <div class="search-container position-relative">
              <input class="form-control me-2" type="search" name="src" placeholder="Buscar por Marcas, Modelo, Año..." aria-label="Buscar" maxlength="15">
              <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3"></i> <!-- Icono de lupa -->
            </div>
          </form>

        </div>
      </div>
    </nav>
  </header>
  <main>
    <!--Traemos datos de id vehiculo desde varias secciones de la pagina los if definen esos botones-->
    <?php
    if (!isset($_GET["id"]) || filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) === false  || filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) === NULL) {
      echo "<script>window.location='index.php';</script>";
    } else {
      $id_vehiculo = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
      require_once $menuBusquedaDetalle;
    }
    ?>
    
    <div class="container my-3">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <div class='container'>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="images/autos/<?= $foto1; ?>" class="d-block w-100" alt="Primer slide">
                </div>
                <div class="carousel-item">
                  <img src="images/autos/<?= $foto2; ?>" class="d-block w-100" alt="Segundo slide">
                </div>
                <div class="carousel-item">
                  <img src="images/autos/<?= $foto3; ?>" class="d-block w-100" alt="Tercer slide">
                </div>
                <div class="carousel-item">
                  <img src="images/autos/<?= $foto4; ?>" class="d-block w-100" alt="Cuarto slide">
                </div>
                <div class="carousel-item">
                  <img src="images/autos/<?= $foto5; ?>" class="d-block w-100" alt="Quinto slide">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-12">
              <div class="container my-2">
                <h1 class="upper linear openSans h4">VEHICULO - <?= "$marca $modelo" ?></h1>
              </div>
            </div>
            <div class="col-12">
              <div class="container my-2">
                <div class='row'>
                  <div class='col-lg-6 col-md-6-col-sm-6 col-xs-12'>
                    <div class="container-precio my-1">
                      <p class="py-2">$ <?= $precio; ?></p>
                    </div>
                  </div>
                  <div class='col-lg-6 col-md-6-col-sm-6 col-xs-12 text-center'>
                    <div>
                      <button type="button" class="btn btn-light btn-lg btn_cotizar_label" data-bs-toggle="modal" data-bs-target="#inputCotizacion"><span class='cotizar_label' value='cotizar'>COTIZAR</span></button>
                    </div>
                  </div>
                </div>
                <!--modal cotizar-->
                <div class="modal fade" id="inputCotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h2 class='modal-title h3' id='exampleModalLongTitle'>COTIZA CON <span class='title_red'>NOSOTROS</span></h2>
                        <button class='close' data-bs-dismiss="modal" aria-label='Close'>
                          <i class="fa-solid fa-xmark"></i>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="container">
                          <form id="formGuardarCotizacion" action="funciones/guardarCotizacion.php" method="post">
                            <div class="mb-3">
                              <p>COD: <?= $codigo . ' | Vehiculo ' . $marca . ' - ' . $modelo; ?></p>
                            </div>
                            <div class="mb-3">
                              <label for="nombres_cotizacion" class="form-label">Nombre</label>
                              <input type="text" class="form-control" id="nombres_cotizacion" name="nombres_cotizacion" placeholder="Nombre" required>
                            </div>
                            <div class="mb-3">
                              <label for="telefono_cotizacion" class="form-label">Telefono</label>
                              <input type="text" class="form-control" id="telefono_cotizacion" name="telefono_cotizacion" placeholder="Telefono" onkeypress="return soloNumeros(event)" maxlength="9" required>
                            </div>
                            <div class="mb-3">
                              <label for="mail_cotizacion" class="form-label">Correo</label>
                              <input type="email" class="form-control" id="mail_cotizacion" name="mail_cotizacion" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                              <label for="mensaje_cotizacion" class="form-label">Mensaje</label>
                              <textarea id="mensaje_cotizacion" class="form-control" placeholder="Mensaje" name="mensaje_cotizacion" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                              <div class="g-recaptcha" data-sitekey="6LdpddEqAAAAAF2HSEomw4_fCCzD2mH5z5qQySmo"></div>
                            </div>
                        </div>
                      </div>
                      <div class='modal-footer'>
                        <input type="hidden" name="vehiculo_visto" value="<?= $marca . ' - ' . $modelo ?>">
                        <button type='submit' name='btn_guardar' class=' input-index-modal ' id='input_index'><span>ENVIAR DATOS</span></button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!--Fin modal-->
              </div>
            </div>
            <div class="col-12 d-none d-lg-block">
              <div class="container my-2">
                <div class="row">
                  <div class="col-12">
                    <div>
                      <h2 class="linear upper h4">ESPECIFICACIONES <span class="title_red">TECNICAS</span></h2>
                    </div>
                  </div>
                  <div class="col-12">
                    <div>
                      <div class='container divGradient py-2 contentDetalles'>
                        <div class='row'>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                            <p><i class="fas fa-car"></i><span> ESTADO: </span> <?= $estado ?> </p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                            <p><i class="fas fa-palette"></i><span> COLOR: </span><?= $color; ?></p>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                            <p><i class="fas fa-gas-pump"></i><span> COMBUSTIBLE: </span> <?= $combustible; ?></p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                            <p><i class="fa-solid fa-gears"></i><span> TRANSMISIÓN: </span> <?= $transmision ?></p>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                            <p><i class="fa-solid fa-calendar"></i><span> AÑO: </span> <?= $ano; ?></p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                            <p><i class="fas fa-tachometer-alt"></i><span> KILOMETRAJE: </span> <?= $kilometraje ?> KM</p>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                            <p><i class="fa-solid fa-screwdriver-wrench"></i><span> CILINDRADA: </span> <?= $cilindrada ?> L</p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                            <p><i class="fa-solid fa-location-dot"></i> <a class="text-decoration-none" target='_blank' href='contacto.php?ub=$setubicacion'> <span> UBICACIÓN: </span> <?= $ubicacion ?></a> </p>
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
        <div class="col-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="container my-2">
                <div class="row">
                  <div class="col-12">
                    <div>
                      <h2 class="linear upper h4">DETALLES <span class="title_red">EQUIPAMIENTO</span></h2>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="container divGradient py-2">
                      <p class="contentDetalles"><?= $equipamiento ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="container my-2">
                <div class="row">
                  <div class="col-12">
                    <div class="vehiculo_data_nombre">
                      <h2 class="linear h4">UBICACIÓN <span class="title_red">SUCURSAL</span></h2>
                    </div>
                  </div>
                  <div class="col-12">
                    <div>
                      <iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3331.3962520354485
                        !2d<?= $longitud; ?>!3d<?= $latitud; ?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c9352d11aa21%3A0x69745e993d10a7e
                        !2sLas%20Tranqueras%201395%2C%207650192%20Vitacura%2C%20Regi%C3%B3n%20Metropolitana!5e0!3m2!1ses!2scl!4v1739038276416!5m2!1ses!2scl"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                      </iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="chat_container">
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
        
      </div>
    </div>
  </main>
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
              <a class="text-white text-decoration-none" href="administrativo.php">Ingreso Administrativo</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/chat_menu.js"></script>
</body>