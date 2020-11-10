<?php
if (!isset($_POST["btn_comprobar"])) {
  header('location:../paginas_administracion/cotizaciones_administrativo.php');
}else{
  if (!isset($_POST["id_cotizacion"])) {
    echo "<script>alert('No se pudo tomar el id de la cotizacion')</script>";
  }else {
    try {
      $cotizacion = $_POST["id_cotizacion"];

      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
      if (!$cnn) {
        die("Conexion Fallida: " . mysqli_connect_error());
      }else{
        $sql = mysqli_prepare($cnn,"Update cotizaciones set estado='confirmada' where (codigo_cotizacion=?)");
        mysqli_stmt_bind_param($sql,"i",$cotizacion);
        mysqli_stmt_execute($sql);
        mysqli_stmt_free_result($sql);
      }
      mysqli_close($cnn);
      echo "<script>alert('Solicitud procesada con exito');window.location= '../paginas_administracion/cotizaciones_administrativo.php';</script>";
    } catch (\Exception $e) {

    }

  }
}
 ?>
