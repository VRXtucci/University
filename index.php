<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="/style.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-yellow-200 min-h-screen flex flex-col justify-center items-center">
    <section class="flex flex-col items-center">
        <img src="./src/assets/logo.jpg" alt="Logo" class="h-40 w-40 rounded-full">
        <form class="bg-white p-8 rounded-md shadow-md mt-8 max-w-md w-full" method="post" action="./src/controllers/LoginController.php">
            <h3 class="text-gray-500 text-lg font-semibold mb-6">Bienvenido. Ingresa con tu cuenta</h3>
            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-medium">Email</label>
                <input type="text" name="username" id="email" class="ring-1 ring-gray-300 rounded-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:border-blue-300" placeholder="Nombre de usuario">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-600 font-medium">Contraseña</label>
                <input type="password" name="password" id="password" class="ring-1 ring-gray-300 rounded-md w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:border-blue-300" placeholder="Contraseña">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300">Ingresar</button>
        </form>
    </section>
</body>

</html>