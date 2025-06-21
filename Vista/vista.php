<?php
//La vista nunca incluye ni el modelo ni el controlador 
// require_once __DIR__ . '/../Controlador/controlador.php';
// Mostrar mensajes de éxito o error
// if (isset($_GET['mensaje'])) {
//     if ($_GET['mensaje'] === 'registro_exitoso') {
//         echo "<p class='mensaje exito'>Vehículo registrado exitosamente.</p>";
//     } elseif ($_GET['mensaje'] === 'error_registro') {
//         echo "<p class='mensaje error'>Error al registrar el vehículo.</p>";
//     } elseif ($_GET['mensaje'] === 'eliminacion_exitosa') {
//         echo "<p class='mensaje exito'>Vehículo eliminado exitosamente.</p>";
//     } elseif ($_GET['mensaje'] === 'error_eliminar') {
//         echo "<p class='mensaje error'>Error al eliminar el vehículo.</p>";
//     } elseif ($_GET['mensaje'] === 'actualizacion_exitosa') {
//         echo "<p class='mensaje exito'>Vehículo Actualizado exitosamente.</p>";
//     } elseif ($_GET['mensaje'] === 'error_actualizar') {
//         echo "<p class='mensaje error'>Error al Actualizar el vehiculo.</p>";
//     } elseif ($_GET['mensaje'] === 'campos_vacios') {
//         echo "<p class='mensaje error'>Los campos no pueden estar vacios</p>";
//     } elseif ($_GET['mensaje'] === 'Placa_inválida') {
//         echo "<p class='mensaje error'>Error: placa invalida</p>";
//     }
// }


$mensajes = [
    'registro_exitoso' => ['success', 'Vehículo registrado exitosamente.'],
    'error_registro' => ['error', 'Error al registrar el vehículo.'],
    'eliminacion_exitosa' => ['success', 'Vehículo eliminado exitosamente.'],
    'error_eliminar' => ['error', 'Error al eliminar el vehículo.'],
    'actualizacion_exitosa' => ['success', 'Vehículo actualizado exitosamente.'],
    'error_actualizar' => ['error', 'Error al actualizar el vehículo.'],
    'campos_vacios' => ['warning', 'Los campos no pueden estar vacíos.'],
    'Placa_inválida' => ['warning', 'La placa ingresada no es válida.']
];


if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php?ruta=login");
    exit;
}
?>

<?php $titulo = "Tabla Vehiculos"; require_once "header.php"; ?>
    <h1>Gestion de vehiculos del Parquedero</h1>

    <h2>Bienvenido, <?php echo $_SESSION['nombre']; ?></h2>
    <a href="index.php?ruta=logout">Cerrar sesión</a>

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
                    <form class="eliminarVehiculo">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="hidden" name="id" value="<?= $vehiculo['id'] ?>">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generarTokenCSRF()); ?>">
                        <button type="submit" style="background:none;border:none;color:blue;cursor:pointer;">Eliminar</button>
                    </form>
                    <a href="index.php?ruta=listarvehiculos&idVehiculo=<?= $vehiculo['id'] ?>&accion=actualizar">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


    <?php if (isset($mostraVehiculo)) : ?>
        <form id="formularioActualizar"  class="formulario">
            <h2>Actualizar Vehiculo</h2>
            <input type="text" name="tipoVehiculo" value="<?php echo htmlspecialchars($mostraVehiculo['tipo'] ?? ''); ?>">
            <br>
            <input type="text" name="placa" value="<?php echo htmlspecialchars($mostraVehiculo['placa'] ?? ''); ?>">
            <input type="hidden" name="idVehiculo" value="<?php echo htmlspecialchars($mostraVehiculo['id'] ?? ''); ?>">
            <input type="hidden" name="accion" value="actualizar">
            <br>
            <input type="submit" value="Actualizar">
            <!-- Campo oculto con el token CSRF -->
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(generarTokenCSRF()); ?>">
        </form>

    <?php endif;  ?>
    <div class="formulario-registrar">
        <form id="formularioRegistroVehiculo" class="formulario ocultar ">
            <h2>Registrar Vehiculo</h2>
            <input type="text" name="tipoVehiculo" placeholder="Ingrese el tipo de vehiculo">
            <br>
            <input type="text" name="placa" placeholder="Ingrese la placa del vehiculo">
            <input type="hidden" name="accion" value="registrar">
            <br>
            <input type="submit" value="Registrar Vehiculo">
            <!-- Campo oculto con el token CSRF -->
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(generarTokenCSRF()); ?>">
        </form>
    </div>

    <div class="btn-registrar">
        <button id="btnMostrarFormulario">Registrar Vehiculo</button>
    </div>

    <?php require_once "footer.php" ?>