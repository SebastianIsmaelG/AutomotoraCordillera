<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Sebastian Gutierrez">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="shortcut icon" href="images/icons/favicon.ico" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!--googleReCaptcha-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <title>Busqueda Avanzada </title>
</head>

<body>
  <?php
  spl_autoload_register(function ($funcion) {
    include 'funciones/' . $funcion . '.php';
  });
  ?>
  <!--FACEBOOK LINK <div id="fb-root"></div>-->
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
                <?php include 'funciones/arrayMarcas.php'; ?>
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
  <div class="container-fluid wrapper">
    <div class="content container">
      <div class="row">
        <div class="col-12">
          <div class="text-center py-2">
            <h1>BUSCADOR <span class="title_red">AVANZADO</span></h1>
            <hr>
          </div>
          <form action="busqueda.php" method="GET">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                <label for="select_estado" class="visually-hidden">Estado</label>
                <select class="form-control" name="customRadioInline1" id="select_estado">
                  <option selected value="0">Estado</option>
                  <option value="0">Todos</option>
                  <option value="Nuevo">Nuevos</option>
                  <option value="Usado">Usados</option>
                </select>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                <label for="select_categoria" class="visually-hidden">Categoría</label>
                <select class="form-control" name="sel_tipo" id="select_categoria">
                  <option selected value="0">Categoría</option>
                  <option value="0">Todos los disponibles</option>
                  <?php require_once 'funciones/selectCategorias.php'; ?>
                </select>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                <label for="marca" class="visually-hidden">Marca</label>
                <select class="form-control" id="marca" name="marca">
                  <option selected value="0">Marca</option>
                  <option value="0">Todas las disponibles</option>
                  <?php require_once 'funciones/selectMarcasIndex.php'; ?>
                </select>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                <div id="modelo"></div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                <label for="select_año_d" class="visually-hidden">Año Desde</label>
                <select class="form-select" id="select_año_d" name="sel_año_d">
                  <option value="0" selected>Desde</option>
                  <?php
                  $currentYear = date("Y");
                  for ($i = 2005; $i <= $currentYear; $i++) {
                    echo "<option value='" . $i . "'>" . $i . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                <label for="select_año_h" class="visually-hidden">Año Hasta</label>
                <select class="form-select" id="select_año_h" name="sel_año_h">
                  <option value="0" selected>Hasta</option>
                  <?php
                  for ($i = $currentYear; $i >= 2005; $i--) {
                    echo "<option value='" . $i . "'>" . $i . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-12 d-flex justify-content-end">
                <input type="submit" class="btn btn-light input_busqueda w-auto" name="btnindex_search" value="Buscar">
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <?php

          //pasamos $cnn una vez para todas las clases
          require_once 'funciones/dbcall.php';
          $rsIndex = new menuBusqueda($cnn);


          //Toma la variable desde el buscador avanzado en index
          if (isset($_GET["srcInd"]) && isset($_GET["r"]) && isset($_GET["cat"]) && isset($_GET["m"]) && isset($_GET["md"]) && isset($_GET["yrd"]) && isset($_GET["yrh"])) {

            //valores sanitizados
            $radioSelect = isset($_GET["r"]) ? htmlspecialchars(strip_tags($_GET["r"])) : null;
            $valoresPermitidosRadio = ["Todos", "Nuevos", "Usados"];
            if ($radioSelect === null || !in_array($radioSelect, $valoresPermitidosRadio)) {
              return;
            }

            $categoriaSelect = filter_var($_GET["cat"], FILTER_VALIDATE_INT);
            $marcaSelect = filter_var($_GET["m"], FILTER_VALIDATE_INT);
            $modeloSelect = isset($_GET["r"]) ? htmlspecialchars(strip_tags($_GET["md"])) : null;
            $anoDesdeSelect = filter_var($_GET["yrd"], FILTER_VALIDATE_INT);
            $anoHastaSelect = filter_var($_GET["yrh"], FILTER_VALIDATE_INT);

            if ($categoriaSelect === false || $marcaSelect === false || $modeloSelect === null || $anoDesdeSelect === false || $anoHastaSelect === false) {
              return;
            }

            //Clase busquedaAvanzada desde menuBusqueda.php
            $rsIndex->busquedaAvanzada($radioSelect, $categoriaSelect, $marcaSelect, $modeloSelect, $anoDesdeSelect, $anoHastaSelect);
          }



          // //Toma la variable de la seccion del navbar marca y la almacena-->
          // if (isset($_GET["codigoM"])) {
          //   $codigoMarca = $_GET["codigoM"];
          //   include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\menu_busqueda.php';
          // }

          // //Toma de variable de la seccion Boton Busqueda y la almacena-->
          // if (isset($_GET["btn_busc"])) {
          //   $resultado_index = $_GET["busqueda_index"];
          //   include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\menu_busqueda.php';
          // }
          // //Busqueda desde el navbar USADOS
          // if (isset($_GET["Estado"])) {
          //   $buscarestados = "usado";
          //   include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\menu_busqueda.php';
          // }

          ?>
        </div>
      </div>
    </div>
    <footer class="bg-dark sec_footer">
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
  </div>
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

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/chat_menu.js"></script>

  <!--JS CAPTHA-->
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>