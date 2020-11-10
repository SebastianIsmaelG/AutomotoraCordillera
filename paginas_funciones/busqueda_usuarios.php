<?php
        try {
                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
                $numero=0;

               if (!$cnn) {
                 die("Conexion Fallida: " . mysqli_connect_error());
               }else {
                 $sql = "SELECT nombre,nombres,apellidos,privilegio,email from usuarios";
                 $rs = mysqli_query($cnn,$sql);
                 $modalwindow=0;
                 while ($fila = mysqli_fetch_row($rs)){
                    $modalwindow++;
                   if ($fila["3"]=="2") {
                     $privilegio="Secretaría";
                   }else {
                     if ($fila["3"]=="1") {
                       $privilegio="Administración";
                     }
                   }

                   echo "<tr><td>" . $fila["0"] . "</td>";
                   echo "<td>" . $fila["1"] . "</td>";
                   echo "<td>" . $fila["2"] . "</td>";
                   echo "<td>" . $privilegio . "</td>";
                   echo "<td>" . $fila["4"] . "</td>";
                   echo "<td><button type='button' data-toggle='modal' data-target='#cotizacion$modalwindow' class='btn btn-primary' name='mod_usuario'>Modificar</button></td>";
                   // Modal editar toma los datos del usuario y rellena campos
                   echo "<div class='modal fade' id='cotizacion$modalwindow' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                           <div class='modal-dialog modal-dialog-centered' role='document'>
                             <div class='modal-content'>
                               <div class='modal-header' style='background-color:#007bff'>
                                 <h5 class='modal-title' id='exampleModalLongTitle' style='color:white;'>Modificando Usuario</h5>
                                 <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                   <span aria-hidden='true'>&times;</span>
                                 </button>
                               </div>
                               <div class='modal-body'>
                                  <div class='container'>
                                   <form action='../paginas_funciones/modificar_usuario.php' method='post'>
                                     <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                       <p class='upper'>Usuario: " . $fila["0"] . "</p>
                                     </div>
                                     <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                       <div class='form-group'>
                                         <label for='nombre_usuario' class='sr-only control-label'>Nombres </label>
                                         <input type='text' class='form-control' id='nombre_usuario' name='edicion_nombre_usuario' placeholder='Nombres Usuario' value='". $fila["1"] ."' onkeypress='return soloLetras(event)' maxlength='12' required>
                                       </div>
                                     </div>
                                     <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                       <div class='form-group'>
                                         <label for='apellido_usuario' class='sr-only control-label'>Apellidos </label>
                                         <input type='text' class='form-control' id='apellido_usuario' name='edicion_apellido_usuario' placeholder='Apellidos Usuario' value='". $fila["2"] ."' onkeypress='return soloLetras(event)' maxlength='12' required>
                                       </div>
                                     </div>
                                     <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                       <div class='form-group'>
                                         <label for='email_usuario' class='sr-only control-label'>Email </label>
                                         <input type='text' class='form-control' id='email_usuario' name='edicion_email_usuario' placeholder='Email Usuario' value='". $fila["4"] ."' onkeypress='' maxlength='50' required>
                                       </div>
                                     </div>
                                  </div>
                               </div>
                               <div class='modal-footer'>
                                  <input  type='hidden' name='usuario_modificar' value='" . $fila["0"] . "'></input>
                                 <button type='button' class='btn btn-secondary' data-dismiss='modal' id='input_index2'><span class='cotizar_label'>CERRAR</span></button>
                                 <button type='submit' name='btn_guardar' class='btn btn-secondary' id='input_index2'><span class='cotizar_label'>MODIFICAR DATOS</span></button>
                               </div>
                               </form>
                             </div>
                           </div>
                         </div>";

                   echo "<td><form action='../paginas_funciones/eliminar_usuario.php' method='post'><input type='hidden'  name='nombre_usuario' value='".$fila["0"]."'><input type='submit' class='btn btn-danger' name='del_usuario' value='Eliminar'></form></td></tr>";
                   $numero++;
                 }
                 echo "<tr><td colspan=\"15\"><b>Total de resultados : " . $numero .
                     "</b></td></tr>";
                 mysqli_free_result($rs);
                 mysqli_close($cnn);
               }
      } catch (\Exception $e) {
                echo "<script>alert('No funciono la consulta')</script>";
            }
?>
