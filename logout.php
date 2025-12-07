<?php
session_start();   // Inicia la sesión actual
session_destroy(); // Destruye todas las variables de sesión
header("Location: login.php"); // Redirige al formulario de inicio de sesión
exit;
?>
