<?php
// Archivo de conexión a la base de datos (debes configurar tu conexión aquí)
include("../../config/datebase.php");

// Consulta SQL para obtener los datos de los Maestros (usuarios con id_rol = 2)
$query = "SELECT * FROM usuarios WHERE roles_id = 3";
$result = $conn->query($query);

// Inicializa un array para almacenar los maestros
$maestros = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $maestros[] = $row; // Agregar cada fila al array de maestros
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

    <!-- Modal para Agregar a los Maestros -->
    <div id="modalAgregar" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <form id="maestroForm">
                <header>
                    <h1 class="text-2xl font-bold mb-4">Agregar ALumno</h1>
                </header>
                <main>
                    <label for="Name" class="block font-semibold">DNI</label>
                    <input type="text" id="DNI" name="DNI" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <label for="Email" class="block font-semibold">Correo Electrónico</label>
                    <input type="email" id="Email" name="Email" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <label for="Name" class="block font-semibold">Nombre</label>
                    <input type="text" id="Name" name="Name" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <label for="Lastname" class="block font-semibold">Apellido</label>
                    <input type="text" id="Lastname" name="Lastname" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <label for="Location" class="block font-semibold">Dirección</label>
                    <input type="text" id="Location" name="Location" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <label for="Birthdate" class="block font-semibold">Fecha de Nacimiento</label>
                    <input type="date" id="Birthdate" name="Birthdate" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                </main>
                <footer class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">Crear</button>
                    <button id="closeModal" class="bg-gray-400 text-white px-4 py-2 rounded-md">Cerrar</button>
                </footer>
            </form>
        </div>
    </div>

    <!-- Modal para Editar a los Maestros -->
    <div id="modalEditar" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <form id="maestroForm">
                <header>
                    <h1 class="text-2xl font-bold mb-4">Editar ALumno</h1>
                </header>
                <main>
                    <label for="Name" class="block font-semibold">DNI</label>
                    <input type="text" id="DNI" name="DNI" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <label for="Email" class="block font-semibold">Correo Electrónico</label>
                    <input type="email" id="Email" name="Email" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <label for="Name" class="block font-semibold">Nombre</label>
                    <input type="text" id="Name" name="Name" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <label for="Lastname" class="block font-semibold">Apellido</label>
                    <input type="text" id="Lastname" name="Lastname" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <label for="Location" class="block font-semibold">Dirección</label>
                    <input type="text" id="Location" name="Location" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <label for="Birthdate" class="block font-semibold">Fecha de Nacimiento</label>
                    <input type="date" id="Birthdate" name="Birthdate" class="w-full border border-gray-300 rounded-md p-2 mb-4">

                </main>
                <footer class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">Crear</button>
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
                <a href="./AdminDashboard.php" class="p-2">Home</a>
            </div>
            <div class="relative flex p-2">
                <div>
                    <span class="cursor-pointer dropdown-button" onclick="toggleDropdown()">Administrador</span>
                    <span class="material-symbols-outlined">
                        keyboard_arrow_down
                    </span>
                </div>

                <div id="myDropdown" class="dropdown-content">
                    <lu class="flex flex-col">
                    <a href="../../controllers/LogoutController.php">Logout</a>
                        <a href="#">Dashboard</a>
                    </lu>
                </div>
            </div>
        </header>
        <!-- aqui comienza el encabezado de la tabla  -->
        <main>
            <div class="flex justify-between p-4">
                <div>
                    <h1 class="text-3xl text-black font-semibold">Lista de Alumnos</h1>
                </div>
                <div>
                    <a class="text-blue-500" href="./AdminDashboard.php">
                        Home
                    </a>
                    <a>
                        / Dashboard
                    </a>
                </div>
            </div>
            <div class=" ring-1 ring-[#c2c5cd] mx-4">
                <section class="flex flex-col">
                    <div class="flex justify-between items-center border-2 border-white border-b-[#c2c5cd]">
                        <h2 class="text-xl pl-2 py-2 ">Información de alumnos</h2>
                        <button id="openModal" class="bg-blue-500 text-white mr-4 my-2 rounded-md px-2 py-1">Agregar Alumno</button>
                    </div>

                    <div class="flex justify-between py-4">
                        <div class="flex ml-4">
                            <button class="bg-[#6c747e] px-3 py-1 rounded-l-md">Copy</button>
                            <button class="bg-[#6c747e] px-3 py-1">Excel</button>
                            <button class="bg-[#6c747e] px-3 py-1">PDF</button>
                            <select class="bg-[#6c747e] rounded-r-md">Colum Visibility</select>
                        </div>
                        <div class="mr-4">
                            <label>Search</label>
                            <input type="text" class="ring-1 ring-gray-400 rounded-sm">
                        </div>
                    </div>

                    <!-- esta de aqui es la tabla -->
                    <table class="flex flex-col border-[1px] border-[#c2c5cd] mx-3">
                        <thead class="flex flex-col border-2 border-b-[#c2c5cd]">
                            <tr class="flex justify-around">
                                <th class="text-lg font-semibold">#</th>
                                <th class="text-lg font-semibold">Nombre</th>
                                <th class="text-lg font-semibold">Email</th>
                                <th class="text-lg font-semibold">Dirección</th>
                                <th class="text-lg font-semibold">Fec. de Nacimiento</th>
                                <th class="text-lg font-semibold">Clase Asignada</th>
                                <th class="text-lg font-semibold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($maestros as $maestro) { ?>
                                <tr class="flex justify-around">
                                    <td class="xl:relative xl:right-6"><?= $maestro["ID"] ?></td>
                                    <td class="xl:relative xl:right-[4.6rem]"><?= $maestro["name_usuarios"] ?></td>
                                    <td class="xl:relative xl:right-44"><?= $maestro["email"] ?></td>
                                    <td class="xl:relative xl:right-72"><?= $maestro["location"] ?></td>
                                    <td class="xl:relative xl:right-[18.5rem]"><?= $maestro["birthdate"] ?></td>
                                    <td>
                                        <span id="ModalEditar" class="material-symbols-outlined cursor-pointer">
                                            edit_square
                                        </span>
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