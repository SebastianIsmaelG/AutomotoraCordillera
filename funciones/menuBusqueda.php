<?php
class menuBusqueda
{

  private $cnn;

  public function __construct($cnn)
  {
    $this->cnn = $cnn;
  }

  public function busquedaAvanzada($radioSelect, $categoriaSelect, $marcaSelect, $anoDesdeSelect, $anoHastaSelect , $precioDesdeSelect, $precioHastaSelect)
  {
    try {
      if (!$this->cnn) {
        throw new Exception("Conexion Fallida: " . mysqli_connect_error());
      }

      //Paginacion del Catalogo
      $paginacion  = 5;
      if (isset($_GET['p'])) {
        $pagina = $_GET['p'];
      } else {
        $pagina = 1;
      }

      $empiezaPaginacion = ($pagina - 1) *  $paginacion;




      // Todos los vehiculos sin nada en especifico
      $sql = "SELECT COUNT(*) OVER() AS TD,
       v.codigo,
       v.estado,
       cat.categoria,
       m.marca,
       v.modelo,
       format(v.precio, 0, 'de_DE') as precio,
       v.color,
       cb.combustible,
       v.kilometraje,
       v.cilindrada,
       tr.transmision,
       v.ano,
       v.equipamiento,
       v.foto1,
       v.foto2,
       v.foto3,
       v.foto4,
       v.foto5,
       su.sucursal FROM vehiculos AS v
       INNER JOIN categorias AS cat ON v.categoria = cat.codigo
       INNER JOIN marcas AS m ON v.marca = m.codigo
       INNER JOIN combustibles AS cb ON v.combustible = cb.codigo
       INNER JOIN transmisiones AS tr ON v.transmision = tr.codigo 
       INNER JOIN sucursales AS su ON v.ubicacion = su.codigo
       WHERE 1=1";



      $types = '';
      $params = [];

      // Concatenamos $sql dependiendo de los valores recibidos
      if ($radioSelect != 'Todos') {
        $sql .= " AND v.estado = ?";
        $types .= 's';
        $params[] = $radioSelect;
      }
      if ($categoriaSelect != 0) {
        $sql .= " AND v.categoria = ?";
        $types .= 'i';
        $params[] = $categoriaSelect;
      }
      if ($marcaSelect != 0) {
        $sql .= " AND v.marca = ?";
        $types .= 'i';
        $params[] = $marcaSelect;
      }
      if ($anoDesdeSelect != 0 && $anoHastaSelect != 0) {
        $sql .= " AND v.ano BETWEEN ? AND ?";
        $types .= 'ii';
        $params[] = $anoDesdeSelect;
        $params[] = $anoHastaSelect;
      }
      if ($precioDesdeSelect != 0 && $precioHastaSelect != 0) {
        $sql .= " AND v.precio BETWEEN ? AND ?";
        $types .= 'ii';
        $params[] = $precioDesdeSelect;
        $params[] = $precioHastaSelect;
      }

      $sql .= " ORDER BY v.precio ASC LIMIT ?,? ";
      $types .= 'ii';
      $params[] = $empiezaPaginacion;
      $params[] = $paginacion;


      $stmt = mysqli_prepare($this->cnn, $sql);
      if (!$stmt) {
        throw new Exception("Error preparing statement: " . mysqli_error($this->cnn));
      }

      // si entro en alguno de los if anteriores hacemos bind_param 
      if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
      }

      if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Error executing statement: " . mysqli_stmt_error($stmt));
      }

      // resultado y creamos
      $result = mysqli_stmt_get_result($stmt);
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
      mysqli_stmt_close($stmt);
      //var_dump($rows);
      $carrousell = 0;
      $modalwindow = 0;

      if (empty($rows)) {

        echo "<div class='container'><p>Se han encontrado 0 resultados</p></div>";
      } else {

        echo "<p>Se han encontrado " . $rows[0]['TD'] . " resultados</p>";
        echo "<div class='row'>";

        foreach ($rows as $row) {
          include 'menuBusquedaCatalogo.php';
          $carrousell++;
          $modalwindow++;
        }
        echo "</div>";
      }

      //Se crea nav de paginacion
      $total_paginas = ceil($rows[0]['TD'] / $paginacion); //total de autos
      //Condicional de disable para la paginacion
      if ($pagina == 1) {
        $condicionalDisable1 = "disabled";
      } else {
        $condicionalDisable1 = "";
      }
      if ($pagina == $total_paginas) {
        $condicionalDisable2 = "disabled";
      } else {
        $condicionalDisable2 = "";
      }

      echo "<section class='container ' style='padding-top:10px;'>
              <nav aria-label='Page navigation'>
                <ul class='pagination justify-content-center'>
                  <li class='page-item $condicionalDisable1'>
                    <a class='page-link ' id='paginacion_links' href='busqueda.php?r=$radioSelect&cat=$categoriaSelect&m=$marcaSelect&yrd=$anoDesdeSelect&yrh=$anoHastaSelect&mnp=$precioDesdeSelect&mxp=$precioHastaSelect&srcInd=Buscar&p=" . ($pagina - 1) . "'>&laquo; Anterior</a>
                  </li>
                  <li class='page-item'>
                    <a class='page-link ' id='paginacion_links' href='busqueda.php?r=$radioSelect&cat=$categoriaSelect&m=$marcaSelect&yrd=$anoDesdeSelect&yrh=$anoHastaSelect&mnp=$precioDesdeSelect&mxp=$precioHastaSelect&srcInd=Buscar&p=1' aria-label='Goto page 1'>1</a>
                  </li>";

                  for ($i = 2; $i <= $total_paginas; $i++) {
                    echo "<li class='page-item'><a class='page-link' id='paginacion_links' href='busqueda.php?r=$radioSelect&cat=$categoriaSelect&m=$marcaSelect&yrd=$anoDesdeSelect&yrh=$anoHastaSelect&srcInd=Buscar&p=" . $i . "' aria-label='Goto page $i'>$i</a></li>";
                  }
            echo "<li class='page-item $condicionalDisable2'>
                    <a class='page-link ' id='paginacion_links' href='busqueda.php?r=$radioSelect&cat=$categoriaSelect&m=$marcaSelect&yrd=$anoDesdeSelect&yrh=$anoHastaSelect&mnp=$precioDesdeSelect&mxp=$precioHastaSelect&srcInd=Buscar&p=" . ($pagina + 1) . "' >Siguiente &raquo;</a>
                  </li>";
           echo "</ul></nav>
              </section>";
    } catch (Exception $e) {
      echo "<h1>Error al tomar datos de la base de datos: " . $e->getMessage() . "</h1>";
      return null;
      //quito modelo??? revisa otras paginas de ventas
    }
  }

  public function busquedaMarcas($marcaSelect)
  {
    try {
      if (!$this->cnn) {
        throw new Exception("Conexion Fallida: " . mysqli_connect_error());
      }
    } catch (Exception $e) {
      echo "<h1>Error al tomar datos de la base de datos: " . $e->getMessage() . "</h1>";
      return null;
    }
  }
}
