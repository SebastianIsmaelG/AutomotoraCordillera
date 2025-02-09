<?php
        try {
                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
                $numero=0;

               if (!$cnn) {
                 die("Conexion Fallida: " . mysqli_connect_error());
               }else {
                 $sql = "select codigo_marca,marca,logo from marcas ";
                 $rs = mysqli_query($cnn,$sql);
                 $modalwindow=0;
                 while ($fila = mysqli_fetch_row($rs)){
                   $modalwindow ++;
                   echo "<tr><td>" . $fila["0"] . "</td>";
                   echo "<td>" . $fila["1"] . "</td>";
                   echo "<td>" . $fila["2"] . "</td>";
                   echo "<td><button type='button' data-toggle='modal' data-target='#modificarmarca$modalwindow' class='btn btn-primary' name='mod_usuario'>Modificar</button></td></tr>";
                   //Modal para la modificacion marcas
                   echo "<form action='../paginas_funciones/modificar_marcas.php' method='post' enctype='multipart/form-data'><div class='modal fade' id='modificarmarca$modalwindow' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                          <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                              <div class='modal-header' style='background-color:#007bff;color:white;'>
                                <h5 class='modal-title' id='exampleModalLabel'>Modificando Marca</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>
                              <div class='modal-body'>
                                <div class='container'>
                                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                      <p class='upper'>COD MARCA: " . $fila["0"] . "</p>
                                      <input type='hidden' name='modificarM_codigo' value='". $fila["0"] ."'>
                                    </div>
                                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                      <div class='form-group'>
                                        <label for='nombre_marca' class=' control-label'>Nombre Marca </label>
                                        <input type='text' class='form-control' id='nombre_marca' name='modificarM_nombre' value='". $fila["1"] ."'  required>
                                      </div>
                                    </div>
                                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                      <div class='form-group'>
                                        <label for='logo_marca' class=' control-label'>Logotipo </label>
                                        <input type='hidden' name='ModificarM_oldLogotipo' value='". $fila["2"] ."'>
                                        <input type='file' class='form-control' id='logo_marca' name='modificarM_logotipo'>
                                      </div>
                                    </div>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' id='input_index2' data-dismiss='modal'>CERRAR</button>
                                <button type='submit' class='btn btn-primary' name='btn_md_dato' id='input_index2'>MODIFICAR</button>
                              </div>
                            </div>
                          </div>
                        </div></form>";
                   $numero++;
                 }
                 echo "<tr><td colspan='10'><b>Total de resultados : " . $numero .
                     "</b></td></tr>";
                 mysqli_free_result($rs);
                 mysqli_close($cnn);
               }
      } catch (\Exception $e) {
                echo "<script>alert('No funciono la consulta')</script>";
            }
?>
