<?php
require_once __DIR__ ."/../Modelo/modeloRegistrar.php";

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$contrasena = $_POST['contrasena'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

if(existeCorreo($correo)){
    echo "Ya existe el correo";
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['accion']) && $_GET['accion'] === 'registrar_usuario'){
    $resultado = registrarUsuarios($nombre, $apellido, $contrasena, $telefono, $correo);

    if($resultado){
        echo "Registro exitoso";
    }else{
        echo "Error al registra usuario";
    }

}





























?>