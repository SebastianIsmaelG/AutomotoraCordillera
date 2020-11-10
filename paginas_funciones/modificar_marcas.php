<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (!isset($_POST["btn_md_dato"])) {
  echo "<script>window.location= '../paginas_administracion/marcas_administrativo.php'</script>";
}else {
  try {
      $logo_viejo_marca = $_POST["ModificarM_oldLogotipo"];

      $codigo_marca = $_POST["modificarM_codigo"];
      $nombre_marca =  $_POST["modificarM_nombre"];

      $logo_marca = $_FILES['modificarM_logotipo']['name'];
      $tipo_imagen  = $_FILES['modificarM_logotipo']['type'];
      $tam_imagen   = $_FILES['modificarM_logotipo']['size'];
      //IF LOGO_MARCA ="" solo cambiar nombre, si logo el db es igual al logo nuevo borrar y remplazar, lo mismo si son diferentes

      if ($logo_marca=="") {
          //No se ingreso una foto
          try {
            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
            if (!$cnn) {
              die("Conexion Fallida: " . mysqli_connect_error());
            }else{
              $sql = mysqli_prepare($cnn,"UPDATE marcas SET marca=?, logo=? WHERE (codigo_marca =?) ");
                      mysqli_stmt_bind_param($sql,"ssi",$nombre_marca,$logo_viejo_marca,$codigo_marca);
                      $rs = mysqli_stmt_execute($sql);
                      mysqli_close($cnn);
                      echo "<script>alert('Modificacion Exitosa');window.location= '../paginas_administracion/marcas_administrativo.php'</script>";
            }
          } catch (\Exception $e) {
            echo "<script>window.location= '../paginas_administracion/marcas_administrativo.php'</script>";
          }

      }else {
        //Se subio un archivo
          try {
            if ($tipo_imagen=="image/jpeg" ||$tipo_imagen=="image/png" ||$tipo_imagen=="image/gif" ||$tipo_imagen=="image/jpg" ) {
              if ($tam_imagen<=2000000) {
                //Se elimina la imagen antigua
                unlink("C:/xampp/htdocs/Proyectos/automotora2.0/images/marcas/$logo_viejo_marca");

                $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/Proyectos/automotora2.0/images/marcas/';
                //mover imagen a directorio temporal
                move_uploaded_file($_FILES['modificarM_logotipo']['tmp_name'],$carpeta.$logo_marca);

                //Constructor para obtener un nombre unico
                $codigo_fecha = date("YmdHis");
                $no_aleatorio = rand(100,999);
                $codigojunto = $codigo_fecha.$no_aleatorio; //17 digitos aleatoreos

                //Renombramos el archivo subiendo
                list($nombre,$ext)= explode(".",$logo_marca);
                $nombre_nuevo = "$codigojunto"."."."$ext" ;
                rename("../images/marcas/$logo_marca","../images/marcas/$nombre_nuevo");
                //Sube los datos a la db
                try {
                  include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
                  if (!$cnn) {
                        die("Conexion Fallida: " . mysqli_connect_error());
                      }else{

                        $sql = mysqli_prepare($cnn,"UPDATE marcas SET marca=?, logo=? WHERE (codigo_marca =?) ");
                        mysqli_stmt_bind_param($sql,"ssi",$nombre_marca,$nombre_nuevo,$codigo_marca);
                        $rs = mysqli_stmt_execute($sql);
                        echo "<script>alert('Modificacion Exitosa');window.location= '../paginas_administracion/marcas_administrativo.php'</script>";
                      }
                } catch (\Exception $e) {
                  echo "ocurrio un error en la db:Update marca";
                }



              }else {
                echo "<script>alert('Tamaño del archivo excede al permitido: 2MB');history.back();</script>";
              }
            }else {
              echo "<script>alert('Archivo seleccionado no cumple con los requisitos:Imagen fileI');history.back();</script>";
            }




          } catch (\Exception $e) {
            echo "<script>window.location= '../paginas_administracion/marcas_administrativo.php'</script>";
          }

      }




      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
      if (!$cnn) {
        die("Conexion Fallida: " . mysqli_connect_error());
      }else{
        $logoenDB = "";
        $sql = mysqli_prepare($cnn,"SELECT logo FROM marcas WHERE(logo=?)");
        mysqli_stmt_bind_param($sql,"s",$logo_marca);
        $rs = mysqli_stmt_execute($sql);

        mysqli_stmt_bind_result($sql, $logo);
          while ($fila = mysqli_stmt_fetch($sql)) {
              $logoenDB = $logo;

          }
          mysqli_close($cnn);
          //Se realiza una comprobacion si el archivo en la db se llama igual al archivo subido
          if ($logoenDB==$logo_viejo_marca) {
            // Si se encontro archivo con el mismo nombre en la db se conserva y solo se cambia el nombre


          }else {
            //tengo que borrar el logo viejo en el directorio

          }

      }
  } catch (\Exception $e) {

  }

}

 ?>
