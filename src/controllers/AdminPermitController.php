<?php
include("../config/datebase.php");

function editarUsuario($userId, $email, $rolId, $estado) {
    global $conn;

    // Consulta SQL para actualizar los datos del usuario
    $updateQuery = "UPDATE usuarios SET email = '$email', roles_id = '$rolId', estado = '$estado' WHERE ID = '$userId'";

    // Ejecutar la consulta
    if ($conn->query($updateQuery) === TRUE) {
        return true; // La actualización fue exitosa
    } else {
        return false; // Hubo un error en la actualización
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $userId = $_POST["UserID"];
    $email = $_POST["Email"];
    $rolId = $_POST["EditarClaseRol"];
    $estado = $_POST["EditarEstado"];

    // Llamar a la función para editar el usuario
    if (editarUsuario($userId, $email, $rolId, $estado)) {
        // Redirige a la página después de editar exitosamente el usuario
        header("Location:../views/Admin/AdminPermit.php");
        exit();
    } else {
        // Manejo de errores en caso de fallo en la edición
        echo "Error al editar el usuario.";
    }
}
?>
<a href=""></a>