<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, $_POST['nombreUsuario'], FILTER_SANITIZE_STRING);
    $password = trim($_POST['passwordUsuario']);
    $privilegio = filter_input(INPUT_POST,$_POST['selectPrivilegio'],FILTER_SANITIZE_INT);

    if (empty($username) || empty($password)) {
        die("Por favor, completa todos los campos.");
        //hay que devolver un get para mostrar un mensaje o un label con js debajo del campo vacio o incorrecto
    }
    $passwordComprobado = md5($password);
    if (!$cnn) {
        throw new Exception("Conexión Fallida: " . mysqli_connect_error());
    }
    $sql = "SELECT u.nombreUsuario, u.passwordUsuario, u.privilegio FROM usuarios as u
            WHERE (u.nombreUsuario = ? AND u.passwordUsuario = ? and u.privilegio = ?)";

    $stmt = mysqli_prepare($cnn, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $username,$passwordComprobado,$privilegio);
}
