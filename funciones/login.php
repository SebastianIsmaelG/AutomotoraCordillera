<?php
    session_start();

    if (!isset($_POST['nombreUsuario']) || !isset($_POST['passwordUsuario']) || !isset($_POST['selectPrivilegio']) ) {
        die.("no wei po logeate");
    }
?>