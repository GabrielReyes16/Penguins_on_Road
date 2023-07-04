const form = document.getElementById('reserva-form');
const mensaje = document.getElementById('mensaje');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    // Realizar una solicitud al controlador utilizando fetch o Axios
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => response.json())
    .then(data => {
        // Mostrar el mensaje de acuerdo a la respuesta del controlador
        if (data.message) {
            mensaje.textContent = data.message;
            if (data.message === 'Esta reserva ya ha sido utilizada.') {
                mensaje.classList.add('text-red-500');
            } else {
                mensaje.classList.add('text-green-500');
            }
        } else {
            mensaje.textContent = 'Ha ocurrido un error.';
            mensaje.classList.add('text-red-500');
        }
    })
    .catch(error => {
        mensaje.textContent = 'Ha ocurrido un error.';
        mensaje.classList.add('text-red-500');
    });

    setTimeout(function() {
        mensaje.textContent = '';  // Elimina el contenido del mensaje
        mensaje.classList.remove('text-red-500', 'text-green-500');  // Elimina las clases de estilo del mensaje
    }, 5000);
});