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
  <title>Automotora Cordillera </title>
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
  <div class="container-fluid">

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

      <!--Este div solo se debe ver en dispositivos moviles -->
      <div class="d-block d-sm-none">
        <div class="container mt-3">
          <a href="#"><img src="images/usado11.png" alt="" class="img-fluid"></a>
        </div>
      </div>

      <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="aside_busqueda">
          <div class="container-fluid">
            <form action="menu_busqueda.php" method="GET">
              <div class="row">
                <div class="col-12">
                  <div class="form-group text-center py-3">
                    <h5>BUSCADOR <span class="title_red">AVANZADO</span></h5>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3" style="padding:2px;">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="customRadioInline1" value="Todos" name="customRadioInline1" checked>
                      <label class="form-check-label" for="customRadioInline1">Todos</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="customRadioInline2" value="Nuevo" name="customRadioInline1">
                      <label class="form-check-label" for="customRadioInline2">Nuevo</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="customRadioInline3" value="Usado" name="customRadioInline1">
                      <label class="form-check-label" for="customRadioInline3">Usado</label>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="tipoauto" class="form-label">Tipo:</label>
                    <select class="form-select" name="sel_tipo" id="tipoauto">
                      <option value="0">Todos los disponibles</option>
                      <?php include 'paginas_funciones/select_categorias.php'; ?>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="marca" class="form-label">Marca:</label>
                    <select class="form-select" id="marca" name="marca">
                      <option value="0">Todos los disponibles</option>
                      <?php include 'paginas_funciones/select_marcas_index.php'; ?>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <div id="modelo" name="modelo"></div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="año" class="form-label">Año:</label>
                    <div class="row">
                      <div class="col-6">
                        <select class="form-select" id="año" name="sel_año_desde">
                          <option value="0" selected>Desde</option>
                          <?php
                          $currentYear = date("Y");
                          for ($i = 2005; $i <= $currentYear; $i++) {
                            echo "<option value='" . $i . "'>" . $i . "</option>";
                          } ?>
                        </select>
                      </div>
                      <div class="col-6">
                        <select class="form-select" id="año" name="sel_año_hasta">
                          <option value="0" selected>Hasta</option>
                          <?php
                          $currentYear = date("Y");
                          for ($i = 2005; $i <= $currentYear; $i++) {
                            echo "<option value='" . $i . "'>" . $i . "</option>";
                          } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <input type="submit" class="btn w-100 btnindex_search" name="btnindex_search" value="Buscar">
                  </div>
                </div>
                <div class="col-12 d-none d-sm-block">
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
          include 'paginas_funciones/datos_slider.php';
          ?>
          <div class="container-fluid" id="container_vehiculos_index">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="row">
                  <div class="col-12">
                    <div id="ControlCarousel-1" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner my-2">
                        <div class="carousel-item active">
                          <img src="images/autos/<?php echo $vehiculos[0]['foto1']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 1">
                          <span id='spanPrecio'><strong>$<?php echo $vehiculos[0]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[0]['foto2']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 2">
                          <span id='spanPrecio'><strong>$<?php echo $vehiculos[0]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[0]['foto3']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 3">
                          <span id='spanPrecio'><strong>$<?php echo $vehiculos[0]['precio']; ?></strong></span>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#ControlCarousel-1" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#ControlCarousel-1" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-data">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/marcas/<?php echo $vehiculos[0]['logo']; ?>"> <?php echo $vehiculos[0]['marca']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/icons8-car-40.png"> <?php echo $vehiculos[0]['modelo']; ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u128.png"> <?php echo $vehiculos[0]['combustible']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u129.png"> <?php echo $vehiculos[0]['kilometraje']; ?>KM</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u130.png"> <?php echo $vehiculos[0]['transmision']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u131.png"> <?php echo $vehiculos[0]['ano']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="d-flex w-100">
                      <div class="my-2 mx-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#input_index_cotizacion1" class="flex-fill input-index" id="input_index">
                          <i class="fa-solid fa-phone"></i>COTIZAR
                        </button>
                      </div>
                      <div class="my-2 mx-2">
                        <form action="detalle.php" method="post">
                          <input type="hidden" name="value_carID" value="<?php echo $vehiculos[0]['codigo']; ?>">
                          <input type="submit" class=" flex-fill input-index" name="input_index" value="Ver Detalles" id="input_index">
                        </form>
                      </div>
                    </div>
                    <!--Modal Cotizar-->
                    <div class="modal fade" id="input_index_cotizacion1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span class='title_red'>NOSOTROS</span></h5>
                            <button class='close' data-bs-dismiss="modal" aria-label='Close'>
                              <i class="fa-solid fa-xmark"></i>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                              <form action="paginas_funciones/guardar_cotizacion.php" method="post">
                                <div class="mb-3">
                                  <p>COD: <?php echo $vehiculos[0]['codigo'] . ' | Vehiculo ' . $vehiculos[0]['marca'] . ' - ' . $vehiculos[0]['modelo']; ?></p>
                                </div>
                                <div class="mb-3">
                                  <label for="nombres_cotizacion" class="form-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombres_cotizacion" name="nombres_cotizacion" placeholder="Nombre" required>
                                </div>
                                <div class="mb-3">
                                  <label for="telefono_cotizacion" class="form-label">Telefono</label>
                                  <input type="text" class="form-control" id="telefono_cotizacion" name="telefono_cotizacion" placeholder="Telefono" onkeypress="return soloNumeros(event)" maxlength="12" required>
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
                                  <!--realizar integracion de grecatcha -->
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class='modal-footer'>
                            <button type='submit' name='btn_guardar' class=' input-index-modal ' id='input_index2'><span>ENVIAR DATOS</span></button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!--Fin Modal-->
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="row">
                  <div class="col-12">
                    <div id="ControlCarousel-2" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner my-2">
                        <div class="carousel-item active">
                          <img src="images/autos/<?php echo $vehiculos[1]['foto1']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 1">
                          <span id='spanPrecio'><strong>$<?php echo $vehiculos[1]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[1]['foto2']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 2">
                          <span id='spanPrecio'><strong>$<?php echo $vehiculos[1]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[1]['foto3']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 3">
                          <span id='spanPrecio'><strong>$<?php echo $vehiculos[1]['precio']; ?></strong></span>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#ControlCarousel-2" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#ControlCarousel-2" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-data">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/marcas/<?php echo $vehiculos[1]['logo']; ?>"> <?php echo $vehiculos[1]['marca']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/icons8-car-40.png"> <?php echo $vehiculos[1]['modelo']; ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u128.png"> <?php echo $vehiculos[1]['combustible']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u129.png"> <?php echo $vehiculos[1]['kilometraje']; ?>KM</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u130.png"> <?php echo $vehiculos[1]['transmision']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u131.png"> <?php echo $vehiculos[1]['ano']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="d-flex w-100">
                      <div class="my-2 mx-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#input_index_cotizacion2" class="flex-fill input-index" id="input_index">
                          <i class="fa-solid fa-phone"></i>COTIZAR
                        </button>
                      </div>
                      <div class="my-2 mx-2">
                        <form action="detalle.php" method="post">
                          <input type="hidden" name="value_carID" value="<?php echo $vehiculos[1]['codigo']; ?>">
                          <input type="submit" class=" flex-fill input-index" name="input_index" value="Ver Detalles" id="input_index">
                        </form>
                      </div>
                    </div>
                    <!--Modal Cotizar-->
                    <div class="modal fade" id="input_index_cotizacion2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span class='title_red'>NOSOTROS</span></h5>
                            <button class='close' data-bs-dismiss="modal" aria-label='Close'>
                              <i class="fa-solid fa-xmark"></i>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                              <form action="paginas_funciones/guardar_cotizacion.php" method="post">
                                <div class="mb-3">
                                  <p>COD: <?php echo $vehiculos[1]['codigo'] . ' | Vehiculo ' . $vehiculos[1]['marca'] . ' - ' . $vehiculos[1]['modelo']; ?></p>
                                </div>
                                <div class="mb-3">
                                  <label for="nombres_cotizacion" class="form-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombres_cotizacion" name="nombres_cotizacion" placeholder="Nombre" required>
                                </div>
                                <div class="mb-3">
                                  <label for="telefono_cotizacion" class="form-label">Telefono</label>
                                  <input type="text" class="form-control" id="telefono_cotizacion" name="telefono_cotizacion" placeholder="Telefono" onkeypress="return soloNumeros(event)" maxlength="12" required>
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
                                  <!--realizar integracion de grecatcha -->
                                </div>
                              </form>
                            </div>

                          </div>
                          <div class='modal-footer'>
                            <button type='submit' name='btn_guardar' class=' input-index-modal ' id='input_index2'><span>ENVIAR DATOS</span></button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!--Fin Modal-->
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="row">
                  <div class="col-12">
                    <div id="ControlCarousel-3" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner my-2">
                        <div class="carousel-item active">
                          <img src="images/autos/<?php echo $vehiculos[2]['foto1']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 1">
                          <span id='spanPrecio'><strong>$<?php echo $vehiculos[2]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[2]['foto2']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 2">
                          <span id='spanPrecio'><strong>$<?php echo $vehiculos[2]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[2]['foto3']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 3">
                          <span id='spanPrecio'><strong>$<?php echo $vehiculos[2]['precio']; ?></strong></span>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#ControlCarousel-3" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#ControlCarousel-3" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-data">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/marcas/<?php echo $vehiculos[2]['logo']; ?>"> <?php echo $vehiculos[2]['marca']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/icons8-car-40.png"> <?php echo $vehiculos[2]['modelo']; ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u128.png"> <?php echo $vehiculos[2]['combustible']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u129.png"> <?php echo $vehiculos[2]['kilometraje']; ?>KM</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u130.png"> <?php echo $vehiculos[2]['transmision']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p class="content-detalles"><img class="img-fluid icono-detalles" src="images/icons/u131.png"> <?php echo $vehiculos[2]['ano']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="d-flex w-100">
                      <div class="my-2 mx-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#input_index_cotizacion3" class="flex-fill input-index" id="input_index">
                          <i class="fa-solid fa-phone"></i>COTIZAR
                        </button>
                      </div>
                      <div class="my-2 mx-2">
                        <form action="detalle.php" method="post">
                          <input type="hidden" name="value_carID" value="<?php echo $vehiculos[2]['codigo']; ?>">
                          <input type="submit" class=" flex-fill input-index" name="input_index" value="Ver Detalles" id="input_index">
                        </form>
                      </div>
                    </div>
                    <!--Modal Cotizar-->
                    <div class="modal fade" id="input_index_cotizacion3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span class='title_red'>NOSOTROS</span></h5>
                            <button class='close' data-bs-dismiss="modal" aria-label='Close'>
                              <i class="fa-solid fa-xmark"></i>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                              <form action="paginas_funciones/guardar_cotizacion.php" method="post">
                                <div class="mb-3">
                                  <p>COD: <?php echo $vehiculos[2]['codigo'] . ' | Vehiculo ' . $vehiculos[2]['marca'] . ' - ' . $vehiculos[2]['modelo']; ?></p>
                                </div>
                                <div class="mb-3">
                                  <label for="nombres_cotizacion" class="form-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombres_cotizacion" name="nombres_cotizacion" placeholder="Nombre" required>
                                </div>
                                <div class="mb-3">
                                  <label for="telefono_cotizacion" class="form-label">Telefono</label>
                                  <input type="text" class="form-control" id="telefono_cotizacion" name="telefono_cotizacion" placeholder="Telefono" onkeypress="return soloNumeros(event)" maxlength="12" required>
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
                                  <!--realizar integracion de grecatcha -->
                                </div>
                              </form>
                            </div>

                          </div>
                          <div class='modal-footer'>
                            <button type='submit' name='btn_guardar' class=' input-index-modal ' id='input_index2'><span>ENVIAR DATOS</span></button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!--Fin Modal-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </article>
      </div>
      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 d-flex">
        <div class="aside_busqueda my-3">
          <div class="container py-2">
            <form class="row g-3" action="paginas_funciones/guardar_cotizacion.php" method="post">
              <div class="col-12 text-center">
                <h5><span class="title_red">COTIZA</span> CON NOSOTROS</h5>
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
                <div class="g-recaptcha" data-sitekey="6LcW6M8qAAAAAGBqPjBO3QUxt2fmMsCPKz4RGMKv"></div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary w-100" name="btn_guardar">Enviar</button>
              </div>
            </form>
          </div>
          <div class="container py-3">
            <div class="col-12">
              <a href="#"><img src="images/u11.png" alt="" class="img-fluid"></a>
            </div>
            <div class="text-center col-12">
              <div class="div_ventavehiculo">
                <p class="text-venta-vehiculo upper">OBTÉN TU CREDITO AUTOMOTRIZ APROBACIÓN <span class="title_red">INMEDIATA</span> EN NUESTRAS OFICINAS</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
    </div>
  </section>


  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/chat_menu.js"></script>
</body>

</html>