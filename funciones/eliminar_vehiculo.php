<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);

  if (!isset($_POST["btn_eliminar"])) {
    echo "<script>window.location= '/paginas_administracion/vehiculos_administrativo.php'</script>";
  }else {
    try {
        $id_vehiculo = $_POST["nombre_auto_cambiar2"];
        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
        if (!$cnn) {
          die("Conexion Fallida: " . mysqli_connect_error());
        }else{
          #SENTENCIA 1 -> SE BUSCA ELIMINAR LAS FOTOS DEL AUTO ANTES DE BORRARLO DE LA DB
          $sql = mysqli_prepare($cnn,"SELECT foto1,foto2,foto3,foto4,foto5 FROM vehiculos where (codigo_vehiculo=?) ");
          mysqli_stmt_bind_param($sql,"i",$id_vehiculo);
          mysqli_stmt_execute($sql);

          mysqli_stmt_bind_result($sql,$foto1,$foto2,$foto3,$foto4,$foto5);

            while ($fila = mysqli_stmt_fetch($sql)) {
                $f1 = $foto1;
                $f2 = $foto2;
                $f3 = $foto3;
                $f4 = $foto4;
                $f5 = $foto5;
            }

            unlink("/storage/ssd3/242/8557242/public_html/images/autos/$f1");
            unlink("/storage/ssd3/242/8557242/public_html/images/autos/$f2");
            unlink("/storage/ssd3/242/8557242/public_html/images/autos/$f3");
            unlink("/storage/ssd3/242/8557242/public_html/images/autos/$f4");
            unlink("/storage/ssd3/242/8557242/public_html/images/autos/$f5");
            mysqli_stmt_free_result($sql);

            #SENTENCIA2 -> SE ELIMINA EL REGISTRO DE LA DB
            $sql = mysqli_prepare($cnn,"DELETE FROM vehiculos WHERE(codigo_vehiculo=?)");
            mysqli_stmt_bind_param($sql,"i",$id_vehiculo);
            mysqli_stmt_execute($sql);

            echo "<script>window.location= '/paginas_administracion/vehiculos_administrativo.php'</script>";
        }
          mysqli_close($cnn);
    } catch (\Exception $e) {
      printf("Error en consulta:eliminar_vehiculo.php");
    }

  }

 ?>
