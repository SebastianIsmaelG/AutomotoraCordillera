<?php 
require_once 'models/Usuarios.php';

class UsuarioController {
    private $usuario;

    public function login($usuarioEncontrado){
        $modelUsuario = new Usuarios();
        $this->usuario = $modelUsuario->obtenerUsuarioPorUsername($usuarioEncontrado);
        if (!$this->usuario) {
            header("Location:" . BASE_URL . "administrativo.php?error");
            exit();
        }else{
            return $this->usuario; 
            
        }
    }

    public function busqueda(){
        $modelUsuario = new Usuarios();
        return $modelUsuario->obtenerTodosLosUsuarios();
    }
}
?>