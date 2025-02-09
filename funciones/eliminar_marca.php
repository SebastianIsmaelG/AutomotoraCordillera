<?php
/**ATENSHIOON ESTE ARCHIVO FUE DESCONTINUADO PARA NO INTERFERIR CON LAS FK DE VEHICULOS! **/
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  if (!isset($_POST["btn_eliminar_marca"])) {
    echo "<script>window.location= '../Proyectos/automotora2.0/paginas_administracion/marcas_administrativo.php'</script>";
  }else {
    try {
      $id_marca = $_POST["txt_id"];

      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
      if (!$cnn) {
        die("Conexion Fallida: " . mysqli_connect_error());
      }else{
        #1 SENTENCIA -> SE BUSCA ELIMAR EL LOGO ANTES DE BORRAR LOS ARCHIVOS DE LA DB
        $sql = mysqli_prepare($cnn,"SELECT logo from marcas WHERE(codigo_marca=?)");
        mysqli_stmt_bind_param($sql,"i",$id_marca);
        $rs = mysqli_stmt_execute($sql);

        mysqli_stmt_bind_result($sql, $logo_borrar);
          while ($fila = mysqli_stmt_fetch($sql)) {
              $as = $logo_borrar;
          }
        mysqli_stmt_free_result($sql);
        unlink("c:/xampp/htdocs/Proyectos/automotora2.0/images/marcas/$as"); //BORRA EL ARCHIVO DEL SERVIDOR

        #2 SENTENCIA -> SE ELIMINA DE LA DB
        $sql = mysqli_prepare($cnn,"DELETE FROM marcas WHERE(codigo_marca=?)");
        mysqli_stmt_bind_param($sql,"i",$id_marca);
        $rs = mysqli_stmt_execute($sql);
        mysqli_stmt_free_result($sql);

        echo "<script>window.location= '../paginas_administracion/marcas_administrativo.php'</script>";
      }
      mysqli_close($cnn);
    } catch (\Exception $e) {

    }

  }


 ?>
