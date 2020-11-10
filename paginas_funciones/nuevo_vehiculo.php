<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
  if (!isset($_POST["btn_guardar"])) {
      echo "<script>window.location= '../paginas_administracion/vehiculos_administrativo.php'</script>";
  }else {
    try {
      /**Declaracion de variables no tocar**/
      $categoria_vehiculo = $_POST["sel_categoria"];
      $estado_vehiculo = $_POST["sel_estado"];
      $marca_vehiculo = $_POST["sel_marca"];
      $modelo_vehiculo = $_POST["text_modelo"];
      $p = $_POST["text_precio"];
      $precio_vehiculo =  str_replace ( ".", "", $p);
      $color_vehiculo = $_POST["text_color"];
      $año_vehiculo = $_POST["sel_año"];
      $combustible_vehiculo = $_POST["sel_combustible"];
      $transmision_vehiculo = $_POST["sel_trasmision"];
      $kilometraje_vehiculo = $_POST["text_kilometraje"];
      $c = $_POST["text_cilindrada"];
      $cilindrada_vehiculo = str_replace (".","",$c);
      $equipamiento_vehiculo = $_POST["text_equipamiento"];
      $ubicacion_vehiculo = $_POST["sel_ubicacion"];
      //fotografia_1
      $nombre_fotografia1 = $_FILES['fotografia_1']['name'];
      $tipo_fotografia1   = $_FILES['fotografia_1']['type'];
      $tam_fotografia1   = $_FILES['fotografia_1']['size'];
      //fotografia_2
      $nombre_fotografia2 = $_FILES['fotografia_2']['name'];
      $tipo_fotografia2   = $_FILES['fotografia_2']['type'];
      $tam_fotografia2   = $_FILES['fotografia_2']['size'];
      //fotografia_3
      $nombre_fotografia3 = $_FILES['fotografia_3']['name'];
      $tipo_fotografia3   = $_FILES['fotografia_3']['type'];
      $tam_fotografia3   = $_FILES['fotografia_3']['size'];
      //fotografia_4
      $nombre_fotografia4 = $_FILES['fotografia_4']['name'];
      $tipo_fotografia4   = $_FILES['fotografia_4']['type'];
      $tam_fotografia4   = $_FILES['fotografia_4']['size'];
      //fotografia_5
      $nombre_fotografia5 = $_FILES['fotografia_5']['name'];
      $tipo_fotografia5   = $_FILES['fotografia_5']['type'];
      $tam_fotografia5   = $_FILES['fotografia_5']['size'];
      /**Fin declaraciones**/


      //Comprobacion de tamaño y tipo imagenes 10 if :
      if ($tipo_fotografia1=="image/jpeg" ||$tipo_fotografia1=="image/png" ||$tipo_fotografia1=="image/gif" ||$tipo_fotografia1=="image/jpg" ) {
          if ($tam_fotografia1<=2000000) {
            if ($tipo_fotografia2=="image/jpeg" ||$tipo_fotografia2=="image/png" ||$tipo_fotografia2=="image/gif" ||$tipo_fotografia2=="image/jpg" ) {
                if ($tam_fotografia2<=2000000) {
                  if ($tipo_fotografia3=="image/jpeg" ||$tipo_fotografia3=="image/png" ||$tipo_fotografia3=="image/gif" ||$tipo_fotografia3=="image/jpg" ) {
                      if ($tam_fotografia3<=2000000) {
                        if ($tipo_fotografia4=="image/jpeg" ||$tipo_fotografia4=="image/png" ||$tipo_fotografia4=="image/gif" ||$tipo_fotografia4=="image/jpg" ) {
                            if ($tam_fotografia4<=2000000) {
                              if ($tipo_fotografia5=="image/jpeg" ||$tipo_fotografia5=="image/png" ||$tipo_fotografia5=="image/gif" ||$tipo_fotografia5=="image/jpg" ) {
                                  if ($tam_fotografia5<=2000000) {

                                      $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/Proyectos/automotora2.0/images/autos/';
                                      //mover imagen a directorio temporal
                                      move_uploaded_file($_FILES['fotografia_1']['tmp_name'],$carpeta.$nombre_fotografia1);
                                      move_uploaded_file($_FILES['fotografia_2']['tmp_name'],$carpeta .$nombre_fotografia2);
                                      move_uploaded_file($_FILES['fotografia_3']['tmp_name'],$carpeta .$nombre_fotografia3);
                                      move_uploaded_file($_FILES['fotografia_4']['tmp_name'],$carpeta .$nombre_fotografia4);
                                      move_uploaded_file($_FILES['fotografia_5']['tmp_name'],$carpeta .$nombre_fotografia5);

                                      //Constructor para obtener un nombre unico

                                      //Renombramos el archivo1 subiendo
                                      $codigo_fecha = date("YmdHis");
                                      $no_aleatorio1 = rand(100,999);
                                      $codigojunto1 = $codigo_fecha.$no_aleatorio1; //17 digitos aleatoreos

                                      list($nombre,$ext)= explode(".",$nombre_fotografia1);
                                      $nombre_nuevo1 = "$codigojunto1"."."."$ext" ;
                                      rename("../images/autos/$nombre_fotografia1","../images/autos/$nombre_nuevo1");

                                      //Renombramos el archivo2 subiendo
                                      $codigo_fecha = date("YmdHis");
                                      $no_aleatorio2 = rand(100,999);
                                      $codigojunto2 = $codigo_fecha.$no_aleatorio2; //17 digitos aleatoreos

                                      list($nombre,$ext)= explode(".",$nombre_fotografia2);
                                      $nombre_nuevo2 = "$codigojunto2"."."."$ext" ;
                                      rename("../images/autos/$nombre_fotografia2","../images/autos/$nombre_nuevo2");

                                      //Renombramos el archivo3 subiendo
                                      $codigo_fecha = date("YmdHis");
                                      $no_aleatorio3 = rand(100,999);
                                      $codigojunto3 = $codigo_fecha.$no_aleatorio3; //17 digitos aleatoreos
                                      list($nombre,$ext)= explode(".",$nombre_fotografia3);
                                      $nombre_nuevo3 = "$codigojunto3"."."."$ext" ;
                                      rename("../images/autos/$nombre_fotografia3","../images/autos/$nombre_nuevo3");

                                      //Renombramos el archivo4 subiendo
                                      $codigo_fecha = date("YmdHis");
                                      $no_aleatorio4 = rand(100,999);
                                      $codigojunto4 = $codigo_fecha.$no_aleatorio4; //17 digitos aleatoreos
                                      list($nombre,$ext)= explode(".",$nombre_fotografia4);
                                      $nombre_nuevo4 = "$codigojunto4"."."."$ext" ;
                                      rename("../images/autos/$nombre_fotografia4","../images/autos/$nombre_nuevo4");

                                      //Renombramos el archivo5 subiendo
                                      $codigo_fecha = date("YmdHis");
                                      $no_aleatorio5 = rand(100,999);
                                      $codigojunto5 = $codigo_fecha.$no_aleatorio5; //17 digitos aleatoreos
                                      list($nombre,$ext)= explode(".",$nombre_fotografia5);
                                      $nombre_nuevo5 = "$codigojunto5"."."."$ext" ;
                                      rename("../images/autos/$nombre_fotografia5","../images/autos/$nombre_nuevo5");


                                      //Almacenamiento en base de datos
                                        try {
                                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

                                          if (!$cnn) {
                                              die("Conexion Fallida: " . mysqli_connect_error());
                                          }else{

                                              $sql = mysqli_prepare($cnn,"INSERT INTO vehiculos (codigo_vehiculo, categoria,estado, marca, modelo, precio, color, ano, combustible, transmision, kilometraje, cilindrada, equipamiento, foto1, foto2, foto3, foto4, foto5, ubicacion)
                                               VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)" );

                                               mysqli_stmt_bind_param($sql,"isisisiiiiissssssi",
                                               $categoria_vehiculo,$estado_vehiculo,$marca_vehiculo,$modelo_vehiculo,$precio_vehiculo,$color_vehiculo,$año_vehiculo,$combustible_vehiculo,$transmision_vehiculo,$kilometraje_vehiculo,$cilindrada_vehiculo,$equipamiento_vehiculo,$nombre_nuevo1,$nombre_nuevo2,$nombre_nuevo3,$nombre_nuevo4,$nombre_nuevo5,$ubicacion_vehiculo);
                                               $rs = mysqli_stmt_execute($sql);
                                               mysqli_close($cnn);
                                               echo "<script>alert('Solicitud procesada con exito');window.location= '../paginas_administracion/vehiculos_administrativo.php';</script>";
                                          }
                                        } catch (\Exception $e) {
                                          echo "<script>alert('Error al procesar la solucitud, el vehiculo no fue almacenado.');history.back();</script>";
                                        }




                                  }else {
                                      echo "<script>alert('Tamaño del archivo .$nombre_fotografia5. excede al permitido: 2mb');history.back();</script>";
                                  }
                              }else {
                                      echo "<script>alert('Archivo seleccionado .$nombre_fotografia5. no cumple con los requisitos:Imagen file');history.back();</script>";
                              }
                            }else {
                                echo "<script>alert('Tamaño del archivo .$nombre_fotografia4. excede al permitido: 2mb');history.back();</script>";
                            }
                        }else {
                                echo "<script>alert('Archivo seleccionado .$nombre_fotografia4. no cumple con los requisitos:Imagen file');history.back();</script>";
                        }
                      }else {
                          echo "<script>alert('Tamaño del archivo .$nombre_fotografia3. excede al permitido: 2mb');history.back();</script>";
                      }
                  }else {
                          echo "<script>alert('Archivo seleccionado .$nombre_fotografia3. no cumple con los requisitos:Imagen file');history.back();</script>";
                  }
                }else {
                    echo "<script>alert('Tamaño del archivo .$nombre_fotografia2. excede al permitido: 2mb');history.back();</script>";
                }
            }else {
                    echo "<script>alert('Archivo seleccionado .$nombre_fotografia2. no cumple con los requisitos:Imagen file');history.back();</script>";
            }
          }else {
              echo "<script>alert('Tamaño del archivo .$nombre_fotografia1. excede al permitido: 2mb');history.back();</script>";
          }
      }else {
              echo "<script>alert('Archivo seleccionado .$nombre_fotografia1. no cumple con los requisitos:Imagen file');history.back();</script>";
      }
    } catch (\Exception $e) {

    }

  }

 ?>
