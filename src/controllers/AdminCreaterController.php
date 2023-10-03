<?php
include("../config/datebase.php");

function insertarUsuario($email, $name, $lastname, $location, $birthdate) {
    global $conn;

    // Crear la consulta de inserción
    $insertQuery = "INSERT INTO usuarios (email, name_usuarios, lastname, location, birthdate, roles_id, estado)
                    VALUES ('$email', '$name', '$lastname', '$location', '$birthdate', 2, 'activo')";

    // Ejecutar la consulta
    if ($conn->query($insertQuery) === TRUE) {
        return true; // La inserción fue exitosa
    } else {
        return false; // Hubo un error en la inserción
    }
}

function editarUsuario($userId, $email, $name, $lastname, $location, $birthdate) {
    global $conn;

    // Consulta SQL para actualizar los datos del usuario
    $updateQuery = "UPDATE usuarios SET email = '$email', name_usuarios = '$name', lastname = '$lastname', location = '$location', birthdate = '$birthdate' WHERE ID = '$userId'";

    // Ejecutar la consulta
    if ($conn->query($updateQuery) === TRUE) {
        return true; // La actualización fue exitosa
    } else {
        return false; // Hubo un error en la actualización
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST["Email"];
    $name = $_POST["Name"];
    $lastname = $_POST["Lastname"];
    $location = $_POST["Location"];
    $birthdate = $_POST["Birthdate"];

    if (isset($_POST["UserID"])) {
        // Si existe "UserID" en el formulario, estamos editando un usuario existente
        $userId = $_POST["UserID"];
        if (editarUsuario($userId, $email, $name, $lastname, $location, $birthdate)) {
            // Redirige a la página después de editar exitosamente el usuario
            header("Location: ../views/Admin/AdminTeacher.php");
            exit();
        } else {
            // Manejo de errores en caso de fallo en la edición
            echo "Error al editar el usuario.";
        }
    } else {
        // Si no existe "UserID", estamos insertando un nuevo usuario
        if (insertarUsuario($email, $name, $lastname, $location, $birthdate)) {
            // Redirige a la página después de agregar exitosamente el usuario
            header("Location: ../views/Admin/AdminTeacher.php");
            exit();
        } else {
            // Manejo de errores en caso de fallo en la inserción
            echo "Error al insertar el usuario.";
        }
    }
}
?>
