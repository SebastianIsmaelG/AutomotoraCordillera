<?php
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (!isset($_POST["btn_guardar"])) {
    header('location:/index.php');//EH
}else {
  try {
      $nombre_cliente = $_POST["nombres_cotizacion"];
      $telefono_cliente = $_POST["telefono_cotizacion"];
      $email_cliente = $_POST["mail_cotizacion"];
      $mensaje_cliente = $_POST["mensaje_cotizacion"];
      $vehiculo_visto = $_POST["vehiculo_visto"];
      require_once '/storage/ssd3/242/8557242/public_html/recaptchalib.php';
      $secret = "6Lcpuo4UAAAAACwPfnjA794CTECGg1Z8BjIe6Sq8";
      // empty response
      $response = null;
      // check secret key
      $reCaptcha = new ReCaptcha($secret);
      // if submitted check response
        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }
      if ($response != null && $response->success) {
        include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';
          if (!$cnn) {
              die("Conexion Fallida: " . mysqli_connect_error());
          }else{
              if (!isset($vehiculo_visto)) {
                $vehiculo_visto=0;

                $sql = mysqli_prepare($cnn,"INSERT INTO cotizaciones (codigo_cotizacion,fecha, vehiculo_visto, nombre_cliente, telefono_cliente, email_cliente, mensaje_cliente,estado) VALUES (null,CURDATE(),?,?,?,?,?,'pendiente')");
                mysqli_stmt_bind_param($sql,"isiss",$vehiculo_visto,$nombre_cliente,$telefono_cliente,$email_cliente,$mensaje_cliente);
                mysqli_stmt_execute($sql);
                  echo "<script>alert('Solicitud procesada con exito');history.back();</script>";


              }else {
                $sql = mysqli_prepare($cnn,"INSERT INTO cotizaciones (codigo_cotizacion,fecha, vehiculo_visto, nombre_cliente, telefono_cliente, email_cliente, mensaje_cliente,estado)
                VALUES (null,CURDATE(),?,?,?,?,?,'pendiente')");
                mysqli_stmt_bind_param($sql,"isiss",$vehiculo_visto,$nombre_cliente,$telefono_cliente,$email_cliente,$mensaje_cliente);
                mysqli_stmt_execute($sql);
                echo "<script>alert('Solicitud procesada con exito');history.back();</script>";
              }
              mysqli_close($cnn);
          }
      } else {
        echo "<script>alert('No se ha podido validar el Captcha, reintente');history.back();</script>";
      }


  } catch (\Exception $e) {

  }

}


 ?>
