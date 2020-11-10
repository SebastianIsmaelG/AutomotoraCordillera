<?php
  try {

    include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
    $numero=0;

    if (!$cnn) {
      die("Conexion Fallida: " . mysqli_connect_error());
    }else{
        $sql = "SELECT c.codigo_cotizacion, c.nombre_cliente, c.telefono_cliente, c.email_cliente, c.mensaje_cliente, c.estado, c.fecha from cotizaciones as c  WHERE (c.estado='pendiente' and c.vehiculo_visto=0) ";
        $rs = mysqli_query($cnn,$sql);
        $modalwindow = 0;
        while ($fila = mysqli_fetch_row($rs)){
          $modalwindow++;
          echo "<tr><td>" . $fila["0"] . "</td>";
          echo "<td>" . $fila["6"] . "</td>";
          echo "<td>" . $fila["1"] . "</td>";
          echo "<td>" . $fila["2"] . "</td>";
          echo "<td>".$fila["3"]."</td>";
          echo "<td >".$fila["4"]."</td>";
          echo "<td> <form method='post' action='../paginas_funciones/comprobar_cotizacion.php'><input type='hidden' name='id_cotizacion' value='".$fila["0"]."'><input type='submit' class='btn btn-primary' name='btn_comprobar' value='Realizada'></form></td>";
          echo "<td><button type='button' data-toggle='modal' data-target='#eliminarcotizacion$modalwindow' class='btn btn-danger'>Eliminar</button></td>";

          echo "<div class='modal fade' id='eliminarcotizacion$modalwindow' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                  <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header' style='background-color:#007bff'>
                        <h5 class='modal-title' id='exampleModalLongTitle' style='color:white;'>Eliminar Cotizacion</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body'>
                         <div class='container'>
                          <form action='../paginas_funciones/eliminar_cotizacion.php' method='post'>
                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                              <p class='upper'>¿Esta seguro que desea eliminar la cotizacion?</p>
                              <p class='upper'>COD: " . $fila["0"] . "</p>
                              <p class='upper'>Estado cotizacion <span style='color:red;'>" . $fila["5"] . "</span></p>
                            </div>
                      </div>
                      <div class='modal-footer'>
                         <input  type='hidden' name='text_cotizacion' value='" . $fila["0"] . "'></input>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal' id='input_index2'><span class='cotizar_label'>CERRAR</span></button>
                        <button type='submit' name='btn_eliminar' class='btn btn-secondary' id='input_index2'><span class='cotizar_label'>ELIMINAR</span></button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>";
          $numero++;
        }
        echo "<tr><td colspan=\"7\"><b>Número de resultados : " . $numero .
            "</b></td></tr>";
        mysqli_free_result($rs);
        mysqli_close($cnn);
      }



  } catch (\Exception $e) {

  }



 ?>
