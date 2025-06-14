<?php
require_once __DIR__ ."/../config/conexion.php";

function loginUsuario($correo, $contrasena) {
    $conexion = obtenerConexion();

    $stmt = $conexion->prepare("SELECT id, nombres, apellidos, contrasena FROM usuarios WHERE correo = ?");
    if (!$stmt) {
        die("Error en prepare: " . $conexion->error);
    }

    $stmt->bind_param("s", $correo);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Verificamos la contraseña
        if (password_verify($contrasena, $usuario['contrasena'])) {
            return $usuario; // Devuelve los datos del usuario
        } else {
            return false; // Contraseña incorrecta
        }
    } else {
        return false; // Usuario no encontrado
    }

    $stmt->close();
}



?>