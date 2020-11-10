<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  if (!isset($_POST["del_usuario"])) {
    echo "<script>window.location= '../paginas_administracion/usuarios_administrativo.php'</script>";
  }else{
    try {
        $usariodel = $_POST["nombre_usuario"];
        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
        if (!$cnn) {
          die("Conexion Fallida: " . mysqli_connect_error());
        }else{
          $sql = mysqli_prepare($cnn,"DELETE FROM usuarios WHERE(nombre=?)");
          mysqli_stmt_bind_param($sql,"s",$usariodel);
          $rs = mysqli_stmt_execute($sql);
          mysqli_stmt_free_result($sql);
          mysqli_close($cnn);
          echo "<script>alert('Usuario Eliminado');window.location= '../paginas_administracion/usuarios_administrativo.php'</script>";
        }
    } catch (\Exception $e) {

    }

  }
