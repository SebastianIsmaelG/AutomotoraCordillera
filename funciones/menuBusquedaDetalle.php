<?php
    require_once 'dbcall.php'; 

    if (!isset($id_vehiculo)) {
        exit("No existe un ID o dato para traer información. / menu_busqueda_detalle.php");
    }

    try {
        if (!$cnn) {
        throw new Exception("Error de conexión: " . mysqli_connect_error());
    }

    $sql = "SELECT 
                v.codigo,
                m.marca,
                v.modelo,
                FORMAT(v.precio, 0, 'de_DE') AS precio,
                com.combustible,
                v.kilometraje,
                tr.transmision,
                v.ano,
                v.foto1,
                v.foto2,
                v.foto3,
                v.foto4,
                v.foto5,
                v.equipamiento,
                v.estado,
                v.color,
                v.cilindrada,
                s.sucursal AS ubicacion,
                s.latitud,
                s.longitud
            FROM vehiculos AS v
            INNER JOIN marcas AS m ON v.marca = m.codigo
            INNER JOIN combustibles AS com ON v.combustible = com.codigo
            INNER JOIN transmisiones AS tr ON v.transmision = tr.codigo
            INNER JOIN sucursales AS s ON v.ubicacion = s.codigo
            WHERE v.codigo = ?";

    // Preparar la consulta
    $stmt = mysqli_prepare($cnn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_vehiculo);
    mysqli_stmt_execute($stmt);

    // Obtener resultados
    $result = mysqli_stmt_get_result($stmt);
    $vehiculo = mysqli_fetch_assoc($result);

    if (!$vehiculo) {
        exit("No se encontraron datos para el ID proporcionado.");
    }

    // Variables para su uso en HTML este deberia sumar ++
    $modalwindow = 0;
    $carrousell = 0;

    // Asignar valores obtenidos de la base de datos
    $codigo       = $vehiculo['codigo'];
    $marca        = $vehiculo['marca'];
    $modelo       = $vehiculo['modelo'];
    $precio       = $vehiculo['precio'];
    $combustible  = $vehiculo['combustible'];
    $kilometraje  = $vehiculo['kilometraje'];
    $transmision  = $vehiculo['transmision'];
    $ano          = $vehiculo['ano'];
    $foto1        = $vehiculo['foto1'];
    $foto2        = $vehiculo['foto2'];
    $foto3        = $vehiculo['foto3'];
    $foto4        = $vehiculo['foto4'];
    $foto5        = $vehiculo['foto5'];
    $equipamiento = $vehiculo['equipamiento'];
    $estado       = $vehiculo['estado'];
    $color        = $vehiculo['color'];
    $cilindrada   = $vehiculo['cilindrada'];
    $ubicacion    = $vehiculo['ubicacion'];
    $latitud      = $vehiculo['latitud'];
    $longitud     = $vehiculo['longitud'];

    mysqli_stmt_close($stmt);

} catch (Exception $e) {
    exit("Error al obtener los datos del vehículo: " . $e->getMessage());
}
?>
