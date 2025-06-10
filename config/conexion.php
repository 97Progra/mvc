<?php
// Configuración de la conexión a la base de datos
$localhost = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_datos = 'parqueadero';
$conexion = mysqli_connect($localhost, $usuario, $contrasena, $base_datos);
// Verificar la conexión

if(!$conexion){
    die ("Fallo la conexion a la base de datos" . mysqli_connect_error());
}

?>