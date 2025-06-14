<?php
session_start();
session_unset(); // Borra todas las variables de sesión
session_destroy(); // Elimina la sesión del servidor
header("Location: ../Vista/vistaLogin.php"); // Redirige al login
exit;
?>