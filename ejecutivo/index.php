<?php
require '../config.php';
session_start();
//si no hay session se va para el login
if (!isset($_SESSION['usuario']) && (int)$_SESSION['privilegio'] !== 2) {
    header("Location:".BASE_URL."administrativo.php?error");
    exit();
}else {
    //con el username y el privilegio vemos en la db sus otros datos;
    $usuarioEncontrado = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
    $privilegio = (int)$_SESSION['privilegio'];
}

