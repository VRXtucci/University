<?php

include("../config/datebase.php");


$email = "";
$password = "";
$errors = array();

// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $email = $_POST["username"];
    $password = $_POST["password"];

    // Validar que los campos no estén vacíos
    if (empty($email)) {
        array_push($errors, "El nombre de usuario es requerido");
    }
    if (empty($password)) {
        array_push($errors, "La contraseña es requerida");
    }

    // Si no hay errores, intentar iniciar sesión
    if (count($errors) == 0) {
        $password = md5($password); // Puedes usar hash más seguros en lugar de md5
        echo  "</br>" . "No hay errores en el formulario"; // Mensaje de depuración

        // Consulta SQL para verificar si el usuario existe en la base de datos
        $query = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
        echo "Query: $query"; // Mensaje de depuración

        // Realizar la consulta en la conexión abierta
        $result = $conn->query($query);

        if (!$result) {
            die("Error en la consulta: " . $conn->error);
        }

        if ($result->num_rows == 1) {
            // Usuario encontrado, inicia sesión y redirige a la página de inicio
            session_start();
            $_SESSION["email"] = $email;
            // Redirige a la página de administrador
            header("location: ../views/Admin/AdminDashboard.php");
            exit(); // Asegura que el script se detenga después de la redirección
        } else {
            array_push($errors, "Usuario o contraseña incorrectos");
        }
    }
}

// Cierra la conexión a la base de datos al final del script
$conn->close();
?>
