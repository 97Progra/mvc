<?php
require_once __DIR__ . "/../Modelo/modeloRegistrar.php";


// Validar si las variables están definidas
$nombre     = isset($_POST['nombre'])     ? $_POST['nombre']     : '';
$apellido   = isset($_POST['apellido'])   ? $_POST['apellido']   : '';
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
$telefono   = isset($_POST['telefono'])   ? $_POST['telefono']   : '';
$correo     = isset($_POST['correo'])     ? $_POST['correo']     : '';

if (existeCorreo($correo)) {
    echo "Ya existe el correo";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = registrarUsuarios($nombre, $apellido, $contrasena, $telefono, $correo);

    if ($resultado) {
        echo "Registro exitoso";
    } else {
        echo "Error al registra usuario";
    }
    exit;
}


// Ejecuta lógica...
require_once 'Vista/header.php';
require_once 'Vista/vistaRegistrar.php';
require_once 'Vista/footer.php';
