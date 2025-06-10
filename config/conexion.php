<?php

// Configuración de la conexión a la base de datos
function obtenerConexion() {
    $localhost = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_datos = 'parqueadero';

    $conexion = new mysqli($localhost, $usuario, $contrasena, $base_datos);

    // Verificar si hubo error en la conexión
    if ($conexion->connect_error) {
        die("Fallo la conexión a la base de datos: " . $conexion->connect_error);
    }
    return $conexion;
}
// function obtenerConexion() {
//     $localhost = 'localhost';
//     $usuario = 'root';
//     $contrasena = '';
//     $base_datos = 'parqueadero';
//     return new mysqli($localhost, $usuario, $contrasena, $base_datos);
// }
// // $conexion = mysqli_connect($localhost, $usuario, $contrasena, $base_datos);
// // Verificar la conexión

// if(!obtenerConexion()){
//     die ("Fallo la conexion a la base de datos" . mysqli_connect_error());
// }

?>