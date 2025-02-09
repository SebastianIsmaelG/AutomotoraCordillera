<?php
if (!isset($_SESSION["usuario_administrativo"])) {
     echo "<script>window.location='../ingreso_administrativo.php';</script>";
  }else {
    //Toma nombre y apellidos para la session
        try {
        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

          if (!$cnn) {
            die("Conexion Fallida: " . mysqli_connect_error());
          }else{
            $sql = mysqli_prepare($cnn,"SELECT u.nombres,u.apellidos FROM usuarios as u WHERE (nombre = ?)");
            mysqli_stmt_bind_param($sql, "s", $_SESSION["usuario_administrativo"]);
            $rs = mysqli_stmt_execute($sql);

            mysqli_stmt_bind_result($sql, $nombes_session,$apellidos_session);
              while ($fila = mysqli_stmt_fetch($sql)) {
                  $ns = $nombes_session;
                  $as = $apellidos_session;
              }
            mysqli_close($cnn);
          }

        } catch (\Exception $e) {
          echo "Excepcion ocurrida al intertar logearse, reportar al administrador";
      }
  } ?>
