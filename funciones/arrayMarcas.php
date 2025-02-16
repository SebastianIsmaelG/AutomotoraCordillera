<?php
try {
    require_once 'dbcall.php';

    if (!$cnn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $sql = "SELECT logo, marca, codigo FROM marcas";
    $stmt = mysqli_prepare($cnn, $sql);
    mysqli_stmt_execute($stmt);
    $rs = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($rs)) {
        echo "<a class='dropdown-item' href='busqueda.php?codigoM=" . htmlspecialchars($row['codigo']) . "'>
                <img src='images/marcas/" . htmlspecialchars($row['logo']) . "' width='30px' height='30px'>
                 " . htmlspecialchars($row['marca']) . "
              </a>";
    }

    mysqli_stmt_close($stmt);
    //mysqli_close($cnn);

} catch (Exception $e) {
    echo "Error al tomar datos de la base de datos: " . $e->getMessage();
}
?>
