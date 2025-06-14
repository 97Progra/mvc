<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
</head>

<body>
    <h2>Iniciar Sesion</h2>
    <form action="../Controlador/controladorLogin.php" method="POST">
        <input type="text" placeholder="Correo" name="correo">
        <input type="password" placeholder="contraseña" name="contrasena">
        <input type="submit" value="Ingresar">
    </form>

</body>
</html>