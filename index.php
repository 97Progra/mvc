<?php
// header("Location: Controlador/controlador.php");
session_start();
// require_once 'Vista/rutas.php';

$rutas = require 'Vista/rutas.php';

$ruta = $_GET['ruta'] ?? 'login';

if (isset($rutas[$ruta])) {
    require_once $rutas[$ruta];
} else {
    echo "❌ Ruta no válida.";
}


?>