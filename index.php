<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="shortcut icon" href="images/icons/favicon.ico" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="css/nouislider.min.css">
  <!--googleReCaptcha-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <title>Automotora Cordillera </title>
</head>

<body>
  <?php 
  header("Permissions-Policy: geolocation=(), microphone=()");
  require_once 'funciones/dbcall.php';
  $arrayMarcas = 'funciones/arrayMarcas.php';
  $selectCategorias = 'funciones/selectCategorias.php';
  $selectMarcasIndex = 'funciones/selectMarcasIndex.php';
  $datosSlider = 'funciones/datosSlider.php';
  $datosSliderCatalogo = 'funciones/datosSliderCatalogo.php';
  
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
          <ul class="navbarNav">
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
            <div class="searchContainer position-relative d-flex w-100 border rounded overflow-hidden">
              <input class="form-control border-0 flex-grow-1 px-3" type="search" name="src"
                placeholder="¿Qué estás buscando?.."
                aria-label="Buscar" maxlength="15">
              <button type="submit" class="btn flex-shrink-0 btnLupa">
                <i class="fas fa-search btnLupa"></i> <!-- Ícono de lupa -->
              </button>
            </div>
          </form>

        </div>
      </div>
    </nav>
  </header>
  <div class="container-fluid my-3">
    <div class="row">
      <div class="col-lg-9 col-md-12 col-sm-12">
        <article>
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <a href="#"><img class="d-block w-100" src="images/descarga2.jpg" alt="First slide"></a>
              </div>
              <div class="carousel-item">
                <a href="#"><img class="d-block w-100" src="images/descarga3.jpg" alt="Second slide"></a>
              </div>
              <div class="carousel-item">
                <a href="#"><img class="d-block w-100" src="images/descarga.jpg" alt="Third slide"></a>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </article>
      </div>

      <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="divGradient fontDetalles">
          <div class="container-fluid">
            <form action="busqueda.php" method="GET">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3 text-center py-3">
                    <h5 class="fw-bold">BUSCADOR <span class="tituloRojo">AVANZADO</span></h5>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="r1" value="Todos" name="r" checked>
                      <label class="form-check-label" for="r1">Todos</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="r2" value="Nuevos" name="r">
                      <label class="form-check-label" for="r2">Nuevo</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="r3" value="Usados" name="r">
                      <label class="form-check-label" for="r3">Usado</label>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <select class="form-select" name="cat" id="categoria">
                      <option value="0">Todos los disponibles</option>
                      <?php require_once $selectCategorias; ?>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="marca" class="form-label">Marca:</label>
                    <select class="form-select" id="marca" name="m">
                      <option value="0">Todos los disponibles</option>
                      <?php require_once $selectMarcasIndex; ?>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="minYear" class="form-label">Año:</label>
                    <div class="container">
                      <div id="yrRange"></div>
                      <div class="values">
                        <div class="row">
                          <div class="col-6">
                            <div class="value-box text-start p-1" id="minYear"></div>
                            <input type="hidden" name="yrd" id="minYearInput">
                          </div>
                          <div class="col-6">
                            <div class="value-box text-end p-1" id="maxYear"></div>
                            <input type="hidden" name="yrh" id="maxYearInput">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="minPrecio" class="form-label">Precio:</label>
                    <div class="container">
                      <div id="precio"></div>
                      <div class="values">
                        <div class="row">
                          <div class="col-6">
                            <div class="value-box text-start p-1" id="minPrecio">$0</div>
                            <input type="hidden" name="mnp" id="minPrecioInput">
                          </div>
                          <div class="col-6">
                            <div class="value-box text-end p-1" id="maxPrecio">$50.000.000</div>
                            <input type="hidden" name="mxp" id="maxPrecioInput">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <input type="submit" class="btn w-100 btnIndexSearch" name="srcInd" value="Buscar">
                  </div>
                </div>
                <div class="col-12 d-none d-sm-block text-center">
                  <div class="my-2">
                    <a href="#"><img src="images/usado11.png" alt="" class="img-fluid"></a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
        <article class="my-3">
          <!--menu 3 vehiculos-->
          <?php 
          
          require_once $datosSlider; 
          // Verificar si hay suficientes vehículos
          if (count($vehiculos) < 3) {
              throw new Exception("Error: No hay suficientes vehículos en la base de datos.");
          }else{
            require_once $datosSliderCatalogo;
          }
          
          ?>
          
        </article>
      </div>
      <!--Este div solo se debe ver en dispositivos moviles -->
      <div class="d-block d-sm-none text-center">
        <div class="container mt-3">
          <a href="#"><img src="images/usado11.png" alt="" class="img-fluid"></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
        <div class="divGradient my-3 fontDetalles">
          <div class="container py-2">
            <form class="row g-3" action="funciones/guardarCotizacion.php" method="post">
              <div class="col-12 text-center">
                <h5 class="fw-bold"><span class="tituloRojo">COTIZA</span> CON NOSOTROS</h5>
              </div>
              <div class="col-12">
                <label for="nombres_cotizacion" class="visually-hidden">Nombres</label>
                <input type="text" class="form-control" id="nombres_cotizacion" name="nombres_cotizacion" placeholder="Nombres" required>
              </div>

              <div class="col-12">
                <label for="telefono_cotizacion" class="visually-hidden">Teléfono</label>
                <input type="tel" class="form-control" id="telefono_cotizacion" name="telefono_cotizacion" placeholder="Teléfono" onkeypress="return soloNumeros(event)"
                  pattern="^\+?\d{0,3}?[-.\s]?\(?\d{1,4}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,9}$"
                  maxlength="9" required>
              </div>

              <div class="col-12">
                <label for="mail_cotizacion" class="visually-hidden">Correo</label>
                <input type="email" class="form-control" id="mail_cotizacion" name="mail_cotizacion" placeholder="Email" required>
              </div>

              <div class="col-12">
                <label for="mensaje_cotizacion" class="visually-hidden">Mensaje</label>
                <textarea id="mensaje_cotizacion" class="form-control" placeholder="Mensaje" name="mensaje_cotizacion" rows="3"></textarea>
              </div>

              <div class="col-12">
                <div class="g-recaptcha" data-sitekey="6LdpddEqAAAAAF2HSEomw4_fCCzD2mH5z5qQySmo"></div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn w-100 btnIndexSearch" name="btn_guardar">Enviar</button>
              </div>
            </form>
          </div>
          <div class="container py-3 text-center">
            <a href="#"><img src="images/u11.png" alt="" class="img-fluid"></a>
            <div class="divBannerVentaCredito">
              <p>Obtén tu credito con aprobación <span class="text-warning">INMEDIATA</span> en nuestras oficinas</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="bg-dark">
    <div class="container footerData">
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

  <div class="chatContainer">
    <div class="chatButton">
      <div class="bannerContainer">
        <span class="bannerContacto">Contactanos via Messeger</span>
      </div>
      <div class="imagenContainer">
        <img src="images/icons/messenger-48.png" class="img-fluid" alt="">
      </div>
    </div>
    <div class="chatContent">
    </div>
  </div>

  <script src="js/nouislider.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/chat_menu.js"></script>
</body>

</html>