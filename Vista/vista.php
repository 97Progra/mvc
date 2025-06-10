<?php
//La vista nunca incluye ni el modelo ni el controlador 
// require_once __DIR__ . '/../Controlador/controlador.php';
// Mostrar mensajes de éxito o error
if (isset($_GET['mensaje'])) {
    if ($_GET['mensaje'] === 'registro_exitoso') {
        echo "<p class='mensaje exito'>Vehículo registrado exitosamente.</p>";
    } elseif ($_GET['mensaje'] === 'error_registro') {
        echo "<p class='mensaje error'>Error al registrar el vehículo.</p>";
    } elseif ($_GET['mensaje'] === 'eliminacion_exitosa') {
        echo "<p class='mensaje exito'>Vehículo eliminado exitosamente.</p>";
    } elseif ($_GET['mensaje'] === 'error_eliminar') {
        echo "<p class='mensaje error'>Error al eliminar el vehículo.</p>";
    } elseif ($_GET['mensaje'] === 'actualizacion_exitosa') {
        echo "<p class='mensaje exito'>Vehículo Actualizado exitosamente.</p>";
    } elseif ($_GET['mensaje'] === 'error_actualizar') {
        echo "<p class='mensaje error'>Error al Actualizar el vehiculo.</p>";
    } elseif ($_GET['mensaje'] === 'campos_vacios') {
        echo "<p class='mensaje error'>Los campos no pueden estar vacios</p>";
    } elseif ($_GET['mensaje'] === 'Placa_inválida') {
        echo "<p class='mensaje error'>Error: placa invalida</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>

<body>
    <h1>Gestion de vehiculos del Parquedero</h1>

<table border="1">
    <tr>
        <th>id</th>
        <th>Tipo Vehiculo</th>
        <th>Placa</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($vehiculos as $vehiculo): ?>
        <tr>
            <td><?= htmlspecialchars($vehiculo['id']) ?></td>
            <td><?= htmlspecialchars($vehiculo['tipo']) ?></td>
            <td><?= htmlspecialchars($vehiculo['placa']) ?></td>
            <td>
                <a href="../Controlador/controlador.php?id=<?= $vehiculo['id'] ?>&accion=eliminar">Eliminar</a><br>
                <a href="../Controlador/controlador.php?idVehiculo=<?= $vehiculo['id'] ?>&accion=actualizar">Actualizar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


        <?php if (isset($mostraVehiculo)) : ?>
            <form id="formularioActualizar" action="../Controlador/controlador.php" method="POST" class="formulario">
                <h2>Actualizar Vehiculo</h2>
                <input type="text" name="tipoVehiculo" value="<?php echo htmlspecialchars($mostraVehiculo['tipo'] ?? ''); ?>">
                <br>
                <input type="text" name="placa" value="<?php echo htmlspecialchars($mostraVehiculo['placa'] ?? ''); ?>">
                <input type="hidden" name="idVehiculo" value="<?php echo htmlspecialchars($mostraVehiculo['id'] ?? ''); ?>">
                <input type="hidden" name="accion" value="actualizar">
                <br>
                <input type="submit" value="Actualizar">
            </form>

        <?php endif;  ?>
        <div class="formulario-registrar">
            <form id="formularioRegistro" action="../Controlador/controlador.php" method="POST" class="formulario ocultar">
                <h2>Registrar Vehiculo</h2>
                <input type="text" name="tipoVehiculo" placeholder="Ingrese el tipo de vehiculo" >
                <br>
                <input type="text" name="placa" placeholder="Ingrese la placa del vehiculo" >
                <input type="hidden" name="accion" value="registrar">
                <br>
                <input type="submit" value="Registrar">
            </form>
        </div>


        <div class="btn-registrar">
            <button id="btnMostrarFormulario">Registrar Vehiculo</button>
        </div>
        <script src="../js/generalidades.js"></script>
</body>

</html>
