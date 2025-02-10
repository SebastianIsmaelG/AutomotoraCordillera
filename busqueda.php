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
  <section class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center py-2" id="div_1">
          <h4>BUSCADOR <span class="title_red">AVANZADO</span></h4>
          <hr>
        </div>
        <form action="busqueda.php" method="GET">
          <div class="row">
            <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs">
              <label for="select_estado" class="sr-only" style="margin-right:5px;">Estado</label>
              <select class="form-control" name="customRadioInline1" id="select_estado">
                <option selected value="0">Estado</option>
                <option value="0">Todos</option>
                <option value="Nuevo">Nuevos</option>
                <option value="Usado">Usados</option>
              </select>
            </div>
            <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs">
              <label for="select_categoria" class="sr-only" style="margin-right:5px;">Categoria </label>
              <select class="form-control col-12" name="sel_tipo" id="select_categoria">
                <option selected value="0">Categoria</option>
                <option value="0">Todos los disponibles</option>
                <?php require_once 'funciones/selectCategorias.php'; ?>
              </select>
            </div>
            <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs">
              <label for="marca" class="sr-only" style="margin-right:5px;">Marca </label>
              <select class="form-control" id="marca" name="marca">
                <option selected value="0">Marca</option>
                <option value="0">Todas las disponibles</option>
                <?php require_once 'funciones/selectMarcasIndex.php'; ?>
              </select>
            </div>
            <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs">
              <div id="modelo" name="modelo">
              </div>
            </div>
            <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs">
              <label for="select_año_d" class="sr-only" style="margin-right:5px;">Año Desde </label>
              <select class="form-select" id="año" name="sel_año_d">
                          <option value="0" selected>Desde</option>
                          <?php
                          $currentYear = date("Y");
                          for ($i = 2005; $i <= $currentYear; $i++) {
                            echo "<option value='" . $i . "'>" . $i . "</option>";
                          } ?>
                        </select>
            </div>
            <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-6" id="division_col_xs">
              <label for="select_año_h" class="sr-only" style="margin-right:5px;">Año Hasta </label>
              <select class="form-select" id="año" name="sel_año_h">
                          <option value="0" selected>Hasta</option>
                          <?php
                          $currentYear = date("Y");
                          for ($i = $currentYear; $i >= 2005; $i--) {
                            echo "<option value='" . $i . "'>" . $i . "</option>";
                          } ?>
              </select>
            </div>
          </div>
          <div class="row" style="margin:5px;">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
              <input type="submit" class="btn btn-light input_busqueda col-lg-3 col-md-3 col-sm-6 col-xs-12" name="btnindex_search" value="Buscar">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="text-center" id="div_1">
          <h4 id="scrollHere" style='color:#ff3333;'>RESULTADOS</h4>
          <hr>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
        //Toma la variable desde el buscador avanzado en index
        if (isset($_GET["btnindex_search"])) {
          $resultado_busqueda_index = $_GET["btnindex_search"];
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
          $buscarestados = "usado";
          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\menu_busqueda.php';
        }

        ?>
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

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/chat_menu.js"></script>

  <!--JS CAPTHA-->
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>