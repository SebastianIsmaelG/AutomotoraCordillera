<?php 
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    try {
        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
        if (!$cnn) {
            die("Conexion Fallida: " . mysqli_connect_error());
          }else{
            $sql = "SELECT codigo_region,nombre_region from region";
            $rs = mysqli_query($cnn,$sql);
            while ($row = mysqli_fetch_row($rs)){
        
              echo "<option value='".utf8_encode($row["0"])."'>".utf8_encode($row["1"])."</option>";
            }
            mysqli_free_result($rs);
            mysqli_close($cnn);
          }
          
    } catch (\Throwable $th) {
        //throw $th;
    }

?>