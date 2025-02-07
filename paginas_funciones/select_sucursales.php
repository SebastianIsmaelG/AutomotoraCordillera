
<?php
  try {

    include '/paginas_funciones/dbcall.php';
   if (!$cnn) {
     die("Conexion Fallida: " . mysqli_connect_error());
   }else {
     $sql = "SELECT `codigo_sucursal`, `nombre_sucursal`,`numero_sucursal`  FROM `sucursal`";
     $rs = mysqli_query($cnn,$sql);
     while ($row = mysqli_fetch_row($rs)){

       echo "<option value='".$row["0"]."'>".$row["1"]."--".$row["2"]."</option>";
     }
     mysqli_free_result($rs);
     mysqli_close($cnn);
   }
  } catch (\Exception $e) {
    echo "<script>alert('No funciono la consulta')</script>";
  }

 ?>
