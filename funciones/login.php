<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = strip_tags($_POST['nombreUsuario']);
    $password = strip_tags(trim($_POST['passwordUsuario']));
    $privilegio = filter_input(INPUT_POST,'selectPrivilegio',FILTER_VALIDATE_INT);

    if (empty($username) || empty($password) || $privilegio === false || $privilegio === null) {
        die("Por favor, completa todos los campos.");
        //hay que devolver un get para mostrar un mensaje o un label con js debajo del campo vacio o incorrecto
    }
    //Ponemos el md5 al password que mando el user
    $passwordconMD5 = md5($password);

    if (!$cnn) {
        throw new Exception("Conexión Fallida: " . mysqli_connect_error());
    }
    $sql = "SELECT u.nombreUsuario, u.passwordUsuario, u.privilegioUsuario FROM usuarios as u
            WHERE (u.nombreUsuario = ? AND u.passwordUsuario = ? and u.privilegioUsuario = ?)";

    $stmt = mysqli_prepare($cnn, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $username,$passwordconMD5,$privilegio);
    mysqli_stmt_execute($stmt);

    //Comprobar 
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Error executing statement: " . mysqli_stmt_error($stmt));
    }

    // Obtener resultados y los guarda en un array 
    $result = mysqli_stmt_get_result($stmt);
    $usuarioEncontrado = mysqli_fetch_assoc($result);

    if (!$usuarioEncontrado) {
        //hacer esta salida mas bonita tipo usuario o contraseña incorrectos
        header("Location:".BASE_URL."administrativo.php?error");
    }

    //Datos del array
    //Los datos ya estan comprobados pero igual asi aprovecho de crear la session con los datos
    $usernameEncontrado = $usuarioEncontrado['nombreUsuario'];
    $passwordEncontrado = $usuarioEncontrado['passwordUsuario'];
    $privilegioEncontrado = $usuarioEncontrado['privilegioUsuario'];
 
    if($passwordconMD5 === $passwordEncontrado && $privilegio == $privilegioEncontrado){
        //Creamos el session storage
        $_SESSION['usuario'] = $usernameEncontrado;
        $_SESSION['privilegio'] = $privilegioEncontrado;
        //Tipo de usuario, va a administracion o ejecutivo
        switch ($privilegioEncontrado) {
            case 1:
                header("Location:".BASE_URL."administracion/index.php");
                break;
                exit();
            case 2:
                header("Location:".BASE_URL."ejecutivo/index.php");
                exit();
                break;
            default:
                header("Location:".BASE_URL."administrativo.php?error");
                exit();
                break;
        }
    }else{
        header("Location:".BASE_URL."administrativo.php?error");
        exit();
    }
}
