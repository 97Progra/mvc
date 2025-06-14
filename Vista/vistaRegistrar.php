<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>

<body>
    <h2>Registrarse</h2>
    <form action="../Controlador/controladorRegistrar.php?accion=registrar_usuario" method="POST">
        <input type="text" placeholder="Nombres" name="nombre">
        <input type="text" placeholder="Apellidos" name="apellido">
        <input type="password" placeholder="Contrasena" name="contrasena">
        <input type="text" placeholder="Telefono" name="telefono">
        <input type="email" placeholder="Correo" name="correo">
        <input type="submit" value="Ingresar">
    </form>

</body>
</html>