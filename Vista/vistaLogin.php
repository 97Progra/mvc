<?php $titulo = "Login"; require_once "header.php"; ?>
    <h2>Iniciar Sesion</h2>
    <form id="formularioLogin">
        <input type="text" placeholder="Correo" name="correo">
        <input type="password" placeholder="contraseña" name="contrasena">
        <input type="submit" value="Ingresar">
        <a href="index.php?ruta=registrarse">Registrase</a>
    </form>
    <div id="respuesta"></div>
<?php require_once "footer.php" ?>