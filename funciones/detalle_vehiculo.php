<?php
    include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
    if (!$cnn) {
      die("Conexion Fallida: " . mysqli_connect_error());
    }else{
      $sql = mysqli_prepare($cnn,"SELECT c.categoria,v.estado, m.marca, v.modelo, format(v.precio,0), v.precio, v.color, v.ano, com.combustible, tr.transmision, v.kilometraje,
         v.cilindrada, v.equipamiento, v.foto1, v.foto2, v.foto3, v.foto4, v.foto5,u.nombre_sucursal
          FROM vehiculos as v INNER JOIN categorias AS c ON v.categoria=c.codigo_categoria
          INNER JOIN marcas AS m ON v.marca = m.codigo_marca
          INNER JOIN combustible AS com ON v.combustible = com.codigo_combustible
          INNER JOIN transmision AS tr ON v.transmision = tr.codigo_transmision
          INNER JOIN sucursal AS u ON v.ubicacion = u.codigo_sucursal WHERE (codigo_vehiculo=?)");
      mysqli_stmt_bind_param($sql,"s",$vehiculo);
      $rs = mysqli_stmt_execute($sql);
      mysqli_stmt_bind_result($sql,$categoria,$estado,$marca,$modelo,$precio,$precioSD,$color,$ano,$combustible,$transmision,$kilometraje,$cilindrada,$equipamiento,$foto1,$foto2,$foto3,$foto4,$foto5,$sucursal);
      while ($fila = mysqli_stmt_fetch($sql)) {
        $ca_vehiculo = $categoria;
        $es_vehiculo = $estado;
        $ma_vehiculo = $marca;
        $mo_vehiculo = $modelo;
        $pr_vehiculo = $precio;
        $prSD_vehiculo = $precioSD;
        $co_vehiculo = $color;
        $ano_vehiculo = $ano;
        $com_vehiculo = $combustible;
        $tr_vehiculo = $transmision;
        $ki_vehiculo = $kilometraje;
        $ci_vehiculo = $cilindrada;
        $eq_vehiculo = $equipamiento;
        $f1_vehiculo = $foto1;
        $f2_vehiculo = $foto2;
        $f3_vehiculo = $foto3;
        $f4_vehiculo = $foto4;
        $f5_vehiculo = $foto5;
        $ub_vehiculo = $sucursal;
      }
    mysqli_stmt_free_result($sql);
    }
 ?>
