<?php $titulo = "Registrarse"; require_once "header.php"; ?>
    <h2>Registrarse</h2>
    <form  id="formularioRegistrar">
        <input type="text" placeholder="Nombres" name="nombre">
        <input type="text" placeholder="Apellidos" name="apellido">
        <input type="password" placeholder="Contrasena" name="contrasena">
        <input type="text" placeholder="Telefono" name="telefono">
        <input type="email" placeholder="Correo" name="correo">
        <input type="submit" value="Ingresar">
    </form>
    <div id="respuesta"></div>

<?php require_once "footer.php" ?>