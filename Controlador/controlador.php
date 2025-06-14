<?php
require_once __DIR__ . '/../Modelo/modelo.php';
require_once "tokens.php";
// Mostrar el formulario para registrar un vehículo

// function redirigir($mensaje)
// {
//     $destino = '../Vista/vista.php';
//     header("Location: $destino?mensaje=$mensaje");
//     exit;
// }
// Registrar Y Actualizar
session_start(); // ¡IMPORTANTE!



// $mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $tipoVehiculo = trim($_POST['tipoVehiculo'] ?? '');
    $placa = strtoupper(trim($_POST['placa'] ?? ''));
    //Validar token
    if (!isset($_POST['csrf_token'])) {
        die("❌ Error: Token CSRF ausente.");
    } elseif (!validarTokenCSRF($_POST['csrf_token'])) {
        die("❌ Error: Token CSRF inválido.");
    }
    if ($accion === 'registrar') {
        //^[A-Z]{3} → tres letras al inicio
        //[0-9]{2} → dos dígitos
        //[A-Z0-9]{1}$ → una letra o número al final
        // Redex  placa
        if (!preg_match('/^[A-Z]{3}[0-9]{2}[A-Z0-9]{1}$/', $placa)) {
            header("location: controlador.php?accion=listar&mensaje=Placa_inválida");
            exit;
        }
        // Validar campos
        if (empty($tipoVehiculo) || empty($placa)) {
            header("location: controlador.php?accion=listar&mensaje=campos_vacios");
            exit;
        }
        $resultado = insertarVehiculo($tipoVehiculo, $placa);
        if ($resultado) {
            header("location: controlador.php?accion=listar&mensaje=registro_exitoso");
        } else {
            header("location: controlador.php?accion=listar&mensaje=error_registro");
        }
        exit;
    }
    if ($accion === 'actualizar') {
        $id = intval($_POST['idVehiculo'] ?? 0);
        $resultado = actualizarVehiculos($tipoVehiculo, $placa, $id);
        var_dump($id);
        if ($resultado) {
            header("Location: controlador.php?accion=listar&mensaje=actualizacion_exitosa");
        } else {
            header("location: controlador.php?accion=listar&mensaje=error_actualizar");
        }
    }

    // Eliminar
    if ($accion === 'eliminar') {
        $idVehiculo = intval($_POST['id']);
        $resultado = eliminarVehiculo($idVehiculo);
        if ($resultado) {
            header("Location: controlador.php?accion=listar&mensaje=eliminacion_exitosa");
        } else {
            header("location: controlador.php?accion=listar&mensaje=error_eliminar");
        }
        exit;
    }
}

// Mostrar la lista de vehiculos
if (!isset($_GET['accion']) || $_GET['accion'] === 'listar') {
    $vehiculos = listarVehiculos();
    include '../Vista/vista.php';
    exit;
}

//obtener datos de un vehiculo para actualizar
if (isset($_GET['accion']) && $_GET['accion'] === 'actualizar' && (isset($_GET['idVehiculo']))) {
    $idVehiculo = intval($_GET['idVehiculo']);
    $vehiculos = listarVehiculos();
    $mostraVehiculo = listarVehiculoId($idVehiculo);
    include '../Vista/vista.php';
    exit;
}



//operador null coalescing (??)?
// $nombre = $_GET['nombre'] ?? 'Invitado';

// echo "Hola, $nombre";

//ternario
// Null coalescing (seguro)
// $edad = $_POST['edad'] ?? 'Desconocida';

// // Ternario (más largo)
// $edad = isset($_POST['edad']) ? $_POST['edad'] : 'Desconocida';

//Sanitacion de datos

//trim();Ejemplo: si alguien escribe " moto ", se convierte en "moto".

//strtoupper(trim($_POST['placa'])) Ejemplo: "abc123" se convierte en "ABC123".

//Usa $_POST['campo'] ?? '' para evitar errores si no viene definido.

//Usa trim() para limpiar los valores.

//Usa empty() antes de insertar en la base de datos para asegurar que no estás guardando datos vacíos.
