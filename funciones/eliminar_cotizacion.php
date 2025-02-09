<?php
  if (!isset($_POST["btn_eliminar"])) {
    header('location:/paginas_administracion/cotizaciones_administrativo.php');
  }else {
    if (!isset($_POST["text_cotizacion"])) {
        header('location:/paginas_administracion/cotizaciones_administrativo.php');
    }else {
      try {

        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
        if (!$cnn) {
          die("Conexion Fallida: " . mysqli_connect_error());
        }else{
          try {
            $cotizacion = $_POST["text_cotizacion"];
            $sql = mysqli_prepare($cnn,"DELETE from cotizaciones WHERE (codigo_cotizacion=?)");
            mysqli_stmt_bind_param($sql,"i",$cotizacion);
            mysqli_stmt_execute($sql);
            mysqli_stmt_free_result($sql);
            mysqli_close($cnn);
            echo "<script>alert('Solicitud procesada con exito');window.location= '../paginas_administracion/cotizaciones_administrativo.php';</script>";
          } catch (\Exception $e) {

          }

        }
      } catch (\Exception $e) {

      }

    }
  }

 ?>
