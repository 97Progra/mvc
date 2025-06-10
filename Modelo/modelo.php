<?php
require_once __DIR__ . '/../config/conexion.php';

function insertarVehiculo($tipo, $placa){
    //Variable global para la conexión
    global $conexion;
//Segura de inyecciones SQL
    $placa = mysqli_real_escape_string($conexion, $placa);
    $tipo = mysqli_real_escape_string($conexion, $tipo);

    $sql = "INSERT INTO vehiculos (placa, tipo) VALUES ('$placa', '$tipo')";
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);
    //Siempre el modelo retorna un resultado no valida nada 
    return $resultado;
}

function eliminarVehiculo($idVehiculo){
    global $conexion;
    $idVehiculo = mysqli_real_escape_string($conexion, $idVehiculo);

    $sql = "DELETE FROM vehiculos WHERE id = $idVehiculo";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}


function listarVehiculos(){
    global $conexion;
    $sql = "SELECT * FROM vehiculos";
    $resultado = mysqli_query($conexion, $sql);

    $vehiculos = array();
    while($fila = mysqli_fetch_assoc($resultado)){
        $vehiculos[] = $fila;
    }
    return $vehiculos;
}

function listarVehiculoId($id){
    global $conexion;
    $id = mysqli_real_escape_string($conexion, $id);
    $sql = "SELECT * FROM vehiculos WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    return mysqli_fetch_assoc($resultado);
}

function actualizarVehiculos($tipo, $placa, $id){
    global $conexion;
    $tipo = mysqli_real_escape_string($conexion, $tipo);
    $placa = mysqli_real_escape_string($conexion, $placa);
    $sql = "UPDATE vehiculos SET tipo = '$tipo', placa = '$placa' WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    return $resultado;
}







