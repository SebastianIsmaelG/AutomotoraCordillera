<?php
require_once __DIR__ . '/../models/Conexion.php';

class Usuarios {
    private $cnn;
    private $table = "usuarios";

    public function __construct() {
        $db = new Conexion();
        $this->cnn = $db->connect();
    }

    public function obtenerUsuarioPorUsername($usuarioEncontrado) {
        $sql = "SELECT * FROM {$this->table} WHERE nombreUsuario = ?";
        $stmt = $this->cnn->prepare($sql);
        $stmt->bind_param("s", $usuarioEncontrado);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function obtenerTodosLosUsuarios() {
        $sql = "SELECT codigo, privilegioUsuario, nombres, apellidos FROM {$this->table}";
        $stmt = $this->cnn->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
