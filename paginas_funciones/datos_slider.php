<?php
try {
    require_once 'dbcall.php';

    if (!$cnn) {
        die("Conexión Fallida: " . mysqli_connect_error());
    }

    $query = "SELECT v.codigo AS codigo, m.marca, m.logo, v.modelo, 
                     FORMAT(v.precio, 0, 'de_DE') AS precio, com.combustible, 
                     v.kilometraje, tr.transmision, v.ano, v.foto1, v.foto2, v.foto3
              FROM vehiculos AS v
              INNER JOIN marcas AS m ON v.marca = m.codigo
              INNER JOIN combustibles AS com ON v.combustible = com.codigo
              INNER JOIN transmisiones AS tr ON v.transmision = tr.codigo
              ORDER BY RAND() 
              LIMIT 3";

    $results = mysqli_query($cnn, $query);

    if (!$results) {
        die("Error en la consulta: " . mysqli_error($cnn));
    }

    $vehiculos = [];

    while ($row = mysqli_fetch_assoc($results)) {
        $vehiculos[] = $row;
    }

    // Verificar si hay suficientes vehículos
    if (count($vehiculos) < 3) {
        die("Error: No hay suficientes vehículos en la base de datos.");
    }


    // Ahora puedes acceder a los vehículos usando $vehiculos[0], $vehiculos[1], etc.
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
