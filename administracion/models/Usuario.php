<?php
require_once __DIR__ . '/../models/Conexion.php';

class Usuario {
    private $conn;
    private $table = "usuarios";

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->connect();
    }

    public function obtenerUsuarioPorUsername($usuarioEncontrado) {
        $sql = "SELECT * FROM {$this->table} WHERE nombreUsuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $usuarioEncontrado);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
}
