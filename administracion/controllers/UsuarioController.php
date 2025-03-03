<?php 
require_once 'models/Usuario.php';

class UsuarioController {
    public function login($usuarioEncontrado){
        $modelUsuario = new Usuario();
        $usuario = $modelUsuario->obtenerUsuarioPorUsername($usuarioEncontrado);
        //Si no encontro el usuario se va para el abismo
        if (!$usuario) {
            header("Location:" . BASE_URL . "administrativo.php?error");
            exit();
        }else{
            //Aqui llamalo desde las paginas como por ejemplo $_SESSION['usuario']['nombre'],$_SESSION['usuario']['apellido']
            $_SESSION['usuario'] = $usuario;
        }
    }
}
?>