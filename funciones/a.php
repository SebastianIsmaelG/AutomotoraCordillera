<?php 
if (isset($codigoMarca)) {
    try {
      include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

      if (!$cnn) {
          die("Conexion Fallida: " . mysqli_connect_error());
      }else{
            //Bloque para el conteo de resultados de la consulta
            $sqlCount = mysqli_prepare($cnn,"SELECT COUNT(*) AS TD FROM (SELECT v.codigo_vehiculo, m.marca, v.modelo, format(v.precio, 0, 'de_DE') as precio, com.combustible, v.kilometraje, tr.transmision,
                                              v.ano, v.foto1, v.foto2, v.foto3,v.foto4, v.foto5,v.equipamiento,v.estado,v.color,v.cilindrada,s.nombre_sucursal
                                              FROM vehiculos as v INNER JOIN marcas AS m ON v.marca = m.codigo_marca
                                              INNER JOIN combustible AS com ON v.combustible = com.codigo_combustible
                                              INNER JOIN transmision AS tr ON v.transmision = tr.codigo_transmision
                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal
                                              WHERE v.marca =?) AS TT" );
            mysqli_stmt_bind_param($sqlCount,"i",$codigoMarca);
            mysqli_stmt_execute($sqlCount);
            mysqli_stmt_bind_result($sqlCount,$rc);
            while ($fila = mysqli_stmt_fetch($sqlCount)) {
              $rowCount = $rc;
            }

          echo "<div class='row' style='margin:5px;'><div class='text-center'><p class='text-muted'>Se han encontrado $rowCount  resultados</p></div></div>";
            //
            //Paginacion
            $paginacion  = 5;
            if (isset($_GET['pagina'])) {
              $pagina = $_GET['pagina'];
            }else {
              $pagina = 1;
            }

            $empiezaPaginacion = ($pagina-1) *  $paginacion;

            //Consulta SQL
            $sql = mysqli_prepare($cnn,"SELECT v.codigo_vehiculo, m.marca, v.modelo, format(v.precio, 0, 'de_DE') as precio, com.combustible, v.kilometraje, tr.transmision,  v.ano, v.foto1, v.foto2, v.foto3,v.foto4, v.foto5,
                                      v.equipamiento,v.estado,v.color,v.cilindrada,s.nombre_sucursal
                                      FROM vehiculos as v
                                      INNER JOIN marcas AS m ON v.marca = m.codigo_marca
                                      INNER JOIN combustible AS com ON v.combustible = com.codigo_combustible
                                      INNER JOIN transmision AS tr ON v.transmision = tr.codigo_transmision
                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal
                                      WHERE (v.marca =?) LIMIT ?,?");

            mysqli_stmt_bind_param($sql,"iii",$codigoMarca,$empiezaPaginacion,$paginacion);
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
                      //Se crea el contenido dinamico

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

                  echo "<section class='container ' style='padding-top:10px;'>
                          <nav aria-label='Page navigation'>
                            <ul class='pagination justify-content-center'>
                              <li class='page-item $condicionalDisable1'>
                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?codigoM=$codigoMarca&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                              </li>
                              <li class='page-item'>
                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?codigoM=$codigoMarca&pagina=1' aria-label='Goto page 1'>1</a>
                              </li>";

                              for ($i=2; $i <=$total_paginas ; $i++) {
                                echo "<li class='page-item'><a class='page-link' id='paginacion_links' href='menu_busqueda.php?codigoM=$codigoMarca&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                              }
                        echo "<li class='page-item $condicionalDisable2'>
                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?codigoM=$codigoMarca&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                              </li>";
                echo "</ul></nav>
                      </section>";
        }

      }catch(\Exception $e){
        echo "<script>alert('Ha ocurrido un error en la ejecucion, recargue.')</script>";
      }

  }
/*****************************************************************************************************************/

if (isset($resultado_index)) {
    try {
        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
        $ri0= "%".$resultado_index."%";
        $ri1= "%".$resultado_index."%";
        $ri2= "%".$resultado_index."%";
        $ri3= "%".$resultado_index."%";
        if (!$cnn) {
            die("Conexion Fallida: " . mysqli_connect_error());
        }else{
              //Bloque para el conteo de resultados de la consulta
              $sqlCount = mysqli_prepare($cnn,"SELECT COUNT(*) AS TD FROM (SELECT v.codigo_vehiculo, m.marca, v.modelo, format(v.precio, 0, 'de_DE') as precio, com.combustible, v.kilometraje, tr.transmision, v.ano,
                                                v.foto1, v.foto2, v.foto3,v.foto4, v.foto5,
                                                v.equipamiento,v.estado,v.color,v.cilindrada,s.nombre_sucursal
                                                FROM vehiculos as v INNER JOIN marcas AS m ON v.marca = m.codigo_marca
                                                INNER JOIN combustible AS com ON v.combustible = com.codigo_combustible
                                                INNER JOIN transmision AS tr ON v.transmision = tr.codigo_transmision
                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal
                                                WHERE (v.codigo_vehiculo LIKE ? OR m.marca LIKE ? OR v.modelo LIKE ? OR v.ano LIKE ?)) AS TT" );

              mysqli_stmt_bind_param($sqlCount,"ssss",$ri0,$ri1,$ri2,$ri3);
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
                                                v.ano, v.foto1, v.foto2, v.foto3,v.foto4, v.foto5,v.equipamiento,v.estado,v.color,
                                                v.cilindrada,s.nombre_sucursal
                                        FROM vehiculos as v
                                        INNER JOIN marcas AS m ON v.marca = m.codigo_marca
                                        INNER JOIN combustible AS com ON v.combustible = com.codigo_combustible
                                        INNER JOIN transmision AS tr ON v.transmision = tr.codigo_transmision
                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal
                                        WHERE ( v.codigo_vehiculo LIKE ? OR m.marca LIKE ? OR v.modelo LIKE ? OR v.ano LIKE ?) LIMIT ?,?");


              mysqli_stmt_bind_param($sql,"ssssii",$ri0,$ri1,$ri2,$ri3,$empiezaPaginacion,$paginacion);
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
                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?busqueda_index=$resultado_index&btn_busc=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                </li>
                                <li class='page-item'>
                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?busqueda_index=$resultado_index&btn_busc=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                </li>";

                                for ($i=2; $i <=$total_paginas ; $i++) {
                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?busqueda_index=$resultado_index&btn_busc=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                }
                          echo "<li class='page-item $condicionalDisable2'>
                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?busqueda_index=$resultado_index&btn_busc=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                </li>";
                  echo "</ul></nav>
                        </section>";


        }
    } catch (\Exception $e) {
        echo"<script>alert('Ha ocurrido un error en la ejecucion, recargue.')</script>";
    }

  }

/*****************************************************************************************************************/

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

if (isset($srcInd)) {
  try {
    //Comprobamos las variables y sus default
    if (isset($_GET["customRadioInline1"])) {
      if ($_GET["customRadioInline1"]=="0") {
        $estado_auto = "Todos";
      }else {
        $estado_auto = $_GET["customRadioInline1"];
      }
    }else {
      $estado_auto = "Todos";
    }

    if (isset($_GET["sel_tipo"])) {
      if ($_GET["sel_tipo"]=="0") {
        $tipo_auto="0";
      }else {
        $tipo_auto = $_GET["sel_tipo"];
      }
    }else {
      $tipo_auto="0";//Todos los tipos disponibles
    }

    if (isset($_GET["marca"])) {
      if ($_GET["marca"]=="0") {
        $marca_auto="0";//Todas las marcas disponibles
      }else {
        $marca_auto = $_GET["marca"];
      }
    }else {
      $marca_auto="0";//Todas las marcas disponibles
    }

    if (isset($_GET["sel_modelo"])) {
      if ($_GET["sel_modelo"]=="0") {
        $modelo_auto ="0";//Todas los modelos disponibles
      }else {
        $modelo_auto = $_GET["sel_modelo"];
      }
    }else {
      $modelo_auto ="0";//Todas los modelos disponibles
    }

    if (isset($_GET["sel_año_desde"])) {
      if ($_GET["sel_año_desde"]=="0") {
        $año_desde_auto ="0";//Todas años disponibles
      }else {
        $año_desde_auto = $_GET["sel_año_desde"];
      }
    }else {
      $año_desde_auto ="0";//Todas años disponibles
    }

    if (isset($_GET["sel_año_hasta"])) {
      if ($_GET["sel_año_hasta"]=="0") {
        $año_hasta_auto ="0";//Todas años disponibles
      }else {
        $año_hasta_auto = $_GET["sel_año_hasta"];
      }
    }else {
      $año_hasta_auto ="0";//Todas años disponibles
    }

    //Empezamos la filtracion desde Estado
    switch ($estado_auto) {
      case "Todos":
          if ($tipo_auto=="0") {
                //Busca todo tipo de autos sin importar su estado
                if ($marca_auto=="0") {
                  //Busca todo tipo de autos sin importar su estado y sin importar su marca
                  if ($modelo_auto=="0") {

                    //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo
                    if ($año_desde_auto=="0") {

                      //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y sin importar su año desde
                      if ($año_hasta_auto=="0") {

                        //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal) AS TT " );

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
                                                                ORDER BY v.precio ASC
                                                                 LIMIT ?,?");
                                                                //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta


                                      mysqli_stmt_bind_param($sql,"ii",$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }else {
                        //Busca todos los tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y sin importar su año desde y su año debe ser hasta = $año_hasta_auto
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.ano <= ?) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"i",$año_hasta_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (ano <= ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");
                                                                //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta


                                      mysqli_stmt_bind_param($sql,"iii",$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }
                    }else {
                      //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y que su año vaya desde $año_desde_auto
                      if ($año_hasta_auto=="0") {
                        //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y que su año vaya desde $año_desde_auto y sin importar su año hasta
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.ano >= ?) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"i",$año_desde_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.ano >= ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");



                                      mysqli_stmt_bind_param($sql,"iii",$año_desde_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }else {
                        //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y que su año vaya desde $año_desde_auto hasta $año_hasta_auto
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.ano BETWEEN ? AND ?) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"ii",$año_desde_auto,$año_hasta_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.ano BETWEEN ? AND ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iiii",$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }
                    }

                  }
                }else {
                  //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto
                  if ($modelo_auto=="0") {
                    //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y todos los modelos disponibles
                    if ($año_desde_auto=="0") {
                      //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde
                      if ($año_hasta_auto=="0") {
                        //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde y sin importar su fecha hasta
                        //aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ?) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"i",$marca_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iii",$marca_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }else {
                        //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde y su fecha hasta sea = $año_hasta_auto
                        //aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.ano <= ?) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"ii",$marca_auto,$año_hasta_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.ano <= ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iiii",$marca_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }
                    }else {
                      //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde = $año_desde_auto
                      if ($año_hasta_auto=="0") {
                        //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y todos los modelos disponibles y su fecha desde = $año_desde_auto y sin importar su año hasta
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.ano >= ?) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"ii",$marca_auto,$año_desde_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.ano >= ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iiii",$marca_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }else {
                        //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y todos los modelos disponibles y su fecha desde = $año_desde_auto y hasta = $año_hasta_auto
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.ano BETWEEN ? AND ?) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"iii",$marca_auto,$año_desde_auto,$año_hasta_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.ano BETWEEN ? AND ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iiiii",$marca_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }
                    }
                  }else {
                    //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto
                    if ($año_desde_auto=="0") {
                      //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y sin importar desde que año
                      if ($año_hasta_auto=="0") {
                        //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y sin importar desde que año o hasta que año sea
                        //Aqui va un query
                            try {

                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.modelo = ?) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"is",$marca_auto,$modelo_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.modelo = ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"isii",$marca_auto,$modelo_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }else {
                        //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y sin importar desde que año y que sea hasta el año = $año_hasta_auto
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.modelo = ? and v.ano <= ? ) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"isi",$marca_auto,$modelo_auto,$año_hasta_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.modelo = ? and v.ano <= ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"isiii",$marca_auto,$modelo_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin de query
                      }
                    }else {
                      //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y cuyo año sea desde = $año_desde_auto
                      if ($año_hasta_auto=="0") {
                        //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y cuyo año sea desde = $año_desde_auto y sin importar hasta que año sean
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.modelo = ? and v.ano >= ? ) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"isi",$marca_auto,$modelo_auto,$año_desde_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.modelo = ? and v.ano >= ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"isiii",$marca_auto,$modelo_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin de query
                      }else {
                        //Busca todo tipo de autos sin importar su estado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y cuyo año sea desde = $año_desde_auto y sea hasta = $año_hasta_auto
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.modelo = ? and v.ano BETWEEN ? AND ? ) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"isii",$marca_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.modelo = ? and v.ano BETWEEN ? AND ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"isiiii",$marca_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }
                    }

                  }
                }
              }else {
                //Busca un tipo de auto = $tipo_auto sin su estado sea todos
                if ($marca_auto=="0") {
                  //Busca un tipo de auto = $tipo_auto sin su estado sea todos y sin importar su marca
                  if ($modelo_auto=="0") {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea todos y sin importar su marca y sin importar su modelo
                    if ($año_desde_auto=="0") {
                      //Busca un tipo de auto = $tipo_auto sin su estado sea todos y sin importar su marca y sin importar su modelo y sin importar su año
                      if ($año_hasta_auto=="0") {
                        //Busca un tipo de auto =$tipo_auto sin su estado sea todos y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? ) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"i",$tipo_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iii",$tipo_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }else {
                        //Busca un tipo de auto = $tipo_auto sin su estado sea todos y sin importar su marca y sin importar su modelo y sin importar su año desde y su año hasta sea =$año_hasta_auto.
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.ano <= ? ) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"ii",$tipo_auto,$año_hasta_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.ano <= ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iiii",$tipo_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }
                    }else {
                      //Busca un tipo de auto = $tipo_auto sin su estado sea todos y sin importar su marca y sin importar su modelo y su año =$año_desde_auto
                      if ($año_hasta_auto=="0") {
                        //Busca un tipo de auto = $tipo_auto sin su estado sea todos y sin importar su marca y sin importar su modelo y su año =$año_desde_auto y sin importar su año Desde
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.ano >= ? ) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"ii",$tipo_auto,$año_desde_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.ano >= ?) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iiii",$tipo_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }else {
                        //Busca un tipo de auto = $tipo_auto sin su estado sea todos y sin importar su marca y sin importar su modelo y su año =$año_desde_auto y su año hasta = $año_hasta_auto
                        //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.ano BETWEEN ? AND ? ) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"iii",$tipo_auto,$año_desde_auto,$año_hasta_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.ano BETWEEN ? AND ? ) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iiiii",$tipo_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                        //Fin del query
                      }
                    }
                  }else {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea todos y sin importar su marca y su modelo = $modelo_auto
                    //IMPOSIBLE
                  }
                }else {
                  //Busca un tipo de auto = $tipo_auto sin su estado sea todos y su marca = $marca_auto
                  if ($modelo_auto=="0") {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea todos y su marca = $marca_auto y su modelo sea todos los disponibles
                    if ($año_desde_auto=="0") {
                      //Busca un tipo de auto = $tipo_auto sin su estado sea todos y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea cualquiera
                      if ($año_hasta_auto=="0") {
                        //Busca un tipo de auto = $tipo_auto sin su estado sea todos y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea cualquiera y su año hasta sea cualquiera
                        //aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"ii",$tipo_auto,$marca_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? ) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"iiii",$tipo_auto,$marca_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                        //Fin del query
                      }else {
                        //Busca un tipo de auto = $tipo_auto sin su estado sea todos y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea cualquiera y su año hasta sea = $año_hasta_auto
                        //aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.ano <= ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"iii",$tipo_auto,$marca_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.ano <= ? ) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"iiiii",$tipo_auto,$marca_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                        //Fin del query
                      }
                    }else {
                      //Busca un tipo de auto = $tipo_auto sin su estado sea todos y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea = $año_desde_auto
                      if ($año_hasta_auto=="0") {
                        //Busca un tipo de auto = $tipo_auto sin su estado sea todos y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea = $año_desde_auto y año hasta sea cualquiera
                        //aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.ano >= ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"iii",$tipo_auto,$marca_auto,$año_desde_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.ano >= ? ) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"iiiii",$tipo_auto,$marca_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                        //Fin del query
                      }else {
                        //Busca un tipo de auto = $tipo_auto sin su estado sea todos y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea = $año_desde_auto y año hasta sea = $año_hasta_auto
                        //aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.ano BETWEEN ? AND ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"iiii",$tipo_auto,$marca_auto,$año_desde_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.ano BETWEEN ? AND ? ) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"iiiiii",$tipo_auto,$marca_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                        //Fin del query
                      }
                    }
                  }else {
                    //Busca un tipo de auto = $tipo_auto Y su estado sea todos y su marca = $marca_auto y su modelo sea $modelo_auto
                    if ($año_desde_auto=="0") {
                      //Busca un tipo de auto = $tipo_auto Y su estado sea todos y su marca = $marca_auto y su modelo sea $modelo_auto y sin importar año desde
                      if ($año_hasta_auto=="0") {
                        //Busca un tipo de auto = $tipo_auto Y su estado sea todos y su marca = $marca_auto y su modelo sea $modelo_auto y sin importar año desde y sin importar su año hasta
                        //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.modelo = ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"iis",$tipo_auto,$marca_auto,$modelo_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.modelo = ? ) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"iisii",$tipo_auto,$marca_auto,$modelo_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                        //Fin del query
                      }else {
                        //Busca un tipo de auto = $tipo_auto Y su estado sea todos y su marca = $marca_auto y su modelo sea $modelo_auto y sin importar año desde y su año hasta sea = $año_hasta_auto
                        //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.modelo = ? AND v.ano <= ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"iisi",$tipo_auto,$marca_auto,$modelo_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.modelo = ? AND v.ano <= ? ) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"iisiii",$tipo_auto,$marca_auto,$modelo_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                        //Fin del query
                      }
                    }else {
                        //Busca un tipo de auto = $tipo_auto Y su estado sea todos y su marca = $marca_auto y su modelo sea $modelo_auto y que año desde = $año_desde_auto
                        if ($año_hasta_auto=="0") {
                          //Busca un tipo de auto = $tipo_auto Y su estado sea todos y su marca = $marca_auto y su modelo sea $modelo_auto y que año desde = $año_desde_auto y sin importar su año hasta
                          //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.modelo = ? AND v.ano >= ? ) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"iisi",$tipo_auto,$marca_auto,$modelo_auto,$año_desde_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.modelo = ? AND v.ano >= ? ) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iisiii",$tipo_auto,$marca_auto,$modelo_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                          //Fin del query
                        }else {
                          //Busca un tipo de auto = $tipo_auto Y su estado sea todos y su marca = $marca_auto y su modelo sea $modelo_auto y que año desde = $año_desde_auto y su año hasta sea = $año_hasta_auto
                          //Aqui va un query
                            try {
                                include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                        INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.modelo = ? AND v.ano BETWEEN ? AND ? ) ) AS TT " );

                                      mysqli_stmt_bind_param($sqlCount,"iisii",$tipo_auto,$marca_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto);
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
                                                                INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.marca = ? AND v.modelo = ? AND v.ano BETWEEN ? AND ? ) ORDER BY v.precio ASC
                                                                 LIMIT ?,?");


                                      mysqli_stmt_bind_param($sql,"iisiiii",$tipo_auto,$marca_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                      mysqli_stmt_execute($sql);
                                      mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                      $carrousell =0;
                                      $modalwindow =0;
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
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                    </li>
                                                    <li class='page-item'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                    </li>";

                                                    for ($i=2; $i <=$total_paginas ; $i++) {
                                                      echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                    }
                                              echo "<li class='page-item $condicionalDisable2'>
                                                      <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                    </li>";
                                      echo "</ul></nav>
                                            </section>";


                                }
                            } catch (\Exception $e) {
                                echo "Error 101 Creacion de bloque /";var_dump($e);
                            }
                          //Fin del query
                        }
                    }
                  }

                }

              }

        break;
      case 'Nuevo':
          if ($tipo_auto=="0") {
              //Busca todo tipo de autos cuyo estado sea nuevo
              if ($marca_auto=="0") {
                //Busca todo tipo de autos cuyo estado sea nuevo y sin importar su marca
                if ($modelo_auto=="0") {

                  //Busca todo tipo de autos cuyo estado sea nuevo y sin importar su marca y sin importar su modelo
                  if ($año_desde_auto=="0") {

                    //Busca todo tipo de autos cuyo estado sea nuevo y sin importar su marca y sin importar su modelo y sin importar su año desde
                    if ($año_hasta_auto=="0") {

                      //Busca todo tipo de autos cuyo estado sea nuevo y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = 'Nuevo') ) AS TT " );

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
                                                              WHERE ( v.estado = 'Nuevo')
                                                              ORDER BY v.precio ASC
                                                               LIMIT ?,?");
                                                              //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta


                                    mysqli_stmt_bind_param($sql,"ii",$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }else {
                      //Busca todos los tipo de autos cuyo estado sea nuevo y sin importar su marca y sin importar su modelo y sin importar su año desde y su año debe ser hasta = $año_hasta_auto
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ? and v.ano <= ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"si",$estado_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ? AND v.ano <= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");
                                                              //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta


                                    mysqli_stmt_bind_param($sql,"siii",$estado_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }
                  }else {
                    //Busca todo tipo de autos cuyo estado sea nuevo y sin importar su marca y sin importar su modelo y que su año vaya desde $año_desde_auto
                    if ($año_hasta_auto=="0") {
                      //Busca todo tipo de autos cuyo estado sea nuevo y sin importar su marca y sin importar su modelo y que su año vaya desde $año_desde_auto y sin importar su año hasta
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ? AND v.ano >= ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"si",$estado_auto,$año_desde_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ? AND v.ano >= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");



                                    mysqli_stmt_bind_param($sql,"siii",$estado_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }else {
                      //Busca todo tipo de autos cuyo estado sea nuevo y sin importar su marca y sin importar su modelo y que su año vaya desde $año_desde_auto hasta $año_hasta_auto
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ?  AND v.ano BETWEEN ? AND ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"sii",$estado_auto,$año_desde_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ?  AND v.ano BETWEEN ? AND ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"siiii",$estado_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }
                  }

                }
              }else {
                //Busca todo tipo de autos cuyo estado sea nuevo y cuya marca = $marca_auto
                if ($modelo_auto=="0") {
                  //Busca todo tipo de autos cuyo estado sea nuevo y cuya marca = $marca_auto y todos los modelos disponibles
                  if ($año_desde_auto=="0") {
                    //Busca todo tipo de autos cuyo estado sea nuevo y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde
                    if ($año_hasta_auto=="0") {
                      //Busca todo tipo de autos cuyo estado sea nuevo y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde y sin importar su fecha hasta
                      //aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? and v.estado = ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"is",$marca_auto,$estado_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"isii",$marca_auto,$estado_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }else {
                      //Busca todo tipo de autos cuyo estado sea nuevo y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde y su fecha hasta sea = $año_hasta_auto
                      //aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano <= ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"isi",$marca_auto,$estado_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano <= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"isiii",$marca_auto,$estado_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }
                  }else {
                    //Busca todo tipo de autos cuyo estado = nuevo y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde = $año_desde_auto
                    if ($año_hasta_auto=="0") {
                      //Busca todo tipo de autos cuyo estado = nuevo y cuya marca = $marca_auto y todos los modelos disponibles y su fecha desde = $año_desde_auto y sin importar su año hasta
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano >= ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"isi",$marca_auto,$estado_auto,$año_desde_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano >= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"isiii",$marca_auto,$estado_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }else {
                      //Busca todo tipo de autos cuyo estado sea nuevo y cuya marca = $marca_auto y todos los modelos disponibles y su fecha desde = $año_desde_auto y hasta = $año_hasta_auto
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano BETWEEN ? AND ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"isii",$marca_auto,$estado_auto,$año_desde_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano BETWEEN ? AND ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"isiiii",$marca_auto,$estado_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }
                  }
                }else {
                  //Busca todo tipo de autos sin cuyo estado sea nuevo y cuya marca = $marca_auto y que su modelo sea = $modelo_auto
                  if ($año_desde_auto=="0") {
                    //Busca todo tipo de autos sin cuyo estado sea nuevo y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y sin importar desde que año
                    if ($año_hasta_auto=="0") {
                      //Busca todo tipo de autos sin cuyo estado sea nuevo y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y sin importar desde que año o hasta que año sea
                      //Aqui va un query
                          try {

                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"iss",$marca_auto,$estado_auto,$modelo_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"issii",$marca_auto,$estado_auto,$modelo_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }else {
                      //Busca todo tipo de autos cuyo estado sea nuevo y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y sin importar desde que año y que sea hasta el año = $año_hasta_auto
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano <= ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"issi",$marca_auto,$estado_auto,$modelo_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano <= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"issiii",$marca_auto,$estado_auto,$modelo_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin de query
                    }
                  }else {
                    //Busca todo tipo de autos cuyo estado sea = nuevo y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y cuyo año sea desde = $año_desde_auto
                    if ($año_hasta_auto=="0") {
                      //Busca todo tipo de autos cuyo estado sea = nuevo y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y cuyo año sea desde = $año_desde_auto y sin importar hasta que año sean
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano >= ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"issi",$marca_auto,$estado_auto,$modelo_auto,$año_desde_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano >= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"issiii",$marca_auto,$estado_auto,$modelo_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin de query
                    }else {
                      //Busca todo tipo de autos cuyo estado sea nuevo y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y cuyo año sea desde = $año_desde_auto y sea hasta = $año_hasta_auto
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano BETWEEN ? AND ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"issii",$marca_auto,$estado_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano BETWEEN ? AND ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"issiiii",$marca_auto,$estado_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }
                  }

                }
              }
          }else {
            //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo
            if ($marca_auto=="0") {
              //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y sin importar su marca
              if ($modelo_auto=="0") {
                //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y sin importar su marca y sin importar su modelo
                if ($año_desde_auto=="0") {
                  //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y sin importar su marca y sin importar su modelo y sin importar su año
                  if ($año_hasta_auto=="0") {
                    //Busca un tipo de auto =$tipo_auto sin su estado sea nuevo y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta
                    //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ?  ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"is",$tipo_auto,$estado_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ?) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isii",$tipo_auto,$estado_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo,$marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                    //Fin del query
                  }else {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y sin importar su marca y sin importar su modelo y sin importar su año desde y su año hasta sea =$año_hasta_auto.
                    //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano <= ? ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"isi",$tipo_auto,$estado_auto,$año_hasta_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano <= ?) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isiii",$tipo_auto,$estado_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                    //Fin del query
                  }
                }else {
                  //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y sin importar su marca y sin importar su modelo y su año =$año_desde_auto
                  if ($año_hasta_auto=="0") {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y sin importar su marca y sin importar su modelo y su año =$año_desde_auto y sin importar su año Desde
                    //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano >= ? ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"isi",$tipo_auto,$estado_auto,$año_desde_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano >= ?) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isiii",$tipo_auto,$estado_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                    //Fin del query
                  }else {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Nuevo y sin importar su marca y sin importar su modelo y su año =$año_desde_auto y su año hasta = $año_hasta_auto
                    //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano BETWEEN ? AND ? ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"isii",$tipo_auto,$estado_auto,$año_desde_auto,$año_hasta_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano BETWEEN ? AND ? ) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isiiii",$tipo_auto,$estado_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                    //Fin del query
                  }
                }
              }else {
                //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y sin importar su marca y su modelo = $modelo_auto
                //IMPOSIBLE
              }
            }else {
              //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y su marca = $marca_auto
              if ($modelo_auto=="0") {
                //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y su marca = $marca_auto y su modelo sea todos los disponibles
                if ($año_desde_auto=="0") {
                  //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea cualquiera
                  if ($año_hasta_auto=="0") {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea nuevo y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea cualquiera y su año hasta sea cualquiera
                    //aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isi",$tipo_auto,$estado_auto,$marca_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? and v.marca = ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isiii",$tipo_auto,$estado_auto,$marca_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }else {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Nuevo y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea cualquiera y su año hasta sea = $año_hasta_auto
                    //aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? and v.estado = ? AND v.marca = ? AND v.ano <= ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isii",$tipo_auto,$estado_auto,$marca_auto,$año_hasta_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.ano <= ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isiiii",$tipo_auto,$estado_auto,$marca_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }
                }else {
                  //Busca un tipo de auto = $tipo_auto sin su estado sea Nuevo y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea = $año_desde_auto
                  if ($año_hasta_auto=="0") {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Nuevo y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea = $año_desde_auto y año hasta sea cualquiera
                    //aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.ano >= ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isii",$tipo_auto,$estado_auto,$marca_auto,$año_desde_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.ano >= ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isiiii",$tipo_auto,$estado_auto,$marca_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }else {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Nuevo y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea = $año_desde_auto y año hasta sea = $año_hasta_auto
                    //aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.ano BETWEEN ? AND ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isiii",$tipo_auto,$estado_auto,$marca_auto,$año_desde_auto,$año_hasta_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.ano BETWEEN ? AND ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isiiiii",$tipo_auto,$estado_auto,$marca_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }
                }
              }else {
                //Busca un tipo de auto = $tipo_auto Y su estado sea Nuevo y su marca = $marca_auto y su modelo sea $modelo_auto
                if ($año_desde_auto=="0") {
                  //Busca un tipo de auto = $tipo_auto Y su estado sea Nuevo y su marca = $marca_auto y su modelo sea $modelo_auto y sin importar año desde
                  if ($año_hasta_auto=="0") {
                    //Busca un tipo de auto = $tipo_auto Y su estado sea = nuevo y su marca = $marca_auto y su modelo sea $modelo_auto y sin importar año desde y sin importar su año hasta
                    //Aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isis",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isisii",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }else {
                    //Busca un tipo de auto = $tipo_auto Y su estado sea = nuevo y su marca = $marca_auto y su modelo sea $modelo_auto y sin importar año desde y su año hasta sea = $año_hasta_auto
                    //Aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano <= ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isisi",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_hasta_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano <= ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isisiii",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }
                }else {
                    //Busca un tipo de auto = $tipo_auto Y su estado sea Nuevo y su marca = $marca_auto y su modelo sea $modelo_auto y que año desde = $año_desde_auto
                    if ($año_hasta_auto=="0") {
                      //Busca un tipo de auto = $tipo_auto Y su estado sea = Nuevo y su marca = $marca_auto y su modelo sea $modelo_auto y que año desde = $año_desde_auto y sin importar su año hasta
                      //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano >= ? ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"isisi",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_desde_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano >= ? ) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isisiii",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                      //Fin del query
                    }else {
                      //Busca un tipo de auto = $tipo_auto Y su estado sea = Nuevo y su marca = $marca_auto y su modelo sea $modelo_auto y que año desde = $año_desde_auto y su año hasta sea = $año_hasta_auto
                      //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano BETWEEN ? AND ? ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"isisii",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano BETWEEN ? AND ? ) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isisiiii",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                      //Fin del query
                    }
                }
              }

            }

          }
        break;

      case 'Usado':
          if ($tipo_auto=="0") {
              //Busca todo tipo de autos cuyo estado sea Usado
              if ($marca_auto=="0") {
                //Busca todo tipo de autos cuyo estado sea Usado y sin importar su marca
                if ($modelo_auto=="0") {

                  //Busca todo tipo de autos cuyo estado sea Usado y sin importar su marca y sin importar su modelo
                  if ($año_desde_auto=="0") {

                    //Busca todo tipo de autos cuyo estado sea Usado y sin importar su marca y sin importar su modelo y sin importar su año desde
                    if ($año_hasta_auto=="0") {

                      //Busca todo tipo de autos cuyo estado sea Usado y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = 'Usado')) AS TT " );

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
                                                              WHERE ( v.estado = 'Usado')
                                                              ORDER BY v.precio ASC
                                                               LIMIT ?,?");
                                                              //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta


                                    mysqli_stmt_bind_param($sql,"ii",$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }else {
                      //Busca todos los tipo de autos cuyo estado sea Usado y sin importar su marca y sin importar su modelo y sin importar su año desde y su año debe ser hasta = $año_hasta_auto
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ? and v.ano <= ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"si",$estado_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ? AND v.ano <= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");
                                                              //Busca todo tipo de autos sin importar su estado y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta


                                    mysqli_stmt_bind_param($sql,"siii",$estado_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }
                  }else {
                    //Busca todo tipo de autos cuyo estado sea Usado y sin importar su marca y sin importar su modelo y que su año vaya desde $año_desde_auto
                    if ($año_hasta_auto=="0") {
                      //Busca todo tipo de autos cuyo estado sea Usado y sin importar su marca y sin importar su modelo y que su año vaya desde $año_desde_auto y sin importar su año hasta
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ? AND v.ano >= ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"si",$estado_auto,$año_desde_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ? AND v.ano >= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");



                                    mysqli_stmt_bind_param($sql,"siii",$estado_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }else {
                      //Busca todo tipo de autos cuyo estado sea Usado y sin importar su marca y sin importar su modelo y que su año vaya desde $año_desde_auto hasta $año_hasta_auto
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ?  AND v.ano BETWEEN ? AND ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"sii",$estado_auto,$año_desde_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.estado = ?  AND v.ano BETWEEN ? AND ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"siiii",$estado_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }
                  }

                }
              }else {
                //Busca todo tipo de autos cuyo estado sea Usado y cuya marca = $marca_auto
                if ($modelo_auto=="0") {
                  //Busca todo tipo de autos cuyo estado sea Usado y cuya marca = $marca_auto y todos los modelos disponibles
                  if ($año_desde_auto=="0") {
                    //Busca todo tipo de autos cuyo estado sea Usado y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde
                    if ($año_hasta_auto=="0") {
                      //Busca todo tipo de autos cuyo estado sea Usado y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde y sin importar su fecha hasta
                      //aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? and v.estado = ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"is",$marca_auto,$estado_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"isii",$marca_auto,$estado_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }else {
                      //Busca todo tipo de autos cuyo estado sea Usado y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde y su fecha hasta sea = $año_hasta_auto
                      //aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano <= ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"isi",$marca_auto,$estado_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano <= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"isiii",$marca_auto,$estado_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }
                  }else {
                    //Busca todo tipo de autos cuyo estado = Usado y cuya marca = $marca_auto y todos los modelos disponibles y sin importar su fecha desde = $año_desde_auto
                    if ($año_hasta_auto=="0") {
                      //Busca todo tipo de autos cuyo estado = Usado y cuya marca = $marca_auto y todos los modelos disponibles y su fecha desde = $año_desde_auto y sin importar su año hasta
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano >= ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"isi",$marca_auto,$estado_auto,$año_desde_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano >= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"isiii",$marca_auto,$estado_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }else {
                      //Busca todo tipo de autos cuyo estado sea Usado y cuya marca = $marca_auto y todos los modelos disponibles y su fecha desde = $año_desde_auto y hasta = $año_hasta_auto
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano BETWEEN ? AND ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"isii",$marca_auto,$estado_auto,$año_desde_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.ano BETWEEN ? AND ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"isiiii",$marca_auto,$estado_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }
                  }
                }else {
                  //Busca todo tipo de autos sin cuyo estado sea Usado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto
                  if ($año_desde_auto=="0") {
                    //Busca todo tipo de autos sin cuyo estado sea Usado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y sin importar desde que año
                    if ($año_hasta_auto=="0") {
                      //Busca todo tipo de autos sin cuyo estado sea Usado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y sin importar desde que año o hasta que año sea
                      //Aqui va un query
                          try {

                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ?) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"iss",$marca_auto,$estado_auto,$modelo_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"issii",$marca_auto,$estado_auto,$modelo_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }else {
                      //Busca todo tipo de autos cuyo estado sea Usado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y sin importar desde que año y que sea hasta el año = $año_hasta_auto
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano <= ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"issi",$marca_auto,$estado_auto,$modelo_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano <= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"issiii",$marca_auto,$estado_auto,$modelo_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin de query
                    }
                  }else {
                    //Busca todo tipo de autos cuyo estado sea = Usado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y cuyo año sea desde = $año_desde_auto
                    if ($año_hasta_auto=="0") {
                      //Busca todo tipo de autos cuyo estado sea = Usado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y cuyo año sea desde = $año_desde_auto y sin importar hasta que año sean
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano >= ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"issi",$marca_auto,$estado_auto,$modelo_auto,$año_desde_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano >= ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"issiii",$marca_auto,$estado_auto,$modelo_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin de query
                    }else {
                      //Busca todo tipo de autos cuyo estado sea Usado y cuya marca = $marca_auto y que su modelo sea = $modelo_auto y cuyo año sea desde = $año_desde_auto y sea hasta = $año_hasta_auto
                      //Aqui va un query
                          try {
                              include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                      INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano BETWEEN ? AND ? ) ) AS TT " );

                                    mysqli_stmt_bind_param($sqlCount,"issii",$marca_auto,$estado_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto);
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
                                                              INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.marca = ? AND v.estado = ? AND v.modelo = ? and v.ano BETWEEN ? AND ?) ORDER BY v.precio ASC
                                                               LIMIT ?,?");


                                    mysqli_stmt_bind_param($sql,"issiiii",$marca_auto,$estado_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                    mysqli_stmt_execute($sql);
                                    mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                    $carrousell =0;
                                    $modalwindow =0;
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
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                  </li>
                                                  <li class='page-item'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                  </li>";

                                                  for ($i=2; $i <=$total_paginas ; $i++) {
                                                    echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                  }
                                            echo "<li class='page-item $condicionalDisable2'>
                                                    <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                  </li>";
                                    echo "</ul></nav>
                                          </section>";


                              }
                          } catch (\Exception $e) {
                              echo "Error 101 Creacion de bloque /";var_dump($e);
                          }
                      //Fin del query
                    }
                  }

                }
              }
          }else {
            //Busca un tipo de auto = $tipo_auto sin su estado sea Usado
            if ($marca_auto=="0") {
              //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y sin importar su marca
              if ($modelo_auto=="0") {
                //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y sin importar su marca y sin importar su modelo
                if ($año_desde_auto=="0") {
                  //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y sin importar su marca y sin importar su modelo y sin importar su año
                  if ($año_hasta_auto=="0") {
                    //Busca un tipo de auto =$tipo_auto sin su estado sea Usado y sin importar su marca y sin importar su modelo y sin importar su año desde y sin importar su año hasta
                    //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ?  ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"is",$tipo_auto,$estado_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ?) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isii",$tipo_auto,$estado_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo,$marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                    //Fin del query
                  }else {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y sin importar su marca y sin importar su modelo y sin importar su año desde y su año hasta sea =$año_hasta_auto.
                    //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano <= ? ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"isi",$tipo_auto,$estado_auto,$año_hasta_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano <= ?) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isiii",$tipo_auto,$estado_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                    //Fin del query
                  }
                }else {
                  //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y sin importar su marca y sin importar su modelo y su año =$año_desde_auto
                  if ($año_hasta_auto=="0") {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y sin importar su marca y sin importar su modelo y su año =$año_desde_auto y sin importar su año Desde
                    //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano >= ? ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"isi",$tipo_auto,$estado_auto,$año_desde_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano >= ?) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isiii",$tipo_auto,$estado_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                    //Fin del query
                  }else {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y sin importar su marca y sin importar su modelo y su año =$año_desde_auto y su año hasta = $año_hasta_auto
                    //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano BETWEEN ? AND ? ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"isii",$tipo_auto,$estado_auto,$año_desde_auto,$año_hasta_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.ano BETWEEN ? AND ? ) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isiiii",$tipo_auto,$estado_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                    //Fin del query
                  }
                }
              }else {
                //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y sin importar su marca y su modelo = $modelo_auto
                //IMPOSIBLE
              }
            }else {
              //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y su marca = $marca_auto
              if ($modelo_auto=="0") {
                //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y su marca = $marca_auto y su modelo sea todos los disponibles
                if ($año_desde_auto=="0") {
                  //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea cualquiera
                  if ($año_hasta_auto=="0") {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea cualquiera y su año hasta sea cualquiera
                    //aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isi",$tipo_auto,$estado_auto,$marca_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? and v.marca = ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isiii",$tipo_auto,$estado_auto,$marca_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }else {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea cualquiera y su año hasta sea = $año_hasta_auto
                    //aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? and v.estado = ? AND v.marca = ? AND v.ano <= ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isii",$tipo_auto,$estado_auto,$marca_auto,$año_hasta_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.ano <= ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isiiii",$tipo_auto,$estado_auto,$marca_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }
                }else {
                  //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea = $año_desde_auto
                  if ($año_hasta_auto=="0") {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea = $año_desde_auto y año hasta sea cualquiera
                    //aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.ano >= ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isii",$tipo_auto,$estado_auto,$marca_auto,$año_desde_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.ano >= ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isiiii",$tipo_auto,$estado_auto,$marca_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }else {
                    //Busca un tipo de auto = $tipo_auto sin su estado sea Usado y su marca = $marca_auto y su modelo sea todos los disponibles y año desde sea = $año_desde_auto y año hasta sea = $año_hasta_auto
                    //aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.ano BETWEEN ? AND ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isiii",$tipo_auto,$estado_auto,$marca_auto,$año_desde_auto,$año_hasta_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.ano BETWEEN ? AND ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isiiiii",$tipo_auto,$estado_auto,$marca_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }
                }
              }else {
                //Busca un tipo de auto = $tipo_auto Y su estado sea Usado y su marca = $marca_auto y su modelo sea $modelo_auto
                if ($año_desde_auto=="0") {
                  //Busca un tipo de auto = $tipo_auto Y su estado sea Usado y su marca = $marca_auto y su modelo sea $modelo_auto y sin importar año desde
                  if ($año_hasta_auto=="0") {
                    //Busca un tipo de auto = $tipo_auto Y su estado sea = Usado y su marca = $marca_auto y su modelo sea $modelo_auto y sin importar año desde y sin importar su año hasta
                    //Aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isis",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isisii",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }else {
                    //Busca un tipo de auto = $tipo_auto Y su estado sea = Usado y su marca = $marca_auto y su modelo sea $modelo_auto y sin importar año desde y su año hasta sea = $año_hasta_auto
                    //Aqui va un query
                      try {
                          include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                  INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano <= ? ) ) AS TT " );

                                mysqli_stmt_bind_param($sqlCount,"isisi",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_hasta_auto);
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
                                                          INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano <= ? ) ORDER BY v.precio ASC
                                                           LIMIT ?,?");


                                mysqli_stmt_bind_param($sql,"isisiii",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                mysqli_stmt_execute($sql);
                                mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                $carrousell =0;
                                $modalwindow =0;
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
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                              </li>
                                              <li class='page-item'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                              </li>";

                                              for ($i=2; $i <=$total_paginas ; $i++) {
                                                echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                              }
                                        echo "<li class='page-item $condicionalDisable2'>
                                                <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                              </li>";
                                echo "</ul></nav>
                                      </section>";


                          }
                      } catch (\Exception $e) {
                          echo "Error 101 Creacion de bloque /";var_dump($e);
                      }
                    //Fin del query
                  }
                }else {
                    //Busca un tipo de auto = $tipo_auto Y su estado sea Usado y su marca = $marca_auto y su modelo sea $modelo_auto y que año desde = $año_desde_auto
                    if ($año_hasta_auto=="0") {
                      //Busca un tipo de auto = $tipo_auto Y su estado sea = Usado y su marca = $marca_auto y su modelo sea $modelo_auto y que año desde = $año_desde_auto y sin importar su año hasta
                      //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano >= ? ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"isisi",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_desde_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano >= ? ) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isisiii",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_desde_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                      //Fin del query
                    }else {
                      //Busca un tipo de auto = $tipo_auto Y su estado sea = Usado y su marca = $marca_auto y su modelo sea $modelo_auto y que año desde = $año_desde_auto y su año hasta sea = $año_hasta_auto
                      //Aqui va un query
                        try {
                            include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
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
                                                                    INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano BETWEEN ? AND ? ) ) AS TT " );

                                  mysqli_stmt_bind_param($sqlCount,"isisii",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto);
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
                                                            INNER JOIN sucursal as s ON v.ubicacion = s.codigo_sucursal WHERE (v.categoria = ? AND v.estado = ? AND v.marca = ? AND v.modelo = ? AND v.ano BETWEEN ? AND ? ) ORDER BY v.precio ASC
                                                             LIMIT ?,?");


                                  mysqli_stmt_bind_param($sql,"isisiiii",$tipo_auto,$estado_auto,$marca_auto,$modelo_auto,$año_desde_auto,$año_hasta_auto,$empiezaPaginacion,$paginacion);
                                  mysqli_stmt_execute($sql);
                                  mysqli_stmt_bind_result($sql,$codigo, $marca,$modelo,$precio,$combustible,$kilometraje,$transmision,$ano,$foto1,$foto2,$foto3,$foto4,$foto5,$equipamiento,$estado,$color,$cilindrada,$ubicacion);
                                  $carrousell =0;
                                  $modalwindow =0;
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
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina-1)."'>&laquo; Anterior</a>
                                                </li>
                                                <li class='page-item'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=1' aria-label='Goto page 1'>1</a>
                                                </li>";

                                                for ($i=2; $i <=$total_paginas ; $i++) {
                                                  echo "<li class='page-item'><a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".$i."' aria-label='Goto page $i'>$i</a></li>";
                                                }
                                          echo "<li class='page-item $condicionalDisable2'>
                                                  <a class='page-link ' id='paginacion_links' href='menu_busqueda.php?customRadioInline1=$estado_auto&sel_tipo=$tipo_auto&marca=$marca_auto&sel_modelo=$modelo_auto&sel_año_desde=$año_desde_auto&sel_año_hasta=$año_hasta_auto&btnindex_search=Buscar&pagina=".($pagina+1)."' >Siguiente &raquo;</a>
                                                </li>";
                                  echo "</ul></nav>
                                        </section>";


                            }
                        } catch (\Exception $e) {
                            echo "Error 101 Creacion de bloque /";var_dump($e);
                        }
                      //Fin del query
                    }
                }
              }

            }

          }
        break;
    }


  } catch (\Exception $e) {
    echo "Error 101 Seccion Busqueda Avanzada/ menu_busqueda.php";
  }

}
/*****************************************************************************************************************/



?>