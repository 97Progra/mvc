<?php
require_once __DIR__ . '/../Modelo/modelo.php';
require_once "tokens.php";
// Mostrar el formulario para registrar un vehículo

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
          // Validar campos
        if (empty($tipoVehiculo) || empty($placa)) {
            echo json_encode(['estado' => 'vacio', 'mensaje' => 'campos_vacios']);
            exit;
        }
        //^[A-Z]{3} → tres letras al inicio
        //[0-9]{2} → dos dígitos
        //[A-Z0-9]{1}$ → una letra o número al final
        // Redex  placa
        if (!preg_match('/^[A-Z]{3}[0-9]{2}[A-Z0-9]{1}$/', $placa)) {
             echo json_encode(['estado' => 'placa', 'mensaje' => 'Placa_inválida']);
            exit;
        }
        $resultado = insertarVehiculo($tipoVehiculo, $placa);
        if ($resultado) {
            echo json_encode(['estado' => 'ok', 'mensaje' => 'registro_exitoso']);
        } else {
            echo json_encode(['estado' => 'error', 'mensaje' => 'error_registro']);
        }
        exit;
    }
    if ($accion === 'actualizar') {
        $id = intval($_POST['idVehiculo'] ?? 0);
        $resultado = actualizarVehiculos($tipoVehiculo, $placa, $id);
        if ($resultado) {
            echo json_encode(['estado' => 'ok', 'mensaje' => 'actualizacion_exitosa']);
            // header("Location: index.php?ruta=listarvehiculos&mensaje=actualizacion_exitosa");
        } else {
            echo json_encode(['estado' => 'error', 'mensaje' => 'error_actualizar']);
            // header("location: index.php?ruta=listarvehiculos&mensaje=error_actualizar");
        }
        exit;
    }

    // Eliminar
    if ($accion === 'eliminar') {
        $idVehiculo = intval($_POST['id']);
        $resultado = eliminarVehiculo($idVehiculo);
        if ($resultado) {
            echo json_encode(['estado' => 'ok', 'mensaje' => 'eliminacion_exitosa']);
            
        } else {
            echo json_encode(['estado' => 'error', 'mensaje' => 'error_eliminar']);
        }
        exit;
    }
}

//obtener datos de un vehiculo para actualizar
if (isset($_GET['accion']) && $_GET['accion'] === 'actualizar' && (isset($_GET['idVehiculo']))) {
    $idVehiculo = intval($_GET['idVehiculo']);

    $mostraVehiculo = listarVehiculoId($idVehiculo);

}

$vehiculos = listarVehiculos();
$mensaje = $_GET['mensaje'] ?? null;
require_once __DIR__ . '/../Vista/header.php';
require_once __DIR__ . '/../Vista/vista.php';
require_once __DIR__ . '/../Vista/footer.php';

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
