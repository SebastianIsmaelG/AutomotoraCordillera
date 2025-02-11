<div class="col-12">
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-12 p-2">
            <div id="carouselVehiculos<?= $carrousell ?>" class="carousel slide" data-bs-ride="carousel">
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
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselVehiculos<?= $carrousell ?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselVehiculos<?= $carrousell ?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12 p-2">
            <div class="container">
            <div class='container divGradient py-2 contentDetalles'>
                      <div class='row'>
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
                          <p><i class="fa-solid fa-location-dot"></i> <a class="text-decoration-none" target='_blank' href='contacto.php?ub=$setubicacion'> <span> UBICACIÓN: </span> <?= $row['sucursal'] ?></a> </p>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12 p-2">
            <div class="container">
                <div class='row'>
                    <div class='col-12'>
                        <h6 id='linear'>Equipamiento</h6>
                        <p><?= $row['equipamiento'] ?></p>
                    </div>
                    <div class='col-6'>
                        <div id='precio_div'>
                            <h5><?= $row['precio'] ?></h5>
                        </div>
                    </div>
                    <div class='col-6'>
                        <button class="btn btn-light">Cotizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>