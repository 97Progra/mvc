<?php
require_once __DIR__ . '/../Modelo/modeloLogin.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $usuario = loginUsuario($correo, $contrasena);

    if ($usuario) {
        // Guardamos datos en sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombres'];
        $_SESSION['correo'] = $correo;
        //Devuelvo Json
        echo json_encode(["estado" => "ok"]);
    } else {
        //Devuelvo Json
        echo json_encode(["estado" => "error", "mensaje" => "Correo o contraseña incorrectos"]);
    }
    exit;
}

// Ejecuta lógica...
require_once 'Vista/header.php';
require_once 'Vista/vistaLogin.php';
require_once 'Vista/footer.php';


?>