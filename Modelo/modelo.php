<?php
require_once __DIR__ . '/../config/conexion.php';

function insertarVehiculo($tipo, $placa){
    $conexion = obtenerConexion();
    //Preparo la consulta 
    $stmt = $conexion->prepare("INSERT INTO vehiculos (tipo, placa) VALUES (?,?)");
    // Validar la preparacion de la consulta 
    if (!$stmt) {
        die("Error en prepare: " . $conexion->error);
    }
    // Vincula los valores reales del usuario a la consulta preparada.
    $stmt->bind_param("ss",$tipo,$placa);
    //"ss" indica los tipos de datos:
    //s → string
    //i → integer
    //d → double
    //b → blob (binario)

    //Ejecuto la consulta y la guardo en la variable resultado
    $resultado = $stmt->execute();
    //Validacion de la ejecucion 
    if(!$resultado){
        die("Error al ejecutar " . $stmt->error);
    }
    //Cierro el statement $stmt. NUNCA CIERRA LA CONEXION A LA BD, SOLO CIERRA LA CONSULTA
    $stmt->close();
    //Retorno el resultado paqra que llegue al controlador
    return $resultado;
}

function eliminarVehiculo($idVehiculo){
   $conexion = obtenerConexion();
    $stmt = $conexion->prepare("DELETE FROM vehiculos WHERE id = ?");
    if(!$stmt){
        die("Error en prepare " .$conexion->error);
    }
    $stmt->bind_param("i",$idVehiculo);
    $resultado = $stmt->execute();
    if(!$resultado){
        die("Error al ejecutar " . $stmt->error);
    }
    $stmt->close();
    return $resultado;
}


function listarVehiculos(){
    $conexion = obtenerConexion();
    $sql = "SELECT * FROM vehiculos";
    $resultado = mysqli_query($conexion, $sql);
    if(!$resultado){
        die("Error en la ejecucion " .$conexion->error);
    }
    // var_dump($resultado);
    $vehiculos = array();
    while($fila = mysqli_fetch_assoc($resultado)){
        $vehiculos[] = $fila;
    }
    return $vehiculos;
}

function listarVehiculoId($id){
    $conexion = obtenerConexion();
    $stmt = $conexion->prepare("SELECT * FROM vehiculos WHERE id = ?");
    if(!$stmt){
        die("Error en prepare " . $conexion->error);
    }
    $stmt->bind_param("i",$id);
    //Validar la ejecucion 
     if (!$stmt->execute()) {
        die("Error al ejecutar: " . $stmt->error);
    }
    $resultado = $stmt->get_result();
    // var_dump($resultado); objeto de tipo mysqli result
    
    //Validar el resultado
     if (!$resultado) {
        die("Error al obtener resultados: " . $stmt->error);
    }
    //sirven para obtener una fila del resultado como array asociativo,
    $vehiculo = $resultado->fetch_assoc();
    // var_dump($vehiculo); arreglo 
    $stmt->close();
    return ($vehiculo);
}

function actualizarVehiculos($tipo, $placa, $id){
    $conexion = obtenerConexion();
    $stmt = $conexion->prepare("UPDATE vehiculos SET tipo = ?, placa = ? WHERE id = ?");
    if(!$stmt){
        die("Error en el prepare " . $conexion->error);
    }
    $stmt->bind_param("ssi",$tipo,$placa,$id);
    $resultado = $stmt->execute();
    if(!$resultado){
        die("Error al ejecutar " . $stmt->error);
    }
    $stmt->close();
    return $resultado;
}







