<?php
try {

  if (!$cnn) {
    die("Conexion Fallida: " . mysqli_connect_error());
  }

  $sql = "SELECT codigo,marca from marcas";
  $stmt = mysqli_prepare($cnn,$sql);
  mysqli_stmt_execute($stmt);
  $rs = mysqli_stmt_get_result($stmt);

  while($row = mysqli_fetch_assoc($rs)){
    echo "<option value='". htmlspecialchars($row['codigo'])."'>". htmlspecialchars($row['marca'])."</option>";
  }
  mysqli_stmt_free_result($stmt);
  mysqli_stmt_close($stmt);
  

} catch (\Exception $e) {
  echo "Error al tomar datos de la db:select marcas";
}

 ?>
