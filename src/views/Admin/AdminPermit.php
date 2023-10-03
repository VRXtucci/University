<?php
// Archivo de conexión a la base de datos (debes configurar tu conexión aquí)
include("../../config/datebase.php");

// Consulta SQL para obtener los datos de la tabla usuarios
$query = "SELECT * FROM usuarios";
$result = $conn->query($query);

// Inicializa un array para almacenar los usuarios
$usuarios = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row; // Agregar cada fila al array de usuarios
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="../../js/main.js" defer></script>
    <link href="../../style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="flex w-screen h-screen">

    <!-- Modal para Editar a los Maestros -->
    <div id="modalEditar" class="z-10 fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <form id="maestroForm" action="../../controllers/AdminPermitController.php" method="post">
                <input type="hidden" id="UserID" name="UserID" value="">
                <header>
                    <h1 class="text-2xl font-bold mb-4">Editar Permiso</h1>
                </header>
                <main>
                    <label for="Name" class="block font-semibold">Email Del Usuario</label>
                    <input type="email" id="Email" name="Email" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <select id="EditarClaseRol" name="EditarClaseRol" class="w-full border border-gray-300 rounded-md p-2 mb-4">
                        <option value="" disabled selected>Selecciona Rol</option>
                        <option value="1">Admin</option>
                        <option value="2">Maestro</option>
                        <option value="3">Estudiante</option>
                    </select>
                    <select id="EditarEstado" name="EditarEstado" class="w-full border border-gray-300 rounded-md p-2 mb-4">
                        <option value="" disabled selected>Selecciona Estado</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </main>

                <footer class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">Guardar Cambios</button>
                    <button id="closeModal" class="bg-gray-400 text-white px-4 py-2 rounded-md">Cerrar</button>
                </footer>
            </form>
        </div>
    </div>


    <aside class="bg-[#353a40] h-screen flex flex-col w-2/12">
        <a href="/views/admin/admin_dashboard.php" class="flex gap-2 items-center p-4 border-b-2 border-[#42474d]">
            <img href="/views/admin/admin_dashboard.php" class="h-12 w-12 rounded-full" src="../../assets/logo.jpg" alt="logo">
            <label class=" text-[#c2c5cd] text-xl">Universidad</label>
        </a>
        <div class="flex flex-col p-4 border-b-2 border-[#42474d]">
            <span class=" text-[#c2c5cd]">admin</span>
            <span class=" text-[#c2c5cd]">Administrador</span>
        </div>
        <div class="flex flex-col gap-6 p-4">
            <span class="text-[#c2c5cd] px-6">MENÚ ADMINISTRACIÓN
            </span>
            <a href="./AdminPermit.php" class="gap-3 flex items-center">
                <span id="icon" class="material-symbols-outlined">
                    manage_accounts
                </span>
                <label class="cursor-pointer text-[#c2c5cd]">Permisos</label>
            </a>
            <a href="./AdminTeacher.php" class="gap-3 flex items-center">
                <span id="icon" class="material-symbols-outlined">
                    account_box
                </span>
                <label class="cursor-pointer text-[#c2c5cd]">Maestros</label>
            </a>
            <a href="./AdminStudents.php" class="gap-3 flex items-center">
                <span id="icon" class="material-symbols-outlined">
                    school
                </span>
                <label class="cursor-pointer text-[#c2c5cd]">Alumnos</label>
            </a>
            <a href="./AdminClass.php" class="gap-3 flex items-center">
                <span id="icon" class="material-symbols-outlined">
                    tv
                </span>
                <label class="cursor-pointer text-[#c2c5cd]">Clases</label>
            </a>
        </div>
    </aside>

    <section class="flex flex-col w-screen">
        <header class="p-1 flex justify-between shadow-md">
            <div class="flex gap-3 items-center">
                <span class="material-symbols-outlined">
                    menu
                </span>
                <a href="./AdminDashboard.php" class="p-4">Home</a>
            </div>
            <div class="relative flex p-4">
                <span class="cursor-pointer" onclick="toggleDropdown()">Administrador</span>
                <div id="myDropdown" class="dropdown-content">
                    <lu class="flex flex-col ">
                        <a href="/handle_db/logout.php">Logout</a>
                        <a href="#">Dashboard</a>
                    </lu>
                </div>
            </div>
        </header>
        <main>
            <div class="flex justify-between p-4">
                <div>
                    <h1 class="text-3xl text-black font-semibold">Lista de Permisos</h1>
                </div>
                <div>
                    <a class="text-blue-500" href="./AdminDashboard.php"> Home </a>
                    <a href="../admin_dashboard.php"> / Dashboard</a>
                </div>
            </div>
            <div class=" ring-1 ring-[#c2c5cd] mx-4">
                <section class="flex flex-col">
                    <h2 class="text-xl pl-2 py-2 border-2 border-white border-b-[#c2c5cd]">Información de permisos</h2>
                    <div class="flex justify-between py-4">
                        <div class="flex ml-4">
                            <button class="bg-[#6c747e] px-3 py-1 rounded-l-md text-white">Copy</button>
                            <button class="bg-[#6c747e] px-3 py-1 text-white">Excel</button>
                            <button class="bg-[#6c747e] px-3 py-1 text-white">PDF</button>
                            <select class="bg-[#6c747e] rounded-r-md text-white">Column Visibility</select>
                        </div>
                        <div class="mr-4">
                            <label>Search</label>
                            <input type="text" class="ring-1 ring-gray-400 rounded-sm">
                        </div>
                    </div>

                    <table class="flex flex-col border-[1px] border-[#c2c5cd] mx-3">
                        <thead class="flex flex-col border-2 border-b-[#c2c5cd]">
                            <tr class="flex justify-around">
                                <th class="text-lg font-semibold w-1/6">#</th>
                                <th class="text-lg font-semibold w-2/6">Email/Usuario</th>
                                <th class="text-lg font-semibold w-1/6">Permiso</th>
                                <th class="text-lg font-semibold w-1/6">Estado</th>
                                <th class="text-lg font-semibold w-1/6">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="flex flex-col">
                            <?php foreach ($usuarios as $persona) { ?>
                                <tr class="relative left-10 p-2 flex items-center justify-between">
                                    <td class="xl:relative xl:left-16"><?= $persona["ID"] ?></td>
                                    <td class="xl:relative xl:left-32"><?= $persona["email"] ?></td>
                                    <td class="xl:relative xl:left-36">
                                        <?php
                                        if ($persona["roles_id"] == 1) {
                                            echo "Admin";
                                        } elseif ($persona["roles_id"] == 2) {
                                            echo "Maestro";
                                        } elseif ($persona["roles_id"] == 3) {
                                            echo "Alumno";
                                        } else {
                                            echo "Desconocido";
                                        }
                                        ?>
                                    </td>
                                    <td class="xl:relative xl:left-28 <?php echo $persona["estado"] == 1 ? 'text-green-500' : ($persona["estado"] == 0 ? 'text-red-500' : 'text-black'); ?>">
                                        <?php
                                        if ($persona["estado"] == 1) {
                                            echo "Activo";
                                        } elseif ($persona["estado"] == 0) {
                                            echo "Desactivado";
                                        } else {
                                            echo "Desconocido";
                                        }
                                        ?>
                                    </td>
                                    <td class="xl:pl-20 w-1/6 cursor-pointer">
                                        <span class="material-symbols-outlined" onclick="openModalEditAdmin(event)" data-userid="<?= $persona["ID"] ?>">edit_square</span>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </section>
            </div>
        </main>
    </section>
</body>

</html>