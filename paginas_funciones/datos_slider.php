<?php
  include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
  if (!$cnn) {
    die("Conexion Fallida: " . mysqli_connect_error());
  }else{
    $query = "SELECT v.codigo_vehiculo, m.marca,m.logo, v.modelo, format(v.precio, 0, 'de_DE') as precio, com.combustible, v.kilometraje, tr.transmision,  v.ano, v.foto1, v.foto2, v.foto3
                              FROM vehiculos as v
                              INNER JOIN marcas AS m ON v.marca = m.codigo_marca
                              INNER JOIN combustible AS com ON v.combustible = com.codigo_combustible
                              INNER JOIN transmision AS tr ON v.transmision = tr.codigo_transmision
                              ORDER by rand() LIMIT 4";


                $results = mysqli_query($cnn, $query);
                $rows = [];
      while($row = mysqli_fetch_assoc($results)) {
                    $rows[] = $row;
        }
        //Variables que van al index sustraidas de la consulta
        //cuadro1
        $codigo_auto1 =$rows[0]["codigo_vehiculo"];
        $marca_auto1 =$rows[0]["marca"];
        $logo_auto1 =$rows[0]["logo"];
        $modelo_auto1 =$rows[0]["modelo"];
        $precio_auto1 = $rows[0]["precio"];
        $comb_auto1 =$rows[0]["combustible"];
        $kilo_auto1 =$rows[0]["kilometraje"];
        $transm_auto1 =$rows[0]["transmision"];
        $año_auto1= $rows[0]["ano"];
        $foto1_auto1 = $rows[0]["foto1"];
        $foto2_auto1 = $rows[0]["foto2"];
        $foto3_auto1 = $rows[0]["foto3"];
        //Cuadro2
        $codigo_auto2 =$rows[1]["codigo_vehiculo"];
        $marca_auto2 =$rows[1]["marca"];
        $logo_auto2 =$rows[1]["logo"];
        $modelo_auto2 =$rows[1]["modelo"];
        $precio_auto2 = $rows[1]["precio"];
        $comb_auto2 =$rows[1]["combustible"];
        $kilo_auto2 =$rows[1]["kilometraje"];
        $transm_auto2 =$rows[1]["transmision"];
        $año_auto2= $rows[1]["ano"];
        $foto1_auto2 = $rows[1]["foto1"];
        $foto2_auto2 = $rows[1]["foto2"];
        $foto3_auto2 = $rows[1]["foto3"];
        //Cuadro3
        $codigo_auto3 =$rows[2]["codigo_vehiculo"];
        $marca_auto3 =$rows[2]["marca"];
        $logo_auto3 =$rows[2]["logo"];
        $modelo_auto3 =$rows[2]["modelo"];
        $precio_auto3 = $rows[2]["precio"];
        $comb_auto3 =$rows[2]["combustible"];
        $kilo_auto3 =$rows[2]["kilometraje"];
        $transm_auto3 =$rows[2]["transmision"];
        $año_auto3= $rows[2]["ano"];
        $foto1_auto3 = $rows[2]["foto1"];
        $foto2_auto3 = $rows[2]["foto2"];
        $foto3_auto3 = $rows[2]["foto3"];
        

        //Fin de las declaraciones
        //$rows[2]["modelo"]; //[la row] ["columna"]


  }

 ?>
