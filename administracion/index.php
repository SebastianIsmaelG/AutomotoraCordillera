<?php
require '../config.php';
session_start();
//si no hay session se va para el login
if (!isset($_SESSION['usuario'])) {
    header("Location:".BASE_URL."administrativo.php?error");
    exit();
}


echo "Hola";
echo "<br>";
// Usar los datos de sesión de forma segura
echo htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
echo "<br>";
echo (int)$_SESSION['privilegio']; // Convertir a entero para evitar ataques


