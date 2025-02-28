<div class="container-fluid divGradient">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="row">
                  <div class="col-12">
                    <div id="ControlCarousel-1" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner my-2">
                        <div class="carousel-item active">
                          <img src="images/autos/<?php echo $vehiculos[0]['foto1']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 1">
                          <span class='spanPrecio'><strong>$<?php echo $vehiculos[0]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[0]['foto2']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 2">
                          <span class='spanPrecio'><strong>$<?php echo $vehiculos[0]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[0]['foto3']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 3">
                          <span class='spanPrecio'><strong>$<?php echo $vehiculos[0]['precio']; ?></strong></span>
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
                    <div class="containerData">
                      <div class="container fontDetalles">
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/marcas/<?php echo $vehiculos[0]['logo']; ?>"> <?php echo $vehiculos[0]['marca']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/icons8-car-40.png"> <?php echo $vehiculos[0]['modelo']; ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u128.png"> <?php echo $vehiculos[0]['combustible']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u129.png"> <?php echo $vehiculos[0]['kilometraje']; ?>KM</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u130.png"> <?php echo $vehiculos[0]['transmision']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u131.png"> <?php echo $vehiculos[0]['ano']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row d-flex w-100 text-center">
                      <div class="col-lg-6 col-md-12 col-sm-12 my-2 ">
                        <form action="detalle.php" method="GET">
                          <input type="hidden" id="id" name="id" value="<?php echo $vehiculos[0]['codigo']; ?>">
                          <input type="submit" class=" flex-fill input-index" name="index" value="Ver Detalles" id="input_index">
                        </form>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-12 my-2 ">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#input_index_cotizacion1" class="flex-fill input-index" id="input_index">
                          <i class="fa-solid fa-phone"></i>COTIZAR
                        </button>
                      </div>
                    </div>
                    <!--Modal Cotizar-->
                    <div class="modal fade" id="input_index_cotizacion1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span class='title_red'>NOSOTROS</span></h5>
                            <button class='labelClose' data-bs-dismiss="modal" aria-label='Close'>
                              <i class="fa-solid fa-xmark"></i>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                              <form id="formGuardarCotizacion" action="funciones/guardarCotizacion.php" method="post">
                                <div class="mb-3">
                                  <p>COD: <?php echo $vehiculos[0]['codigo'] . ' | Vehiculo ' . $vehiculos[0]['marca'] . ' - ' . $vehiculos[0]['modelo']; ?></p>
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
                            <input type="hidden" name="vehiculo_visto" value="<?php echo $vehiculos[0]['marca'] . ' - ' . $vehiculos[0]['modelo'] ?>">
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
                          <span class='spanPrecio'><strong>$<?php echo $vehiculos[1]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[1]['foto2']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 2">
                          <span class='spanPrecio'><strong>$<?php echo $vehiculos[1]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[1]['foto3']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 3">
                          <span class='spanPrecio'><strong>$<?php echo $vehiculos[1]['precio']; ?></strong></span>
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
                    <div class="containerData">
                      <div class="container fontDetalles">
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/marcas/<?php echo $vehiculos[1]['logo']; ?>"> <?php echo $vehiculos[1]['marca']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/icons8-car-40.png"> <?php echo $vehiculos[1]['modelo']; ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u128.png"> <?php echo $vehiculos[1]['combustible']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u129.png"> <?php echo $vehiculos[1]['kilometraje']; ?>KM</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u130.png"> <?php echo $vehiculos[1]['transmision']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u131.png"> <?php echo $vehiculos[1]['ano']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row d-flex w-100 text-center">
                      <div class="col-lg-6 col-md-12 col-sm-12 my-2 ">

                        <form action="detalle.php" method="GET">
                          <input type="hidden" id="id" name="id" value="<?php echo $vehiculos[1]['codigo']; ?>">
                          <input type="submit" class=" flex-fill input-index" name="index" value="Ver Detalles" id="input_index">
                        </form>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-12 my-2 ">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#input_index_cotizacion2" class="flex-fill input-index" id="input_index">
                          <i class="fa-solid fa-phone"></i>COTIZAR
                        </button>
                      </div>
                    </div>
                    <!--Modal Cotizar-->
                    <div class="modal fade" id="input_index_cotizacion2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span class='title_red'>NOSOTROS</span></h5>
                            <button class='labelClose' data-bs-dismiss="modal" aria-label='Close'>
                              <i class="fa-solid fa-xmark"></i>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                              <form id="formGuardarCotizacion" action="funciones/guardarCotizacion.php" method="post">
                                <div class="mb-3">
                                  <p>COD: <?php echo $vehiculos[1]['codigo'] . ' | Vehiculo ' . $vehiculos[1]['marca'] . ' - ' . $vehiculos[1]['modelo']; ?></p>
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
                            <input type="hidden" name="vehiculo_visto" value="<?php echo $vehiculos[1]['marca'] . ' - ' . $vehiculos[1]['modelo'] ?>">
                            <button type='submit' name='btn_guardar' class=' input-index-modal ' id='input_index'><span>ENVIAR DATOS</span></button>
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
                          <span class='spanPrecio'><strong>$<?php echo $vehiculos[2]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[2]['foto2']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 2">
                          <span class='spanPrecio'><strong>$<?php echo $vehiculos[2]['precio']; ?></strong></span>
                        </div>
                        <div class="carousel-item">
                          <img src="images/autos/<?php echo $vehiculos[2]['foto3']; ?>" class="d-block w-100 img-fluid" alt="Vehículo 3">
                          <span class='spanPrecio'><strong>$<?php echo $vehiculos[2]['precio']; ?></strong></span>
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
                    <div class="containerData">
                      <div class="container fontDetalles">
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/marcas/<?php echo $vehiculos[2]['logo']; ?>"> <?php echo $vehiculos[2]['marca']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/icons8-car-40.png"> <?php echo $vehiculos[2]['modelo']; ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u128.png"> <?php echo $vehiculos[2]['combustible']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u129.png"> <?php echo $vehiculos[2]['kilometraje']; ?>KM</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u130.png"> <?php echo $vehiculos[2]['transmision']; ?></p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <p><img class="img-fluid iconoDetalles" src="images/icons/u131.png"> <?php echo $vehiculos[2]['ano']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row d-flex w-100 text-center">
                      <div class="col-lg-6 col-md-12 col-sm-12 my-2 ">

                        <form action="detalle.php" method="GET">
                          <input type="hidden" id="id" name="id" value="<?php echo $vehiculos[2]['codigo']; ?>">
                          <input type="submit" class=" flex-fill input-index" name="index" value="Ver Detalles" id="input_index">
                        </form>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-12 my-2 ">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#input_index_cotizacion3" class="flex-fill input-index" id="input_index">
                          <i class="fa-solid fa-phone"></i>COTIZAR
                        </button>
                      </div>
                    </div>
                    <!--Modal Cotizar-->
                    <div class="modal fade" id="input_index_cotizacion3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>COTIZA CON <span class='title_red'>NOSOTROS</span></h5>
                            <button class='labelClose' data-bs-dismiss="modal" aria-label='Close'>
                              <i class="fa-solid fa-xmark"></i>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                              <form id="formGuardarCotizacion" action="funciones/guardarCotizacion.php" method="post">
                                <div class="mb-3">
                                  <p>COD: <?php echo $vehiculos[2]['codigo'] . ' | Vehiculo ' . $vehiculos[2]['marca'] . ' - ' . $vehiculos[2]['modelo']; ?></p>
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
                            <input type="hidden" name="vehiculo_visto" value="<?php echo $vehiculos[2]['marca'] . ' - ' . $vehiculos[2]['modelo'] ?>">
                            <button type='submit' name='btn_guardar' class=' input-index-modal ' id='input_index'><span>ENVIAR DATOS</span></button>
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