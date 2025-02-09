<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

    if (!isset($_POST['btn_nueva_marca'])) {
                echo "<script>window.location= '/paginas_administracion/marcas_administrativo.php'</script>";
        }else{
            //Nombre
            $nombre_marca  = $_POST['nombre_marca'];
            //Imagen
            $nombre_imagen = $_FILES['logotipo_marca']['name'];
            $tipo_imagen   = $_FILES['logotipo_marca']['type'];
            $tam_imagen    = $_FILES['logotipo_marca']['size'];

        if ($tipo_imagen=="image/jpeg" ||$tipo_imagen=="image/png" ||$tipo_imagen=="image/gif" ||$tipo_imagen=="image/jpg" ) {
            if ($tam_imagen<=2000000) {
                //ruta del destino del servidor
                $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/Proyectos/automotora2.0/images/marcas/';
                //mover imagen a directorio temporal
                move_uploaded_file($_FILES['logotipo_marca']['tmp_name'],$carpeta.$nombre_imagen);

                //Constructor para obtener un nombre unico
                $codigo_fecha = date("YmdHis");
                $no_aleatorio = rand(100,999);
                $codigojunto = $codigo_fecha.$no_aleatorio; //17 digitos aleatoreos

                //Renombramos el archivo subiendo
                list($nombre,$ext)= explode(".",$nombre_imagen);
                $nombre_actual = "$codigojunto"."."."$ext" ;
                rename("../images/marcas/$nombre_imagen","../images/marcas/$nombre_actual");

                //Empieza el almacenamiento a la DB
                  include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
                  if (!$cnn) {
                      die("Conexion Fallida: " . mysqli_connect_error());
                  }else {
                      $sql = mysqli_prepare($cnn,"INSERT into marcas (codigo_marca,marca,logo) VALUES( null, ?, ?)");
                      mysqli_stmt_bind_param($sql,"ss",$nombre_marca,$nombre_actual);
                      $rs = mysqli_stmt_execute($sql);
                      echo "<script>alert('Marca añadida con exito');window.location= '../paginas_administracion/marcas_administrativo.php'</script>";
                  }


            }else {
                echo "<script>alert('Tamaño del archivo excede al permitido');history.back();</script>";
            }
        }else {
                echo "<script>alert('Archivo seleccionado no cumple con los requisitos:Imagen file');history.back();</script>";
        }
    }
 ?>
