<?php
try {
  include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

  if (!$cnn) {
    die("Conexion Fallida: " . mysqli_connect_error());
  }else{
    $sql = "SELECT codigo_marca,marca from marcas";
    $rs = mysqli_query($cnn,$sql);
    while ($row = mysqli_fetch_row($rs)){

      echo "<option value='".$row["0"]."'>".$row["1"]."</option>";
    }
    mysqli_free_result($rs);
    mysqli_close($cnn);
  }
} catch (\Exception $e) {
  echo "Error al tomar datos de la db:select marcas";
}

 ?>
