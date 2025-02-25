<?php
try {
    require_once 'dbcall.php';

    if (!$cnn) {
        throw new Exception("Conexión Fallida: " . mysqli_connect_error());
    }

    $sql = "SELECT v.codigo AS codigo, m.marca, m.logo, v.modelo, 
                     FORMAT(v.precio, 0, 'de_DE') AS precio, com.combustible, 
                     v.kilometraje, tr.transmision, v.ano, v.foto1, v.foto2, v.foto3
              FROM vehiculos AS v
              INNER JOIN marcas AS m ON v.marca = m.codigo
              INNER JOIN combustibles AS com ON v.combustible = com.codigo
              INNER JOIN transmisiones AS tr ON v.transmision = tr.codigo
              ORDER BY RAND() 
              LIMIT 3";

    $results = mysqli_query($cnn, $sql);

    
    if (!$results) {
        throw new Exception("Error en la consulta: " . mysqli_error($cnn));
    }

    
    $vehiculos = [];

    // Recuperar los resultados
    while ($row = mysqli_fetch_assoc($results)) {
        $vehiculos[] = $row;
    }

    // Verificar si hay suficientes vehículos
    if (count($vehiculos) < 3) {
        throw new Exception("Error: No hay suficientes vehículos en la base de datos.");
    }
    

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Liberar el resultado de la consulta
    if (isset($results)) {
        mysqli_free_result($results);
    }

    // Cerrar la conexión a la base de datos
    if (isset($cnn)) {
        mysqli_close($cnn);
    }
}
?>