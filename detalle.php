<head>
  <meta charset="utf-8">
  <meta name="author" content="Sebastian Gutierrez">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/icons/favicon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <title>Detalle del modelo</title>
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
  <section>
    <!--Traemos datos de id vehiculo desde varias secciones de la pagina los if definen esos botones-->
    <?php
      if (isset($_POST["input_index"])) {

        if (!isset($_POST["value_carID"])) {
          echo "<script>window.location='index.php';</script>";
        }else {
          $id_vehiculo = $_POST["value_carID"];
          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\menu_busqueda_detalle.php';
        }
      }
     ?>
    <div class="container-fluid">
      <div class="container" style="padding:5px;">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'style='padding:5px;'>
                      <div id='carouselExampleIndicators<?php echo$carrousell ?>' class='carousel slide' data-ride='carousel'>
                         <ol class='carousel-indicators'>
                           <li data-target='#carouselExampleIndicators<?php echo$carrousell ?>' data-slide-to='0' class='active'></li>
                           <li data-target='#carouselExampleIndicators<?php echo$carrousell ?>' data-slide-to='1'></li>
                           <li data-target='#carouselExampleIndicators<?php echo$carrousell ?>' data-slide-to='2'></li>
                           <li data-target='#carouselExampleIndicators<?php echo$carrousell ?>' data-slide-to='3'></li>
                           <li data-target='#carouselExampleIndicators<?php echo$carrousell ?>' data-slide-to='4'></li>
                         </ol>
                         <div class='carousel-inner'>
                           <div class='carousel-item active'>
                             <img class='d-block w-100' src='images/autos/<?php echo $setfoto1; ?>' alt='First slide'>
                           </div>
                           <div class='carousel-item'>
                             <img class='d-block w-100' src='images/autos/<?php echo $setfoto2; ?>' alt='Second slide'>
                           </div>
                           <div class='carousel-item'>
                             <img class='d-block w-100' src='images/autos/<?php echo $setfoto3; ?>' alt='Third slide'>
                           </div>
                           <div class='carousel-item'>
                             <img class='d-block w-100' src='images/autos/<?php echo $setfoto4; ?>' alt='Four slide'>
                           </div>
                           <div class='carousel-item'>
                             <img class='d-block w-100' src='images/autos/<?php echo $setfoto5; ?>' alt='Five slide'>
                           </div>
                         </div>
                       </div>
                    </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="vehiculo_data_nombre">
                      <h4 id="linear" class="upper">VEHICULO - <span><?php echo "$setmarca $setmodelo" ?></span></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="container">
                        <div class='row'>
                          <div class='col-lg-6 col-md-6-col-sm-6 col-xs-12'>
                              <div class="form-group">
                                <div id="precio_div2"><h4><span><img style='width:30px; height:20px;' class='img-fluid' src="images/icons/icons8-clasificar.png"><span><?php echo $setprecio; ?></h4></div>
                              </div>
                          </div>
                          <div class='col-lg-6 col-md-6-col-sm-6 col-xs-12'>
                            <div class="form-group">
                              <button data-toggle='modal' data-target='#cotizacionmodal' type='button'class='btn btn-light' id='input_index2' value='cotizar' style='width:100%;' ><span><img src='images/icons/icons8-bill-40.png' class='img-fluid' style='height:30px;width:auto;'></span><span class='cotizar_label'>COTIZAR</span></button>
                            </div>
                          </div>
                        </div>
                        <!--modal cotizar-->
                            <div class='modal fade' id='cotizacionmodal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                  <div class='modal-content'>
                                    <div class='modal-header' style='background-color:#a5cbd9'>
                                      <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span id='title_red'>NOSOTROS</span></h5>
                                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                    </div>
                                    <div class='modal-body'>
                                       <div class='container'>
                                        <form action='paginas_funciones/guardar_cotizacion.php' method='post'>
                                          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                            <p class='upper'>COD:<?php echo $setcodigo, $setmarca, $setmodelo;?></p>
                                          </div>
                                          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                          <div class='form-group'>
                                            <label for='nombres_cotizacion' class='sr-only control-label'>Nombre</label>
                                            <input type='text' class='form-control' id='nombres_cotizacion' name='nombres_cotizacion'  placeholder='Nombre' required>
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
                                              <input type='email' class='form-control' id='mail_cotizacion' name='mail_cotizacion' placeholder='Email' required >
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
                        <div id='div_automovildatos' style="margin:5px;">
                            <div class='container' >
                              <div class='row' style="padding:5px;">
                                  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'  id='division_col_xs'>
                                    <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-car-40.png'></span> <?php echo $setestado ?> </p>
                                  </div>
                                  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                                    <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-fill-color-40.png'></span> <?php echo $setcolor; ?></p>
                                  </div>
                              </div>
                              <div class='row' style="padding:5px;">
                                  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                                    <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u128.png'></span> <?php echo $setcombustible; ?></p>
                                  </div>
                                  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                                    <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u129.png'></span> <?php echo $setkilometraje ?> KM</p>
                                  </div>
                              </div>
                              <div class='row' style="padding:5px;">
                                  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                                    <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u131.png'></span> <?php echo $setano; ?></p>
                                  </div>
                                  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                                    <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-engine-48.png'></span> <?php echo $setcilindrada ?> cc</p>
                                  </div>
                              </div>
                              <div class='row' style="padding:5px;">
                                  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                                    <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u130.png'></span> <?php echo $settransmision ?></p>
                                  </div>
                                  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                                    <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-marcador-48.png'> <a target='_blank' href='contacto.php?ub=$setubicacion'> <?php echo $setubicacion ?></a> </p>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <!--crear un div col-12 para las caracteristicas el cual solo se vera en md y debe ocultar al otro aqui-->
        <div class="row d-block d-lg-none">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-block d-lg-none">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="vehiculo_data_nombre">
                  <h5 id="linear">ESPECIFICACIONES <span id="title_red">TECNICAS</span></h5>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div id='div_automovildatos' style="margin:5px;">
                    <div class='container' >
                      <div class='row' style="padding:5px;">
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'  id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-car-40.png'></span> <?php echo $setestado ?> </p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-fill-color-40.png'></span> <?php echo $setcolor; ?></p>
                          </div>
                      </div>
                      <div class='row' style="padding:5px;">
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u128.png'></span> <?php echo $setcombustible; ?></p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u129.png'></span> <?php echo $setkilometraje ?> KM</p>
                          </div>
                      </div>
                      <div class='row' style="padding:5px;">
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u131.png'></span> <?php echo $setano; ?></p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-engine-48.png'></span> <?php echo $setcilindrada ?> cc</p>
                          </div>
                      </div>
                      <div class='row' style="padding:5px;">
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/u130.png'></span> <?php echo $settransmision ?></p>
                          </div>
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                            <p class="upper"><span><img style='width:30px; height:30px;' class='img-fluid' src='images/icons/icons8-marcador-48.png'> <a target='_blank' href='contacto.php?ub=$setubicacion'> <?php echo $setubicacion ?></a> </p>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---->
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
                  <p id='texto_equipamiento2'><?php echo $setequipamiento ?></p>
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
                    <iframe src="<?php echo $setubicacionframe;?>" height="160px;" width="100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
  <script type="text/javascript" src="js/jquery-3.3.1.min.js">  </script>
  <script type="text/javascript" src="js/bootstrap.bundle.js"> </script>
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
</body>
