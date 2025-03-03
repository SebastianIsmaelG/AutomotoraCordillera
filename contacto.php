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
  <title>Contacto</title>
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
              <a class="nav-link fw-bold" href="#">Inicio</a>
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
  <div class='container'>
    <section>
      <div class="container text-center py-3">
        <h3>¿DONDE NOS <span class="tituloRojo">ENCONTRAMOS</span> ?</h3>
      </div>
    </section>
    <section class="areaMapa my-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="circuloMapa" id="scrollHere1">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3331.3961994531483!2d-70.55500888500409!3d-33.38682628079219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c9352cbe61f1%3A0x53eaf862e96dce97!2sLas+Tranqueras+1395%2C+Vitacura%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1553999263460!5m2!1ses!2scl" height="100%;" width="100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-12">
                <img src="images/sucursalTranqueras.jpg" alt="" class="photo_sucursal">
              </div>
              <div class="col-12">
                <div class="row fontDetalles">
                  <div class="col-12">
                    <h5>SUCURSAL <span class="tituloRojo">TRANQUERAS</span></h5>
                  </div>
                  <div class="col-12">
                    <p><span>Ubicación</span> Las Tranqueras N° 1395, Vitacura. Region Metropolitana.</p>
                    <p><span>Horario de atención</span> Lunes a Viernes de 10:00 a 18:30. Sabados de 10:00 a 14:30.</p>
                    <p><span>Contacto</span> (2)32 468 670</p>
                    <p><span>Email</span> contacto@autoscordillera.com.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="areaMapa my-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="circuloMapa" id="scrollHere1">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d832.2919572172204!2d-70.66524117079187!
                3d-33.44493379879845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c5abc84beaad%3A0x181aecedf6e7f4a9!
                2sAv.+Brasil+59%2C+Santiago%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1553999985715!5m2!1ses!2scl" 
                height="100%;" width="100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-12">
                <img src="images/sucursalBrazil.jpg" alt="" class="photo_sucursal">
              </div>
              <div class="col-12">
                <div class="row fontDetalles">
                  <div class="col-12">
                    <h5>SUCURSAL <span class="tituloRojo">AV BRAZIL</span></h5>
                  </div>
                  <div class="col-12">
                    <p><span>Ubicación</span> Avenida Brazil N° 159, Santiago. Region Metropolitana </p>
                    <p><span>Horario de atención</span> Lunes a Viernes de 10:00 a 18:30. Sabados de 10:00 a 14:30.</p>
                    <p><span>Contacto</span> (2)94 012 999</p>
                    <p><span>Email</span> contacto@autoscordillera.com.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
  <section class="chatContainer">
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
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/chatMenu.js"></script>
  <!--JS CAPTHA-->
  <script src='https://www.google.com/recaptcha/api.js'></script>

</body>

</html>