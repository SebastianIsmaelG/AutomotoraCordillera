<?php
try {
  require_once 'dbcall.php';

  if (!$cnn) {
    die("Error de conexión: " . mysqli_connect_error());
  }

  $sql = "SELECT codigo,categoria from categorias";
  $stmt = mysqli_prepare($cnn,$sql);
  mysqli_stmt_execute($stmt);
  $rs = mysqli_stmt_get_result($stmt);

  while($row = mysqli_fetch_assoc($rs)){
    echo "<option value='". htmlspecialchars($row['codigo']) ."'>". htmlspecialchars(trim($row['categoria'])) ."</option>";
  }
  mysqli_stmt_free_result($stmt);
  mysqli_stmt_close($stmt);

} catch (\Exception $e) {
  echo "Error al tomar datos de la db:select marcas";
}

?>
