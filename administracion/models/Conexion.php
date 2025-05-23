<?php
class Conexion {
    private $cnn;

    public function connect() {
        try {
            $this->cnn = mysqli_connect("localhost", "root", "", "dbautomotora");

            if (!$this->cnn) {
                throw new Exception("Conexion Fallida: " . mysqli_connect_error());
            }

            return $this->cnn;
            
        } catch (Exception $e) {
            echo "<h1>Error al tomar datos de la base de datos: " . $e->getMessage() . "</h1>";
            return null;
        }
    }
}
