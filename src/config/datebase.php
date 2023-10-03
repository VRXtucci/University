<?php
$servername = "localhost"; // Cambia esto al nombre de tu servidor MySQL
$username = "root"; // Cambia esto al nombre de usuario de tu base de datos
$password = ""; // Cambia esto a la contraseña de tu base de datos
$database = "universidad"; // Cambia esto al nombre de tu base de datos

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
} else {
}
?>
