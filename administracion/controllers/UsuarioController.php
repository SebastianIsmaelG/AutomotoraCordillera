<?php 
require_once 'models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function login($usuarioEncontrado){
        $modelUsuario = new Usuario();
        $this->usuario = $modelUsuario->obtenerUsuarioPorUsername($usuarioEncontrado);
        if (!$this->usuario) {
            header("Location:" . BASE_URL . "administrativo.php?error");
            exit();
        }else{
            return $this->usuario; 
            
        }
    }
}
?>