<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
if (!isset($_POST['txt_nombre_admin']) || !isset($_POST['txt_password_admin']) || !isset($_POST['sel_privilegio']) ) {//Si de alguna las variables estan vacias
  header('location:ingreso_administrativo.php');//CAMBIAR A ENLACE HOST SEMANTICA=EH
}else{
    try {

      //Conection papu
      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

      if (!$cnn) {
        die("Conexion Fallida: " . mysqli_connect_error());
      }else {
        $nombre_usuario = $_POST['txt_nombre_admin']; //Nombre del usuario
        $contraseña_usuario = $_POST['txt_password_admin'];//Contraseña usuario
        $privilegio_usuario = $_POST['sel_privilegio']; //Nivel del usuario

        $sql = mysqli_prepare($cnn,"SELECT privilegio,nombre FROM usuarios WHERE (nombre = ? and password = ? and privilegio = ?)");
        mysqli_stmt_bind_param($sql, "ssi", $nombre_usuario, $contraseña_usuario, $privilegio_usuario);

        $rs = mysqli_stmt_execute($sql);


          mysqli_stmt_bind_result($sql, $privilegio,$nombre);
            while ($fila = mysqli_stmt_fetch($sql)) {
                $nivel = $privilegio;
                $nombr = $nombre;
            }
          mysqli_close($cnn);

            switch ($nivel) {
              case '1':
                $_SESSION["usuario_administrativo"]=$nombr;
                echo "<script>window.location='../paginas_administracion/principal_administrativo.php';</script>";

                break;
              case '2':
                $_SESSION["usuario_ejecutivo"]=$nombr;
                echo "<script>window.location='../paginas_ejecutivo/principal_ejecutivo.php';</script>";
                break;
              default:
                  echo "<script>window.location='../ingreso_administrativo.php';</script>";

                break;
          }
        }


    } catch (\Exception $e) {

    }


}
?>
