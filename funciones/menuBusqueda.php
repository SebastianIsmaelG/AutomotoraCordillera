<?php
class menuBusqueda
{

  private $cnn;

  public function __construct($cnn)
  {
    $this->cnn = $cnn;
  }

  public function busquedaAvanzada($radioSelect, $categoriaSelect, $marcaSelect, $modeloSelect, $anoDesdeSelect, $anoHastaSelect)
  {
    try {
      if (!$this->cnn) {
        throw new Exception("Conexion Fallida: " . mysqli_connect_error());
      }

      //Paginacion del Catalogo
      $paginacion  = 5;
      if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
      }else {
        $pagina = 1;
      }

      $empiezaPaginacion = ($pagina-1) *  $paginacion;




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
      if ($modeloSelect != 0) {
        $sql .= " AND v.modelo = ?";
        $types .= 'i';
        $params[] = $modeloSelect;
      }
      if ($anoDesdeSelect != 0 && $anoHastaSelect != 0) {
        $sql .= " AND v.ano BETWEEN ? AND ?";
        $types .= 'ii';
        $params[] = $anoDesdeSelect;
        $params[] = $anoHastaSelect;
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
      $carrousell =0;
      $modalwindow =0;

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
    } catch (Exception $e) {
      echo "<h1>Error al tomar datos de la base de datos: " . $e->getMessage() . "</h1>";
      return null;
    }
  }
}
