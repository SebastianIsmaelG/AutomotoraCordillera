<?php
    $variable_ajax = $_POST["marca"];

    try {
      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
      if (!$cnn) {
        die("Conexion Fallida: " . mysqli_connect_error());

      }else {
        $sql = "SELECT modelo FROM vehiculos WHERE (vehiculos.marca= '$variable_ajax') ";
        $result = mysqli_query($cnn,$sql);
        $cadena = "<select class='form-control' id='sel_modelo' name='sel_modelo' style='width:100%;'><option value='0'>Todos los disponibles</option>";

        while ($ver=mysqli_fetch_row($result)) {
          $cadena= $cadena.'<option value="'.utf8_encode($ver[0]).'">'.utf8_encode($ver[0]).'</option>';
        }
        echo $cadena."</select>";
      }
    } catch (\Exception $e) {

    }



 ?>
