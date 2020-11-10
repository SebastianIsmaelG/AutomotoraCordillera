<?php
  try {
    include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

    if (!$cnn) {
      die("Conexion Fallida: " . mysqli_connect_error());
    }else{
      $sql = "SELECT logo,marca,codigo_marca from marcas";
      $rs = mysqli_query($cnn,$sql);
      while ($row = mysqli_fetch_row($rs)){

       echo "<a class='dropdown-item' href='menu_busqueda.php?codigoM=".$row["2"]."'><img src='images/marcas/".$row["0"]."' width='30px;' height='30px;'> ".$row["1"]."</a> ";
      }
      mysqli_free_result($rs);
      mysqli_close($cnn);
    }
  } catch (\Exception $e) {
    echo "Error al tomar datos de la db:select marcas";
  }

 ?>
