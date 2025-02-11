<?php
class menuBusqueda {
  
  private $cnn;

  public function __construct($cnn) {
      $this->cnn = $cnn;
  }

  public function busquedaAvanzada($radioSelect, $categoriaSelect, $marcaSelect, $modeloSelect, $anoDesdeSelect, $anoHastaSelect) {
    try {
      if (!$this->cnn) {
        throw new Exception("Conexion Fallida: " . mysqli_connect_error());
      }

      // Base SQL query
      $sql = "SELECT COUNT(*) AS TD FROM vehiculos as v WHERE 1=1";

      // Initialize an array to hold the types and values for binding
      $types = '';
      $params = [];

      // Dynamically adjust the query based on input parameters
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

      // Prepare the statement
      $stmt = mysqli_prepare($this->cnn, $sql);
      if (!$stmt) {
          throw new Exception("Error preparing statement: " . mysqli_error($this->cnn));
      }

      // Bind parameters if there are any
      if (!empty($params)) {
          mysqli_stmt_bind_param($stmt, $types, ...$params);
      }

      // Execute the statement
      if (!mysqli_stmt_execute($stmt)) {
          throw new Exception("Error executing statement: " . mysqli_stmt_error($stmt));
      }

      // Get the result
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);

      // Close the statement
      mysqli_stmt_close($stmt);

      // Return the count
      var_dump($row);
      echo "<h1> Datos: " . $row['TD'] . "</h1>";

    } catch (Exception $e) {
      echo "<h1>Error al tomar datos de la base de datos: " . $e->getMessage() . "</h1>";
      return null;
    }
  }
}