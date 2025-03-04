<?php 
require_once 'models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function login($usuarioEncontrado){
        $modelUsuario = new Usuario();
        $this->usuario = $modelUsuario->obtenerUsuarioPorUsername($usuarioEncontrado);
        //Si no encontro el usuario se va para el abismo
        if (!$this->usuario) {
            header("Location:" . BASE_URL . "administrativo.php?error");
            exit();
        }else{
            //var_dump($this->usuario); // Para verificar los datos
            // $_SESSION['usuario'] = $usuario;
            // var_dump($_SESSION['usuario']);
            
        }
    }
}
?>