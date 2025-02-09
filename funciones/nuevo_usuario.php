<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
  if (!isset($_POST["btn_guardar"])) {
    echo "<script>window.location= '../paginas_administracion/usuarios_administrativo.php'</script>";
  }else {
        try {
            $privilegio ="2";
            $nombre_usuario= $_POST["text_user"];
            $contraseña_usuario = $_POST["password"];
            $re_contraseña_usuario = $_POST["cfmPassword"];
            $real_nombre  = $_POST["nombre_real"];
            $real_apellido = $_POST["apellido_real"];

            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
            if (!$cnn) {
                die("Conexion Fallida: " . mysqli_connect_error());
            }else{
                  $sql = mysqli_prepare($cnn,"SELECT * FROM usuarios WHERE nombre = ?");
                  mysqli_stmt_bind_param($sql,"s",$nombre_usuario);
                  $rs = mysqli_stmt_execute($sql);

                        mysqli_stmt_store_result($sql);
                  $contar = mysqli_stmt_num_rows($sql);

                        if ($contar==0) {
                            if ($contraseña_usuario==$re_contraseña_usuario) {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
                              if (!$cnn) {
                                  die("Conexion Fallida: " . mysqli_connect_error());
                              }else{

                                  $sql = mysqli_prepare($cnn,"INSERT INTO usuarios (privilegio,nombre,password,nombres,apellidos) VALUES (?,?,?,?,?)");
                                  mysqli_stmt_bind_param($sql,"issss",$privilegio,$nombre_usuario,$contraseña_usuario,$real_nombre,$real_apellido);
                                  $rs = mysqli_stmt_execute($sql);

                                  mysqli_stmt_free_result($sql);
                                  mysqli_close($cnn);
                                  echo "<script>alert('Usuario añadido con exito');window.location= '../paginas_administracion/usuarios_administrativo.php'</script>";
                              }

                  }else {
                      echo "<script>alert('No se puede proceder con estos datos: Contraseñas con coinciden');window.history.back();</script>";
                  }
              }else {
                  echo "<script>alert('No se puede proceder con estos datos: El nombre de usuario ya existe');window.history.back();</script>";

              }

            }
        } catch (\Exception $e) {

        }

  }
 ?>
