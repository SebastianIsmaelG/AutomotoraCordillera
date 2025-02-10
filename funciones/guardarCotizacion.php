<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $secretKey = "6LdpddEqAAAAAAPikRvfxs7jeQbrd-dI-trGPX4o"; // Clave secreta de Google reCAPTCHA
    $response = $_POST["g-recaptcha-response"]; // Respuesta del usuario
    $remoteIp = $_SERVER["REMOTE_ADDR"];

    // Verificar con Google
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        "secret" => $secretKey,
        "response" => $response,
        "remoteip" => $remoteIp
    ];

    $options = [
        "http" => [
            "header"  => "Content-type: application/x-www-form-urlencoded",
            "method"  => "POST",
            "content" => http_build_query($data)
        ]
    ];

    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captchaSuccess = json_decode($verify);

    if ($captchaSuccess->success) {
        if (isset($_POST["nombres_cotizacion"]) && isset($_POST["telefono_cotizacion"]) && isset($_POST["mail_cotizacion"])) {

            $nombreCliente = htmlspecialchars($_POST["nombres_cotizacion"]);
            $telefonoCliente = htmlspecialchars($_POST["telefono_cotizacion"]);
            $emailCliente = htmlspecialchars($_POST["mail_cotizacion"]);

            //Cotizacion sin codigo de vehiculo, como el form del index
            if (isset($_POST["vehiculo_visto"])) {
                $vehiculoVisto = 'Sin información';
            } else {
                $vehiculoVisto = htmlspecialchars($_POST["vehiculo_visto"]);
            }
            // sin mensaje para hacerle opcional
            if(empty($_POST["mensaje_cotizacion"])){
                $mensajeCliente = 'Sin mensaje';
            }else{
                $mensajeCliente = htmlspecialchars($_POST["mensaje_cotizacion"]);
            }
        }

        require_once 'dbcall.php';

        if (!$cnn) {
            die("Conexion Fallida: " . mysqli_connect_error());
        }

        $sql = mysqli_prepare($cnn, "INSERT INTO cotizaciones 
        (codigo,fecha, vehiculoVisto, nombre, telefono, email, mensaje)
         VALUES (null, CURDATE() ,? ,? ,? ,? ,?)");

        mysqli_stmt_bind_param($sql, "ssiss", $vehiculoVisto, $nombreCliente, $telefonoCliente, $emailCliente, $mensajeCliente);

        if (mysqli_stmt_execute($sql)) {
            $redirectUrl = !empty($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "index.php";

            // Verifica si la URL ya contiene success=1 luego se vuelve a la pagina de la que vino
            //podemos usar success para mostrar un mensaje en le frontend
            if (strpos($redirectUrl, 'success=1') === false) {
                $redirectUrl .= (strpos($redirectUrl, '?') === false) ? "?success=1" : "&success=1";
            }

            header("Location: $redirectUrl");
            exit;
            
        } else {
            echo "Error en la consulta: " . mysqli_error($cnn);
        }

        mysqli_stmt_close($sql);
    } else {
        echo "Error: No se pudo verificar el reCAPTCHA.";
    }
} else {
    echo "Acceso no autorizado.";
}
