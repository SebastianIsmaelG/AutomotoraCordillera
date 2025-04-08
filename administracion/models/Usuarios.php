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
        $sql = "SELECT codigo, nombreUsuario, nombres, apellidos, privilegioUsuario FROM {$this->table}";
        $stmt = $this->cnn->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $rows = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        echo "<table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>N</th>
                        <th scope='col'>Nombre Usuario</th>
                        <th scope='col'>nombres</th>
                        <th scope='col'>Apellidos</th>
                        <th scope='col'>Privilegios</th>
                        <th scope='col'></th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($rows as $row) {
           echo "<tr>
                    <td>".$row['codigo']."</td>
                    <td>".$row['nombreUsuario']."</td>
                    <td>".$row['nombres']."</td>
                    <td>".$row['apellidos']."</td>
                    <td>".($row['privilegioUsuario'] === '1' ? 'Administracion' : 'Secretaria')."</td>
                    <td> 
                        <button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modalEditarUsuario".$row['codigo']."'>
                            <i class='fas fa-edit'></i> Editar
                        </button>
                        <div class='modal fade' id='modalEditarUsuario".$row['codigo']."' tabindex='-1' role='dialog' aria-labelledby='modalEditarUsuarioLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5>Editar Usuario</h5>
                                        <button type='button' class='labelClose' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        ...
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                        <button type='button' class='btn btn-primary'>Eliminar Usuario</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td> 
                        <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modalEliminarUsuario".$row['codigo']."'>
                            <i class='fas fa-trash'></i> Eliminar
                        </button>
                        <div class='modal fade' id='modalEliminarUsuario".$row['codigo']."' tabindex='-1' role='dialog' aria-labelledby='modalEliminarUsuarioLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5>Confirmar eliminacion de usuario</h5>
                                        <button type='button' class='labelClose' data-bs-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p>Estas seguro de eliminar el siguiente usuario? Esta accion no se puede revertir.</p>
                                        <p> ".$row['nombreUsuario']." ( ".$row['nombres']." ".$row['apellidos']." )</p>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                        <button type='button' class='btn btn-primary'>Eliminar Usuario</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                 </tr>";
        }

        echo "</tbody>
            </table>";
    }
}
