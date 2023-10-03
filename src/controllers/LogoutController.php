<?php
// Iniciar la sesión si aún no se ha iniciado
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión o a la página principal
header("location: ../../index.php"); // Cambia la URL según tu estructura de carpetas y nombres de archivo
exit(); // Asegura que el script se detenga después de la redirección
?>
