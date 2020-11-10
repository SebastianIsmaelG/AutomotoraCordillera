<?php
  try {

    include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
    $numero=0;

    if (!$cnn) {
      die("Conexion Fallida: " . mysqli_connect_error());
    }else{
        $sql = "SELECT c.codigo_cotizacion, c.nombre_cliente, c.telefono_cliente, c.email_cliente, c.mensaje_cliente, c.estado, c.fecha from cotizaciones as c WHERE (c.estado='confirmada') LIMIT 30";
        $rs = mysqli_query($cnn,$sql);

        while ($fila = mysqli_fetch_row($rs)){
          echo "<tr><td>" . $fila["0"] . "</td>";
          echo "<td>" . $fila["6"] . "</td>";
          echo "<td >" . $fila["1"] . "</td>";
          echo "<td >" . $fila["2"] . "</td>";
          echo "<td >".$fila["3"]."</td>";
          echo "<td >".$fila["4"]."</td>";
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
