@extends ('usuario-chofer.navbar-boletas')

@section ('titulo')
    {{ 'Menu || Scaner' }}
@stop

@section ('css-personalizado')
    <link rel="stylesheet" href="{{ asset ('css/Passenger/style-bus.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/de3d576e9f.js" crossorigin="anonymous"></script>
@stop

@section ('contenido')

<div class="bg-white p-6">
    <h2 class="text-2xl font-bold mb-4">Crear Viaje</h2>

    <form action="{{ route('viaje.guardar') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="border border-gray-300 rounded-lg p-2">
        </div>

        <div>
            <label for="ruta">Ruta:</label>
            <input type="text" name="ruta" id="ruta" class="border border-gray-300 rounded-lg p-2">
        </div>

        <div>
            <label for="hora_inicio">Hora de inicio:</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="border border-gray-300 rounded-lg p-2">
        </div>

        <div>
            <label for="hora_final">Hora de finalización:</label>
            <input type="time" name="hora_final" id="hora_final" class="border border-gray-300 rounded-lg p-2">
        </div>

        <div>
            <label for="estado">Estado:</label>
            <select name="estado" id="estado" class="border border-gray-300 rounded-lg p-2">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </div>
    </form>
</div>
<script>
    function actualizarEstadoViaje(idViaje, estado) {
        // Realizar una solicitud AJAX para actualizar el estado del viaje
        axios.put('/viajes/' + idViaje + '/estado', { estado: estado })
            .then(response => {
                // Manejar la respuesta exitosa del servidor
                console.log(response.data);
            })
            .catch(error => {
                // Manejar el error de la solicitud AJAX
                console.log(error);
            });
    }
</script>

@stop