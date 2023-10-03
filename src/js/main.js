function toggleDropdown() {
    let dropdown = document.getElementById("myDropdown");
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
    }
}

window.onclick = function (event) {
    if (!event.target.matches('.cursor-pointer')) {
        let dropdown = document.getElementById("myDropdown");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        }
    }
}

// Función para abrir el modal de edición
function openModalEditMaestro(index) {
    let modal = document.getElementById('modalEditar');
    modal.style.display = 'flex';

    // Obtener los datos del maestro que se va a editar según el índice
    let fila = document.querySelectorAll('table tbody tr')[index];
    let nombre = fila.cells[1].textContent;
    let email = fila.cells[2].textContent;
    let direccion = fila.cells[3].textContent;
    let fechaNacimiento = fila.cells[4].textContent;

    // Llenar los campos del formulario con los datos del maestro
    document.getElementById('EditarNombre').value = nombre;
    document.getElementById('EditarEmail').value = email;
    document.getElementById('EditarDireccion').value = direccion;
    document.getElementById('EditarFechaNacimiento').value = fechaNacimiento;
    // Puedes llenar el campo de "Clase Asignada" de manera similar
}

// Función para cerrar el modal de edición
function closeModalEditMaestro() {
    let modal = document.getElementById('modalEditar');
    modal.style.display = 'none';
}

// Agregar un evento de clic a todos los elementos con la clase "material-symbols-outlined"
let editIcons = document.querySelectorAll('.material-symbols-outlined');

editIcons.forEach(function (icon, index) {
    icon.addEventListener('click', function () {
        openModalEditMaestro(index); // Pasa el índice para identificar el maestro a editar
    });
});

// Abrir el modal
document.getElementById('openModal').addEventListener('click', function () {
    document.getElementById('modalAgregar').classList.remove('hidden');
});

// Cerrar el modal
document.getElementById('closeModal').addEventListener('click', function () {
    document.getElementById('modalAgregar').classList.add('hidden');
});


function openModalEditAdmin(event) {
    // Obtén el valor del atributo data-userid del botón
    var userId = event.target.getAttribute("data-userid");

    // Asigna el valor al campo oculto UserID
    document.getElementById("UserID").value = userId;

    // Abre el modal de edición
    // ... tu código para abrir el modal aquí ...
}
