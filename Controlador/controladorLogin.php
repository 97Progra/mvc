<?php
require_once __DIR__ . '/../Modelo/modeloLogin.php';
session_start(); // Inicia la sesión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $usuario = loginUsuario($correo, $contrasena);

    if ($usuario) {
        // Guardamos datos en sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombres'];
        $_SESSION['correo'] = $correo;

        header("Location: ../Controlador/controlador.php");
        exit;
    } else {
        echo "Correo o contraseña incorrectos";
    }
}



?>