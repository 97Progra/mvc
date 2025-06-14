<?php
require_once __DIR__ ."/../config/conexion.php";

function existeCorreo($correo) {
    $conexion = obtenerConexion();
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    //Obtener el resultado
    $resultado = $stmt->get_result();
    //Validar el resultado
    $existe = $resultado->num_rows > 0;
    $stmt->close();
    return $existe;
}

function registrarUsuarios($nombre,$apellido,$contrasena, $telefono, $correo){
    $conexion = obtenerConexion();
    //Encriptar la contraseña
    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

    $stmt = $conexion->prepare("INSERT INTO usuarios (nombres, apellidos, contrasena, telefono, correo) VALUES (?,?,?,?,?)");
    if(!$stmt){
        die("Error en prepare: " .$conexion->error);
    }
    $stmt->bind_param("sssis",$nombre,$apellido,$contrasenaHash, $telefono, $correo);
    $resultado = $stmt->execute();
    if(!$resultado){
        die("Erro en la ejecucion " .$stmt->error);
    }

    $stmt->close();

    return $resultado;

}














?>