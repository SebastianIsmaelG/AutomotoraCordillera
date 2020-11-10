<?php
      $user = $_POST['b'];

      if(!empty($user)) {
            comprobar($user);
      }

      function comprobar($b) {
        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
        if (!$cnn) {
          die("Conexion Fallida: " . mysqli_connect_error());
        }else{
          $sql = mysqli_query($cnn,"SELECT * FROM usuarios WHERE nombre = '".$b."'");
           
          $contar = mysqli_num_rows($sql);

          if($contar == 0){
                echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
          }else{
                echo "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe.</span>";
          }
        }


      }
?>
