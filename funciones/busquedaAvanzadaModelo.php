<?php
    try {
        require_once 'dbcall.php';

        if (!$cnn) {
            die("Conexión Fallida: " . mysqli_connect_error());
        }

        
        if (!isset($_POST["marca"]) || empty($_POST["marca"])) {
            
            $cadena = "<select class='form-control' id='modelo' name='md' style='width:100%;'>";
            $cadena .= "</select>";
        }

        
        $variable_ajax = $_POST["marca"];
        $sql = "SELECT modelo FROM vehiculos WHERE marca = ? LIMIT 8";
        $stmt = mysqli_prepare($cnn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $variable_ajax);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $cadena = "<select class='form-control' id='modelo' name='md' style='width:100%;'>";
            $cadena .= "<option value='0'>Todos los disponibles</option>";
            
            

            while ($ver = mysqli_fetch_row($result)) {
                $cadena .= '<option value="' . htmlspecialchars($ver[0]) . '">' . htmlspecialchars($ver[0]) . '</option>';
            }

            $cadena .= "</select>";
            echo $cadena;

            
            mysqli_stmt_close($stmt);
        } else {
            echo "Error en la preparación de la consulta.";
        }

    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    //Revisar este codigo
?>
