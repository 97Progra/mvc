<?php
require_once __DIR__ ."/../config/conexion.php";

function registrarUsuarios($usuario,$contrasena){
    $conexion = obtenerConexion();
    $stmt = $conexion->prepare("INSERT INTO (usuario , contrasena) VALUES (?,?)");
    if(!$stmt){
        die("Error en prepare: " .$conexion->error);
    }
    $stmt->bind_param("ss",$usuario,$contrasena);
    $resultado = $stmt->execute();
    if(!$resultado){
        die("Erro en la ejecucion " .$stmt->error);
    }

    $stmt->close();

}













?>