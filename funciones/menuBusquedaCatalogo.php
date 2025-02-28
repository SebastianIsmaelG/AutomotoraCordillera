<div class="col-12">
  <div class="row">
    <div class="col-lg-4 col-md-12 col-sm-12 p-2">
      <div class="container">
        <div id="carouselVehiculos<?= $carrousell; ?>" class="carousel slide" data-bs-ride="carousel">
          <div class='carousel-inner'>
            <div class='carousel-item active'>
              <img class='d-block w-100' src='images/autos/<?= $row['foto1'] ?>' alt='Primer slide'>
            </div>
            <div class='carousel-item'>
              <img class='d-block w-100' src='images/autos/<?= $row['foto2'] ?>' alt='Segundo slide'>
            </div>
            <div class='carousel-item'>
              <img class='d-block w-100' src='images/autos/<?= $row['foto3'] ?>' alt='Tercer slide'>
            </div>
            <div class='carousel-item'>
              <img class='d-block w-100' src='images/autos/<?= $row['foto4'] ?>' alt='Cuarto slide'>
            </div>
            <div class='carousel-item'>
              <img class='d-block w-100' src='images/autos/<?= $row['foto5'] ?>' alt='Quinto slide'>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselVehiculos<?= $carrousell; ?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselVehiculos<?= $carrousell; ?>" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 p-2">
      <div class='container divGradient py-2 fontDetalles'>
        <div class='row'>
          <div class="col-12">
            <h3 class="h4"> <?= $row['marca'] ." ".
                  $row['modelo'];  ?></h3>
          </div>
          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
            <p><i class="fas fa-car"></i><span> ESTADO: </span> <?= $row['estado'] ?> </p>
          </div>
          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
            <p><i class="fas fa-palette"></i><span> COLOR: </span><?= $row['color'] ?></p>
          </div>
        </div>
        <div class='row'>
          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
            <p><i class="fas fa-gas-pump"></i><span> COMBUSTIBLE: </span> <?= $row['combustible'] ?></p>
          </div>
          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
            <p><i class="fa-solid fa-gears"></i><span> TRANSMISIÓN: </span> <?= $row['transmision'] ?></p>
          </div>
        </div>
        <div class='row'>
          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
            <p><i class="fa-solid fa-calendar"></i><span> AÑO: </span> <?= $row['ano'] ?></p>
          </div>
          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
            <p><i class="fas fa-tachometer-alt"></i><span> KILOMETRAJE: </span> <?= $row['kilometraje'] ?> KM</p>
          </div>
        </div>
        <div class='row'>
          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
            <p><i class="fa-solid fa-screwdriver-wrench"></i><span> CILINDRADA: </span> <?= $row['cilindrada'] ?> L</p>
          </div>
          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
            <p><i class="fa-solid fa-location-dot"></i>
              <a class="text-decoration-none" target='_blank' href='contacto.php?ub=<?=strip_tags($row['codigoSucursal']) ?>'> 
                <span> UBICACIÓN: </span> <?= $row['sucursal'] ?>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 p-2">
      <div class="container divGradient py-2 fontDetalles">
        <div class='row'>
          <div class='col-12'>
            <h6 id='linear'>Equipamiento</h6>
            <p><?= $row['equipamiento'] ?></p>
          </div>
          <div class='col-6'>
            <div class="containerPrecio py-1">
              <h5 class="py-1">$ <?= $row['precio'] ?></h5>
            </div>
          </div>
          <div class='col-6'>
            <button type="button" id="btnCotizacion" class="btn btn-light btn-lg btnCotizarLabel" data-bs-toggle="modal" data-bs-target="#modalCotizacion<?= $modalwindow; ?>">
              <span class="cotizarLabel" value="cotizar">COTIZAR</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!--modal cotizar-->
    <div class="modal fade" id="modalCotizacion<?= $modalwindow; ?>" tabindex="-1" role="dialog" aria-labelledby="btnCotizacion" aria-hidden="true">
      <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title'>COTIZA CON <span class='title_red'>NOSOTROS</span></h5>
            <button class='labelClose' data-bs-dismiss="modal" aria-label='Close'>
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <form id="formGuardarCotizacion" action="funciones/guardarCotizacion.php" method="post">
                <div class="mb-3">
                  <p>COD: <?= $row['codigo'] . ' | Vehiculo ' . $row['marca'] . ' - ' . $row['modelo']; ?></p>
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
            <input type="hidden" name="vehiculo_visto" value="<?= $marca . ' - ' . $modelo ?>">
            <button type='submit' name='btn_guardar' class=' input-index-modal ' id='input_index'><span>ENVIAR DATOS</span></button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!--Fin modal-->

  </div>
</div>