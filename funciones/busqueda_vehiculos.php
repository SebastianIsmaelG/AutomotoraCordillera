<?php
  try {

    include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
    $numero=0;

    if (!$cnn) {
      die("Conexion Fallida: " . mysqli_connect_error());
    }else{
        $sql = "SELECT v.codigo_vehiculo,v.modelo,m.marca,v.estado,v.ano from vehiculos as v INNER JOIN marcas as m on v.marca = m.codigo_marca ORDER BY v.codigo_vehiculo ASC";
        $rs = mysqli_query($cnn,$sql);
        $rowCount

        while ($fila = mysqli_fetch_row($rs)){
          echo "<tr><td width=\"15%\">" . $fila["0"] . "</td>";
          echo "<td width=\"15%\">" . $fila["1"] . "</td>";
          echo "<td width=\"15%\">" . $fila["2"] . "</td>";
          echo "<td width=\"15%\">" . $fila["3"] . "</td>";
          echo "<td width=\"15%\">".$fila["4"]."</td>";
          echo "<td width=\"15%\"><form method='POST' target='_blank' action='../detalle.php'><input name='value_carID' type='hidden' value='".$fila["0"] ."' ><input type='submit' style='width:100%' class='btn btn-primary' id='bt_del' value='Ver' name='input_index'> </form></td></tr>";
          $numero++;
        }
        echo "<tr><td colspan=\"6\"><b>Número de resultados : " . $numero .
            "</b></td></tr>";
        mysqli_free_result($rs);
        mysqli_close($cnn);
      }



  } catch (\Exception $e) {

  }



 ?>
