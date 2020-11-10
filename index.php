<!DOCTYPE html>
<html lang="es" dir="ltr">
<!--            .'  '.
            _.-'/  |0 \
,        _.-"  ,|  /   `-.
|\    .-"       `--""-.__.'=====================-,
\ '-'`        .___.--._)=========================|
\            .'      |                          |
|     /,_.-'        |        HOLA              |
_/   _.'(           |           Bienvenido    |
/  ,-' \  \         |        A mi ensalada   |
\  \    `-'         |                       |
`-'               '--------------------------'

-->
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Sebastian Gutierrez">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icons/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Automotora Cordillera </title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light navbar-default" style="background-color:#F8F8F9">
        <a class="navbar-brand" href="index.php"><img src="images/Cordillera2.png"  class="img-responsive" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">Home</span></a>
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
            <input class="form-control mr-sm-2" type="search" name="busqueda_index" placeholder="Marcas, Modelo, Año.." aria-label="Search" maxlenght="15">
            <button class="btn btn-light my-2 my-sm-0 input_busqueda" name="btn_busc" value="Buscar" type="submit">Busca tu vehiculo</button>
          </form>
        </div>
      </nav>
    </header>
    <br>
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <article>
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <a href="#"><img class="d-block w-100" src="images/descarga2.jpg" alt="First slide"></a>
                  </div>
                  <div class="carousel-item">
                    <a href="#"><img class="d-block w-100" src="images/descarga3.jpg" alt="Second slide"></a>
                  </div>
                  <div class="carousel-item">
                    <a href="#"><img class="d-block w-100" src="images/descarga.jpg" alt="Second slide"></a>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </article>
          </div>
          <div class="xs-12 d-block d-sm-none">
            <div class="container" style="margin-top:5px;">
              <div class="">
                <a href="#"><img src="images/usado11.png" alt="" class="img-fluid" ></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <aside id="aside_busqueda">
                <div class="container-fluid">
                  <form action="menu_busqueda.php" method="GET">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group text-center">
                            <br>
                            <h5>BUSCADOR <span id="title_red">AVANZADO</span></h5>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group" style="padding:2px;">
                              <div class="custom-control custom-radio custom-control-inline ">
                                <input type="radio" id="customRadioInline1" value="Todos" name="customRadioInline1" class="custom-control-input" checked="checked"  >
                                <label class="custom-control-label" for="customRadioInline1">Todos</label>
                               </div>
                              <div class="custom-control custom-radio custom-control-inline ">
                                <input type="radio" id="customRadioInline2" value="Nuevo" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Nuevo</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline ">
                               <input type="radio" id="customRadioInline3" value="Usado" name="customRadioInline1" class="custom-control-input">
                               <label class="custom-control-label" for="customRadioInline3">Usado</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-3 col-sm-6 col-xs-6" id="division_col_xs">
                         <div class="form-group">
                            <label for="tipoauto" class="control-label">Tipo:</label>
                            <select class="form-control" name="sel_tipo" id="tipoauto">
                              <option value="0">Todos los disponibles</option>
                              <?php include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_categorias.php'; ?> <!--Marcas con logo-->
                            </select>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-3 col-sm-6 col-xs-6" id="division_col_xs">
                          <div class="form-group">
                            <label for="marca" class="control-label">Marca:</label>
                             <select class="form-control" id="marca" name="marca">
                               <option value="0">Todas las disponibles</option>
                              <?php include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\select_marcas_index.php'; ?>
                             </select>
                          </div>
                          <input type="hidden" id="valormarca" name="" value="">
                      </div>
                      <div class="col-lg-12 col-md-3 col-sm-6 col-xs-6" id="division_col_xs">
                          <div class="form-group">
                            <label for="modelo" class="control-label">Modelo:</label>
                            <div id="modelo" name="modelo">
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-3 col-sm-6 col-xs-6" id="division_col_xs">
                          <div class="form-group">
                            <label for="año" class="control-label">Año:</label>
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group inline">
                                  <select class="form-control" id="año"  name="sel_año_desde" id="division_col_xs" style="width:100%;" >
                                      <option value="0">Desde</option>
                                        <?php
                                          for($i=1995;$i<=2018;$i++) {
                                             echo "<option value='".$i."'>".$i."</option>";
                                          }

                                        ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group inline">
                                  <select class="form-control" id="año"  name="sel_año_hasta" id="division_col_xs" style="width:100%;" >
                                      <option value="0">Hasta</option>
                                        <?php
                                          for($i=1995;$i<=2018;$i++) {
                                             echo "<option value='".$i."'>".$i."</option>";
                                          }
                                        ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-5 col-sm-5 col-xs-5">
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary form-control "  name="btnindex_search" value="Buscar">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </aside>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
              <article style="margin-top:5px;">
                  <!--menu 3 vehiculos-->
                  <?php
                    include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\datos_slider.php';
                   ?>
                  <div class="container-fluid" id="container_vehiculos_index" >
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="row" >
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:5px;">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <img class="d-block w-100" src="images/autos/<?php echo $foto1_auto1; ?>" alt="First slide">
                                            <span id='spanPrecio'><strong> $<?php echo $precio_auto1; ?></strong></span>
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block w-100"  src="images/autos/<?php echo $foto2_auto1; ?>" alt="Second slide">
                                            <span id='spanPrecio'><strong> $<?php echo $precio_auto1; ?></strong></span>
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block w-100"  src="images/autos/<?php echo $foto3_auto1; ?>" alt="Third slide">
                                            <span id='spanPrecio'><strong> $<?php echo $precio_auto1; ?></strong></span>
                                          </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:3px;">
                              <div class="container_data">
                                <div class="container">
                                      <div class="row">
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6 columna_slider_index" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/marcas/<?php echo $logo_auto1;?>"></span> <?php echo $marca_auto1; ?></p>
                                          </div>
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6 columna_slider_index" id="division_col_xs" >
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/icons8-car-40.png"></span> <?php echo $modelo_auto1; ?></p>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6 columna_slider_index" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u128.png"></span> <?php echo $comb_auto1; ?></p>
                                          </div>
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6 columna_slider_index" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u129.png"></span> <?php echo $kilo_auto1; ?>KM</p>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6 columna_slider_index" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u130.png"></span> <?php echo $transm_auto1; ?></p>
                                          </div>
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6 columna_slider_index" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u131.png"></span> <?php echo $año_auto1; ?></p>
                                          </div>
                                      </div>
                                    </div>
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                              <div class="form-inline ">
                                <div class="form-group mb-2  mx-auto">
                                  <button type="button" data-toggle='modal' data-target='#input_index_cotizacion1' class="btn btn-light" id="input_index">COTIZAR</button>
                                </div>
                                <div  class="form-group mb-2  mx-auto">
                                  <form class="" action="detalle.php" method="post">
                                    <input type="hidden" name="value_carID" value="<?php echo $codigo_auto1; ?>">
                                    <input type="submit" class="btn btn-light " name="input_index" value="Ver Ficha" id="input_index">
                                  </form>
                                </div>
                              </div>
                              <!--Modal Cotizar-->
                                    <div class="modal fade" id="input_index_cotizacion1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                          <div class='modal-header' style='background-color:#a5cbd9'>
                                            <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span id='title_red'>NOSOTROS</span></h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                              <span aria-hidden='true'>&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                             <div class="container">
                                              <form action"paginas_funciones/guardar_cotizacion.php" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <p class="upper">COD:<?php echo "$codigo_auto1 - $marca_auto1  $modelo_auto1"; ?></p>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="nombres_cotizacion" class="sr-only control-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombres_cotizacion" name="nombres_cotizacion"  placeholder="Nombre" required>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="telefono_cotizacion" class="sr-only control-label">Telefono</label>
                                                    <input type="text" class="form-control" id="telefono_cotizacion" name="telefono_cotizacion" placeholder="Telefono" onkeypress="return soloNumeros(event)" maxlength="12" required>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="mail_cotizacion" class="sr-only control-label">Correo</label>
                                                    <input type="email" class="form-control" id="mail_cotizacion" name="mail_cotizacion" placeholder="Email" required >
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="mensaje_cotizacion" class="sr-only control-label">Correo</label>
                                                    <textarea id="mensaje_cotizacion" class="form-control" placeholder="Mensaje" name="mensaje_cotizacion" rows="2"></textarea>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <div style="padding:3px;" class="g-recaptcha" data-sitekey="6Lcpuo4UAAAAAMCbzkor4R21kx0bynHK92ncR_lW"></div>
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
                              <!--Fin Modal-->
                            </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:5px;">
                                <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <img class="d-block w-100" src="images/autos/<?php echo $foto1_auto2; ?>" alt="First slide">
                                            <span id='spanPrecio'><strong> $<?php echo $precio_auto2; ?></strong></span>
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block w-100"  src="images/autos/<?php echo $foto2_auto2; ?>" alt="Second slide">
                                            <span id='spanPrecio'><strong> $<?php echo $precio_auto2; ?></strong></span>
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block w-100"  src="images/autos/<?php echo $foto3_auto2; ?>" alt="Third slide">
                                            <span id='spanPrecio'><strong> $<?php echo $precio_auto2; ?></strong></span>
                                          </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:3px;">
                              <div class="container_data">
                                <div class="container">
                                      <div class="row">
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/marcas/<?php echo $logo_auto2;?>"></span> <?php echo $marca_auto2; ?></p>
                                          </div>
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/icons8-car-40.png"></span> <?php echo $modelo_auto2; ?></p>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u128.png"></span> <?php echo $comb_auto2; ?></p>
                                          </div>
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u129.png"></span> <?php echo $kilo_auto2; ?>KM</p>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u130.png"></span> <?php echo $transm_auto2; ?></p>
                                          </div>
                                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                            <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u131.png"></span> <?php echo $año_auto2; ?></p>
                                          </div>
                                      </div>
                                    </div>
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                              <div class="form-inline ">
                                <div class="form-group mb-2  mx-auto">
                                  <button type="button" data-toggle='modal' data-target='#input_index_cotizacion2' class="btn btn-light" id="input_index">COTIZAR</button>
                                </div>
                                <div  class="form-group mb-2  mx-auto">
                                  <form class="" action="detalle.php" method="post">
                                    <input type="hidden" name="value_carID" value="<?php echo $codigo_auto2; ?>">
                                    <input type="submit" class="btn btn-light " name="input_index" value="Ver Ficha" id="input_index">
                                  </form>
                                </div>
                              </div>
                              <!--Modal Cotizar-->
                                    <div class="modal fade" id="input_index_cotizacion2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                          <div class='modal-header' style='background-color:#a5cbd9'>
                                            <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span id='title_red'>NOSOTROS</span></h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                              <span aria-hidden='true'>&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                             <div class="container">
                                              <form action"paginas_funciones/guardar_cotizacion.php" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <p class="upper">COD:<?php echo "$codigo_auto2 - $marca_auto2  $modelo_auto2"; ?></p>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="nombres_cotizacion" class="sr-only control-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombres_cotizacion" name="nombres_cotizacion"  placeholder="Nombre" required>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="telefono_cotizacion" class="sr-only control-label">Telefono</label>
                                                    <input type="text" class="form-control" id="telefono_cotizacion" name="telefono_cotizacion" placeholder="Telefono" onkeypress="return soloNumeros(event)" maxlength="12" required>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="mail_cotizacion" class="sr-only control-label">Correo</label>
                                                    <input type="email" class="form-control" id="mail_cotizacion" name="mail_cotizacion" placeholder="Email" required >
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="mensaje_cotizacion" class="sr-only control-label">Correo</label>
                                                    <textarea id="mensaje_cotizacion" class="form-control" placeholder="Mensaje" name="mensaje_cotizacion" rows="2"></textarea>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <div style="padding:3px;" class="g-recaptcha" data-sitekey="6Lcpuo4UAAAAAMCbzkor4R21kx0bynHK92ncR_lW"></div>
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
                              <!--Fin Modal-->
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:5px">
                                <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <img class="d-block w-100" src="images/autos/<?php echo $foto1_auto3; ?>" alt="First slide">
                                            <span id='spanPrecio'><strong> $<?php echo $precio_auto3; ?></strong></span>
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block w-100"  src="images/autos/<?php echo $foto2_auto3; ?>" alt="Second slide">
                                            <span id='spanPrecio'><strong> $<?php echo $precio_auto3; ?></strong></span>
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block w-100"  src="images/autos/<?php echo $foto3_auto3; ?>" alt="Third slide">
                                            <span id='spanPrecio'><strong> $<?php echo $precio_auto3; ?></strong></span>
                                          </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:3px;">
                              <div class="container_data">
                                  <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                          <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/marcas/<?php echo $logo_auto3;?>"></span> <?php echo $marca_auto3; ?></p>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                          <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/icons8-car-40.png"></span> <?php echo $modelo_auto3; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                          <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u128.png"></span> <?php echo $comb_auto3; ?></p>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                          <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u129.png"></span> <?php echo $kilo_auto3; ?>KM</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                          <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u130.png"></span> <?php echo $transm_auto3; ?></p>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" id="division_col_xs">
                                          <p><span><img style="width:20px; height:20px;" class="img-fluid" src="images/icons/u131.png"></span> <?php echo $año_auto3; ?></p>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                              <div class="form-inline " style="">
                                <div class="form-group mb-2  mx-auto">
                                  <button type="button" data-toggle='modal' data-target='#input_index_cotizacion3' class="btn btn-light" id="input_index">COTIZAR</button>
                                </div>
                                <div  class="form-group mb-2  mx-auto">
                                  <form class="" action="detalle.php" method="post">
                                    <input type="hidden" name="value_carID" value="<?php echo $codigo_auto3; ?>">
                                    <input type="submit" class="btn btn-light " name="input_index" value="Ver Ficha" id="input_index">
                                  </form>
                                </div>
                              </div>
                              <!--Modal Cotizar-->
                                    <div class="modal fade" id="input_index_cotizacion3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                          <div class='modal-header' style='background-color:#a5cbd9'>
                                            <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span id='title_red'>NOSOTROS</span></h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                              <span aria-hidden='true'>&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                             <div class="container">
                                              <form action"paginas_funciones/guardar_cotizacion.php" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <p class="upper">COD:<?php echo "$codigo_auto3 - $marca_auto3  $modelo_auto3"; ?></p>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="nombres_cotizacion" class="sr-only control-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombres_cotizacion" name="nombres_cotizacion"  placeholder="Nombre" required>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="telefono_cotizacion" class="sr-only control-label">Telefono</label>
                                                    <input type="text" class="form-control" id="telefono_cotizacion" name="telefono_cotizacion" placeholder="Telefono" onkeypress="return soloNumeros(event)" maxlength="12" required>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="mail_cotizacion" class="sr-only control-label">Correo</label>
                                                    <input type="email" class="form-control" id="mail_cotizacion" name="mail_cotizacion" placeholder="Email" required >
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <label for="mensaje_cotizacion" class="sr-only control-label">Correo</label>
                                                    <textarea id="mensaje_cotizacion" class="form-control" placeholder="Mensaje" name="mensaje_cotizacion" rows="2"></textarea>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                    <div style="padding:3px;" class="g-recaptcha" data-sitekey="6Lcpuo4UAAAAAMCbzkor4R21kx0bynHK92ncR_lW"></div>
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
                              <!--Fin Modal-->
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </article>
          </div>
          <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
              <aside class="" id="aside_busqueda">
                <div class="container" style="margin-top:5px;padding-bottom:5px;">
                  <form class="form-horizontal" action="paginas_funciones/guardar_cotizacion.php" method="post">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group text-center">
                          <br>
                          <h5><span id="title_red">COTIZA</span> CON NOSOTROS</h5>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6" id="division_col_xs">
                        <div class="form-group">
                          <label for="nombres_cotizacion" class="sr-only control-label">Nombres</label>
                          <input type="text" class="form-control" id="nombres_cotizacion" name="nombres_cotizacion"  placeholder="Nombres" required>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6" id="division_col_xs">
                        <div class="form-group">
                          <label for="telefono_cotizacion" class="sr-only control-label">Telefono</label>
                          <input type="tel" class="form-control" id="telefono_cotizacion" name="telefono_cotizacion" placeholder="Telefono" onkeypress="return soloNumeros(event)" maxlength="12" required>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6" id="division_col_xs">
                        <div class="form-group">
                          <label for="mail_cotizacion" class="sr-only control-label">Correo</label>
                          <input type="email" class="form-control" id="mail_cotizacion" name="mail_cotizacion" placeholder="Email" required >
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6" id="division_col_xs">
                        <div class="form-group">
                          <label for="mensaje_cotizacion" class="sr-only control-label">Correo</label>
                          <textarea id="mensaje_cotizacion" class="form-control" placeholder="Mensaje" name="mensaje_cotizacion" rows="1"></textarea>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <div style="padding:3px;" class="g-recaptcha" data-sitekey="6Lcpuo4UAAAAAMCbzkor4R21kx0bynHK92ncR_lW"></div>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary form-control col-lg-12 col-md-6 col-sm-6 col-xs-12" name="btn_guardar" value="Enviar">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </aside>
          </div><!--d-none d-sm-block-->
          <!--DIVS PUBLICITARIOS-->
          <div class="col-lg-6 col-m6-6 col-sm-12 col-xs-12 d-none d-sm-block">
            <div class="container" style="margin-top:5px;">
              <div class="">
                <a href="#"><img src="images/usado11.png" alt="" class="img-fluid" ></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-m6-12 col-sm-12 col-xs-12">
            <div class="container" style="margin-top:5px;">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="#"><img src="images/u11.png" alt="" class="img-fluid"></a>
              </div>
              <div class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="div_ventavehiculo">
                  <p class="text_div_venta_vehiculo upper">CREDITO AUTOMOTRIZ APROBACIÓN <span id="title_red">INMEDIATA</span> EN NUESTRAS OFICINAS <span class="badge badge-success"><small>Ver terminos y condiciones</small></span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <br>
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

    <!--COMIENZO DE CODIGO JAVASCRIPT------------------------------------------------------->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js">  </script>
    <script type="text/javascript" src="js/bootstrap.bundle.js"> </script>
    <script src="js/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" ></script>
    <script type="text/javascript" src="js/chat_menu.js"></script>
    <script language="javascript">
        function soloNumeros(e){
              key = e.keyCode || e.which;
              tecla = String.fromCharCode(key).toLowerCase();
              letras = " 0123456789";//caracteres permitidos
              especiales = "8-37-39-46";//teclas especiales ejem espacio, se puede ver en numero de la letra en el mapa de caracteres

              tecla_especial = false
              for(var i in especiales){
                   if(key == especiales[i]){
                       tecla_especial = true;
                       break;
                   }
               }

               if(letras.indexOf(tecla)==-1 && !tecla_especial){
                   return false;
               }
           }
           function soloLetras(e){
              key = e.keyCode || e.which;
              tecla = String.fromCharCode(key).toLowerCase();
              letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";//caracteres permitidos
              especiales = "8-37-39-46";//teclas especiales ejem espacio, se puede ver en numero de la letra en el mapa de caracteres

              tecla_especial = false
              for(var i in especiales){
                   if(key == especiales[i]){
                       tecla_especial = true;
                       break;
                   }
               }

               if(letras.indexOf(tecla)==-1 && !tecla_especial){
                   return false;
               }
           }
    </script>
    <script type="text/javascript">

      $(document).ready(function(){
        cargaselectmodelo();
        $('#marca').change(function(){
          cargaselectmodelo();
        });
      })//lleva ;?

    </script>
    <script type="text/javascript">

      function cargaselectmodelo(){
        $.ajax({
          type:"POST",
          url:"paginas_funciones/select_busqueda_avanzada1.php",
          data:"marca="+ $('#marca').val(),
          success:function(r){
            $('#modelo').html(r);
          }
        });
      }

    </script>
    <!--JS CAPTHA-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </body>
</html>
