

if (isset($buscarestados)) {
  try {
      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
      $estado=$buscarestados;

      if (!$cnn) {
          die("Conexion Fallida: " . mysqli_connect_error());
      }else{
            //Bloque para el conteo de resultados de la consulta
            $sqlCount = mysqli_prepare($cnn,"SELECT COUNT(*) AS TD FROM (SELECT v.codigo_vehiculo, m.marca, v.modelo, format(v.precio, 0, 'de_DE') as precio, com.combustible, v.kilometraje, tr.transmision,
                                              v.ano, v.foto1, v.foto2, v.foto3,v.foto4, v.foto5,
                                              v.equipamiento,v.estado,v.color,v.cilindrada,s.nombre_sucursal
                                              FROM vehiculos as v INNER JOIN marcas AS m ON v.marca = m.codigo_marca
                                              INNER JOIN combustible AS com ON v.combustible = com.codigo_combustible
                                              INNER JOIN transmision AS tr ON v.transmision = tr.codigo_transmision
                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal
                                              WHERE (v.estado=?)) AS TT" );

            mysqli_stmt_bind_param($sqlCount,"s",$estado);
            mysqli_stmt_execute($sqlCount);
            mysqli_stmt_bind_result($sqlCount,$rc);

            while ($fila = mysqli_stmt_fetch($sqlCount)) {
              $rowCount = $rc;
            }

          echo "<div class='row' style='margin:5px;'><div class='text-center'><p class='text-muted'>Se han encontrado $rowCount  resultados</p></div></div>";

            //Paginacion
            $paginacion  = 5;
            if (isset($_GET['pagina'])) {
              $pagina = $_GET['pagina'];
            }else {
              $pagina = 1;
            }

            $empiezaPaginacion = ($pagina-1) *  $paginacion;

            //Consulta SQL
            $sql = mysqli_prepare($cnn,"SELECT v.codigo_vehiculo, m.marca, v.modelo, format(v.precio, 0, 'de_DE') as precio, com.combustible, v.kilometraje, tr.transmision,
                                              v.ano, v.foto1, v.foto2, v.foto3,v.foto4, v.foto5,
                                              v.equipamiento,v.estado,v.color,v.cilindrada,s.nombre_sucursal
                                      FROM vehiculos as v
                                      INNER JOIN marcas AS m ON v.marca = m.codigo_marca
                                      INNER JOIN combustible AS com ON v.combustible = com.codigo_combustible
                                      INNER JOIN transmision AS tr ON v.transmision = tr.codigo_transmision
                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal
                                      WHERE (v.estado=?) LIMIT ?,?");


            mysqli_stmt_bind_param($sql,"sii",$estado,$empiezaPaginacion,$paginacion);
            mysqli_stmt_execute($sql);
            mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
            $carrousell = 0;
            $modalwindow = 0;
              while ($fila = mysqli_stmt_fetch($sql)) {
                $carrousell++;
                $modalwindow++;
                  #declaracion dentro del bucle
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

                      //Trae el constructor y mezcla los datos
                      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\constructor_menu_busqueda.php';


              }
                //Se crea nav de paginacion
                $total_paginas = ceil($rowCount / $paginacion ); //$rowCount viene de la linea 20
                //Condicional de disable para la paginacion
                if ($pagina==1) {
                  $condicionalDisable1="disabled";
                }else {
                  $condicionalDisable1="";
                }
                if ($pagina==$total_paginas) {
                  $condicionalDisable2="disabled";
                }else {
                  $condicionalDisable2="";
                }

              echo "<section class='container' style='padding-top:10px;'>
                      <nav aria-label='Page navigation'>
                        <ul class='pagination justify-content-center'>
                          <li class='page-item $condicionalDisable1'>
                            <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?busqueda_index=$estado&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                          </li>
                          <li class='page-item'>
                            <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?Estado=$estado&pagina=1' aria-label='Goto page 1'>1</a>
                          </li>";

                          for ($i=2; $i <=$total_paginas ; $i++) {
                            echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?Estado=$estado&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                          }
                    echo "<li class='page-item $condicionalDisable2'>
                            <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?Estado=$estado&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                          </li>";
            echo "</ul></nav>
                  </section>";


      }
  } catch (\Exception $e) {
      echo "Error 101 Seccion Busqueda navbar Estado/ menu_busqueda.php";
  }
}

/*****************************************************************************************************************/


/*****************************************************************************************************************/



?>