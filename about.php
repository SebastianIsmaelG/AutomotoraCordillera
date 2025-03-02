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
  <!--googleReCaptcha-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <title>Acerca de </title>
</head>

<body>
  <?php

  header("Permissions-Policy: geolocation=(), microphone=()");

  require_once 'funciones/dbcall.php';
  $arrayMarcas = 'funciones/arrayMarcas.php';

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
                <?php require_once $arrayMarcas ?>
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
  <div class="container">
    <div class="container text-center">
      <h1 class="h2">Automotora <span class="tituloRojo">Cordillera</span></h1>
    </div>
    <div class="container text-center">
      <div class="text-center fondoHistoria"></div>
    </div>
    <main>
      <div class="container my-2">
        <div class="containerAbout">
          <p>Automotora Cordillera nace en el año 2011, cuando su dueño Juan Pablo Montecinos, se da cuenta de las pocas facilidades que los clientes de escasos recursos
            tienen para poder acceder y lograr a concretar el tan ansiado sueño del auto propio. A raíz de esto, comienza a trabajar para revertir esta situación.
            Es así como en mayo del 2011, se da inicio a Automotora Cordillera, la cual en sus inicios comenzo como un negocio de compra de vehiculos usados para reventa.
            A la fecha, disponemos con un stock de más de 40 unidades 0 kilometros, dos sucursales, centro de financiamiento en nuestra oficina, servicio técnico y un grupo de profesionales,
            que estarán a su disposición para dar solución a todos sus requerimientos.</p>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="p-2 containerAbout">
              <h3 class="title_vision_mision">VISIÓN</h3>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="text-center p-2">
              <img class="img-fluid" src="images/misionvision-y-valores.jpg" alt="imagen-vision">
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="text-center p-2">
              <img class="img-fluid" src="images/misionvision-y-valores2.jpg" alt="imagen mision">
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="p-2 containerAbout">
              <h3 class="title_vision_mision">MISIÓN</h3>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h3>Nuestros <span class="tituloRojo">Valores</span></h3>
          </div>
        </div>
        <div class="row fontDetalles">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="container valoresAbout my-2 p-2">
              <h4 class="tituloValores text-center">COMPROMISO</h4>
              <div>
                <p>Nuestro conocimiento, experiencias y esfuerzo adquiridas a traves de los años son claves para poder ofrecer el mejor servicio a nuestros clientes.
                  Le atenderemos siempre con una sonrisa, en un ambiente que promueva el enriquecimiento, en el cual se valoran y se respetan todas las opiniones e ideas.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="container valoresAbout my-2 p-2">
              <h4 class="tituloValores text-center">HONESTIDAD</h4>
              <div>
                <p>Con transparencia, honradez e integridad en nuestras relaciones del día a día,
                  empezando por nosotros mismos y rechazando prácticas de negocio injustas, orientadas a obtener una ventaja particular y siendo ejemplo para los demás.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="container valoresAbout my-2 p-2">
              <h4 class="tituloValores text-center">PASIÓN</h4>
              <div>
                <p>Contamos con mas de 8 años de experiencia en el mundo automotriz, nos emocionamos con los vehiculos al igual que nuestros clientes.
                  Recordando siempre nuestras raices, siempre soñamos con poder formar una organización con pasión dirigida a nuestros clientes</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
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


  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/chatMenu.js"></script>
</body>

</html>