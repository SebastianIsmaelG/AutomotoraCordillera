<?php
  if (isset($id_vehiculo)) {
    try {
      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
      if (!$cnn) {
        die("Conexion Fallida: " . mysqli_connect_error());
      }else {
        $sql = mysqli_prepare($cnn,"SELECT v.codigo_vehiculo, m.marca, v.modelo, format(v.precio, 0, 'de_DE') as precio, com.combustible, v.kilometraje, tr.transmision,v.ano, v.foto1, v.foto2, v.foto3,v.foto4,v.foto5,
                                  v.equipamiento,v.estado,v.color,v.cilindrada,s.nombre_sucursal,s.coordenadas
                                  FROM vehiculos as v
                                  INNER JOIN marcas AS m ON v.marca = m.codigo_marca
                                  INNER JOIN combustible AS com ON v.combustible = com.codigo_combustible
                                  INNER JOIN transmision AS tr ON v.transmision = tr.codigo_transmision
                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal
                                  WHERE (v.codigo_vehiculo = ?)");
        mysqli_stmt_bind_param($sql, "i", $id_vehiculo);
        $rs = mysqli_stmt_execute($sql);
        $modalwindow = 0;
        $carrousell = 0;
        mysqli_stmt_bind_result($sql, $codigo,$marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion,$iframe);
          while ($fila = mysqli_stmt_fetch($sql)) {
            $modalwindow++;
            $carrousell++;
            $setcodigo = utf8_encode($codigo);
            $setmarca = utf8_encode($marca);
            $setmodelo = utf8_encode($modelo);
            $setprecio = utf8_encode($precio);
            $setcombustible = utf8_encode($combustible);
            $setkilometraje = utf8_encode($kilometraje);
            $settransmision = utf8_encode($transmision);
            $setano = utf8_encode($ano);
            $setfoto1 = utf8_encode($foto1);
            $setfoto2 = utf8_encode($foto2);
            $setfoto3 = utf8_encode($foto3);
            $setfoto4 = utf8_encode($foto4);
            $setfoto5 = utf8_encode($foto5);
            $setequipamiento = utf8_encode($equipamiento);
            $setestado = utf8_encode($estado);
            $setcolor = utf8_encode($color);
            $setcilindrada = utf8_encode($cilindrada);
            $setubicacion = utf8_encode($ubicacion);
            $setubicacionframe = utf8_encode($iframe);
          }
        mysqli_close($cnn);



      }
    } catch (\Exception $e) {
      echo "Error 101 creacion de bloque / menu_busqueda_detalle.php"; var_dump($e);
    }

  }else {
    echo "No existe un id o dato para traer informacion. / menu_busqueda_detalle.php";
  }

 ?>
