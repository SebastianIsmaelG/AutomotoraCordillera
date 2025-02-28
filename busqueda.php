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
  <title>Busqueda Avanzada </title>
</head>

<body>
  <?php

  header("Permissions-Policy: geolocation=(), microphone=()");

  require_once 'funciones/dbcall.php';
  $arrayMarcas = 'funciones/arrayMarcas.php';
  $selectCategorias = 'funciones/selectCategorias.php';
  $selectMarcasIndex = 'funciones/selectMarcasIndex.php';

  spl_autoload_register(function ($funcion) {
    include 'funciones/' . $funcion . '.php';
  });
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
            <div class="search-container position-relative d-flex w-100 border rounded overflow-hidden">
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
  <main>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="text-center py-2">
            <h1 class="h2">BUSCADOR <span class="title_red">AVANZADO</span></h1>
            <hr>
          </div>
          <form action="busqueda.php" method="GET">
            <div class="row">
              <div class="col-lg-4 col-md-12">
                <div class="mb-3">
                  <label for="estado" class="form-label">Estado:</label>
                  <select name="r" class="form-select" id="estado">
                    <option value="Todos">Todos</option>
                    <option value="Nuevos">Nuevos</option>
                    <option value="Usados">Usados</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
                <div class="mb-3">
                  <label for="categoria" class="form-label">Categoria:</label>
                  <select class="form-select" name="cat" id="categoria">
                    <option value="0">Todos los disponibles</option>
                    <?php require_once $selectCategorias; ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
                <div class="mb-3">
                  <label for="marca" class="form-label">Marca:</label>
                  <select class="form-select" id="marca" name="m">
                    <option value="0">Todos los disponibles</option>
                    <?php require_once $selectMarcasIndex; ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
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
              <div class="col-lg-4 col-md-12">
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
              <div class="col-lg-4 col-md-12">
                <div class="mb-3 py-4">
                  <input type="submit" class="btn w-100 btnIndexSearch" name="srcInd" value="Buscar">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <?php

          //pasamos $cnn una vez para todas las clases
          $rsIndex = new MenuBusqueda($cnn);



          //Toma la variable desde el buscador avanzado en index
          if (
            isset($_GET["srcInd"]) && isset($_GET["r"]) && isset($_GET["cat"]) && isset($_GET["m"]) && isset($_GET["yrd"])
            && isset($_GET["yrh"]) && isset($_GET["mnp"]) && isset($_GET["mxp"]) && $_GET["srcInd"] == "Buscar"
          ) {

            //valores sanitizados
            $radioSelect = isset($_GET["r"]) ? strip_tags($_GET["r"]) : null;
            $valoresPermitidosRadio = ["Todos", "Nuevos", "Usados"];
            if ($radioSelect === null || !in_array($radioSelect, $valoresPermitidosRadio)) {
              return;
            }

            $categoriaSelect = filter_input(INPUT_GET, 'cat', FILTER_VALIDATE_INT);
            $marcaSelect = filter_input(INPUT_GET, 'm', FILTER_VALIDATE_INT);  
            $anoDesdeSelect = filter_input(INPUT_GET, 'yrd', FILTER_VALIDATE_INT); 
            $anoHastaSelect = filter_input(INPUT_GET, 'yrh', FILTER_VALIDATE_INT);
            $precioDesdeSelect = filter_input(INPUT_GET, 'mnp', FILTER_VALIDATE_INT);
            $precioHastaSelect = filter_input(INPUT_GET, 'mxp', FILTER_VALIDATE_INT);

            if ($categoriaSelect === false || $marcaSelect === false  || $anoDesdeSelect === false || 
                $anoHastaSelect === false || $precioDesdeSelect === false || $precioHastaSelect === false) {
                return;
            }

            //Clase desde menuBusqueda.php
            $rsIndex->busquedaAvanzada($radioSelect, $categoriaSelect, $marcaSelect, $anoDesdeSelect, $anoHastaSelect, $precioDesdeSelect, $precioHastaSelect);
          }



          //Toma la variable desde el menu de marcas en el navbar
          if (isset($_GET["m"]) && isset($_GET["nav"]) && $_GET["nav"] == "buscar") {

            //valores sanitizados
            $marcaSelect = filter_input(INPUT_GET,'m', FILTER_VALIDATE_INT);
            if ($marcaSelect === false) {
              return;
            }

            //Clase desde menuBusqueda.php
            $rsIndex->busquedaMarcas($marcaSelect);
          }

          
          //Toma la variable desde el menu de Usados en el navbar
          if (isset($_GET["estado"]) && $_GET["estado"] == "usados" && $_GET["nav"] == "buscar") {
            $srcUsados = strip_tags($_GET["estado"]);

            //Clase desde menuBusqueda.php
            $rsIndex->busquedaUsados();
          }


          //Toma la variable desde el input de busqueda en el navbar
          if (isset($_GET["src"])) {
            //Si se envio el form pero no se escribio nada igual entra, pero selecionamos una variable para hacer SQL select *
            $srcNavBar = "all";
            //Aqui modificamos $srcNavbar si el usuario escribio una cadena de texto
            if ($_GET["src"] != "") {
              $srcNavBar = strip_tags($_GET["src"]);
            }
            //Clase desde menuBusqueda.php
            $rsIndex->busquedaNavbar($srcNavBar);
          }

          ?>
        </div>
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
  <section class="chat_container">
    <div class="chatButton">
      <div class="bannerContainer">
        <span class="bannerContacto">Contactanos via Messeger</span>
      </div>
      <div class="imagen_container">
        <img src="images/icons/messenger-48.png" class="img-fluid" alt="">
      </div>
    </div>
    <div class="chatContent">

    </div>
  </section>

  <script src="js/nouislider.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/chat_menu.js"></script>
  <!--JS CAPTHA-->
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>