<?php
echo "<div class='row' id='div_automovils'>";
  echo "<div class='col-lg-4 col-md-5 col-sm-12 col-xs-12'style='padding:5px;' >";//CUADRO SLIDER
        echo "<div id='carouselExampleControls$carrousell' class='carousel slide' data-ride='carousel'>
                        <div class='carousel-inner'>
                              <div class='carousel-item active'>
                                <img class='d-block w-100' src='images/autos/$setfoto1' alt='First slide'>
                              </div>
                              <div class='carousel-item'>
                                <img class='d-block w-100'  src='images/autos/$setfoto2' alt='Second slide'>
                              </div>
                              <div class='carousel-item'>
                                <img class='d-block w-100'  src='images/autos/$setfoto3' alt='Third slide'>
                              </div>
                              <div class='carousel-item'>
                                <img class='d-block w-100'  src='images/autos/$setfoto4' alt='Four slide'>
                              </div>
                              <div class='carousel-item'>
                                <img class='d-block w-100'  src='images/autos/$setfoto5' alt='Five slide'>
                              </div>
                        </div>
                        <a class='carousel-control-prev' href='#carouselExampleControls$carrousell' role='button' data-slide='prev'>
                          <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                          <span class='sr-only'>Previous</span>
                        </a>
                        <a class='carousel-control-next' href='#carouselExampleControls$carrousell' role='button' data-slide='next'>
                          <span class='carousel-control-next-icon' aria-hidden='true'></span>
                          <span class='sr-only'>Next</span>
                        </a>
                </div>";
  echo "</div>";
  echo "<div class='col-lg-4 col-md-7 col-sm-12 col-xs-12' style='padding:5px;'>";//CUADRO DATOS
          echo "<div id='div_automovildatostitle'>
                  <div class='container'>
                    <div class='row'>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                          <p class='upper' id='linear'><strong> $setmarca </strong></p>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                          <p class='upper'><strong> $setmodelo </strong></p>
                        </div>
                    </div>
                  </div>
                </div>";
          echo "<div id='div_automovildatos'>
                  <div class='container' style='background-color:white;'>
                    <div class='row'>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'  id='division_col_xs'>
                          <p><span><img style='width:20px; height:20px;' class='img-fluid' src='images/icons/icons8-car-40.png'></span> $setestado </p>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                          <p><span><img style='width:20px; height:20px;' class='img-fluid' src='images/icons/icons8-fill-color-40.png'></span> $setcolor</p>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                          <p><span><img style='width:20px; height:20px;' class='img-fluid' src='images/icons/u128.png'></span> $setcombustible</p>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                          <p><span><img style='width:20px; height:20px;' class='img-fluid' src='images/icons/u129.png'></span> $setkilometraje KM</p>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                          <p><span><img style='width:20px; height:20px;' class='img-fluid' src='images/icons/icons8-engine-48.png'></span> $setcilindrada cc</p>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                          <p><span><img style='width:20px; height:20px;' class='img-fluid' src='images/icons/icons8-marcador-48.png'> <a target='_blank' href='contacto.php?ub=$setubicacion'>$setubicacion</a> </p>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                          <p><span><img style='width:20px; height:20px;' class='img-fluid' src='images/icons/u130.png'></span> $settransmision</p>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' id='division_col_xs'>
                          <p><span><img style='width:20px; height:20px;' class='img-fluid' src='images/icons/u131.png'></span> $setano</p>
                        </div>
                    </div>
                    </div>
                </div>";
  echo "</div>";
  echo "<div class='col-lg-4 col-md-12 col-sm-12 col-xs-12' style='padding:5px;'>";//CUADRO COTIZAR
          echo "<div class='row'>
                  <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify'>
                      <div class='row'>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-4' style='width:40%;'>
                          <h6 id='linear'>Equipamiento</h6>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-8' style='width:50%;'>
                          <div class='row'>
                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' style='width:50%'>
                              <div class='lazy'><iframe src='https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%3A8090%2FProyectos%2Fautomotora2.0%2Fmenu_busqueda.php%3Fbusqueda_index%3D$setcodigo%26btn_busc%3DBuscar&layout=button&size=small&width=81&height=20&appId' width='81' height='20' style='border:none;overflow:hidden' scrolling='no' frameborder='0' allowTransparency='true' allow='encrypted-media'></iframe></div>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6' style='width:50%'>
                              <div class='lazy'><a class='twitter-share-button' href='https://twitter.com/intent/tweet' data-size='default'>Tweet</a></div>
                            </div>
                          </div>
                        </div>
                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                          <p id='texto_equipamiento' style='margin-top:25px;'>$setequipamiento</p>
                        </div>
                      </div>
                  </div>
                  <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class='row'>
                      <div class='col-lg-6 col-md-6-col-sm-6 col-xs-12' style='width:50%;'>
                          <div id='precio_div'><h5>$ $setprecio</h5></div>
                      </div>
                      <div class='col-lg-6 col-md-6-col-sm-6 col-xs-12' style='width:50%;'>
                        <div ><button data-toggle='modal' data-target='#cotizacion$modalwindow' type='button'class='btn btn-light' id='input_index2' value='cotizar' style='width:100%;' ><span><img src='images/icons/icons8-bill-40.png' class='img-fluid' style='height:30px;width:auto;'></span><span class='cotizar_label'>COTIZAR</span></button></div>
                      </div>
                    </div>
                  </div>
                </div>";
  echo "</div>";
echo "</div>";
// Modal cotizar hay que hacer que tenga un unique value y que tome el id del vehiculo para el submit
echo "<div class='modal fade' id='cotizacion$modalwindow' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
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
                    <p class='upper'>COD:$setcodigo - $setmarca  $setmodelo</p>
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
      </div>";


 ?>
