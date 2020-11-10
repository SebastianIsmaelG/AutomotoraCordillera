<?php
if (!isset($_POST['btn_guardar'])) {
  echo "<script>window.location= '../paginas_administracion/usuarios_administrativo.php'</script>";
}else {
  try {
      if (!isset($_POST["usuario_modificar"])) {
        echo "<script>window.location= '../paginas_administracion/usuarios_administrativo.php'</script>";
      }
      $usuario = $_POST["usuario_modificar"];
      $nombre_nuevo = $_POST["edicion_nombre_usuario"];
      $apellido_nuevo = $_POST["edicion_apellido_usuario"];
      $email_nuevo = $_POST["edicion_email_usuario"];
      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
      if (!$cnn) {
        die("Conexion Fallida: " . mysqli_connect_error());
      }else{
        $sql = mysqli_prepare($cnn,"UPDATE usuarios SET nombres=?, apellidos=?, email=?  WHERE(nombre= ?)");
        mysqli_stmt_bind_param($sql,"ssss",$nombre_nuevo,$apellido_nuevo,$email_nuevo,$usuario);
        $rs = mysqli_stmt_execute($sql);
        mysqli_stmt_free_result($sql);
        mysqli_close($cnn);
        vhhkuliñ{h8ofecho "<script>alert('Usuario Modificado');window.location= '../paginas_administracion/usuarios_administrativo.php'</script>";
      }
  } catch (\Exception $e) {
    echo "<script>alert('Exception de Sql');window.location= '../paginas_administracion/usuarios_administrativo.php'</script>";
  }

}
 ?>
