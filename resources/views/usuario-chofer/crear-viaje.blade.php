@extends('usuario-chofer.navbar-boletas')

@section('titulo', 'Menu || Scanner')

@section('css-personalizado')
    <link rel="stylesheet" href="{{ asset('css/Passenger/style-bus.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/de3d576e9f.js" crossorigin="anonymous"></script>
@stop

@section('contenido')
    <div class="max-w-xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Crear Viaje</h1>

        <form action="{{ route('usuario-chofer.guardar-viaje') }}" method="POST">
            @csrf

            <!-- Campos del formulario -->
            <div class="mb-4">
                <label for="id_ruta" class="block font-medium text-gray-700">ID de Ruta:</label>
                <input type="text" name="id_ruta" id="id_ruta" class="border border-gray-300 rounded-md p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label for="id_bus" class="block font-medium text-gray-700">ID de Bus:</label>
                <input type="text" name="id_bus" id="id_bus" class="border border-gray-300 rounded-md p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label for="id_chofer" class="block font-medium text-gray-700">ID de Chofer:</label>
                <input type="text" name="id_chofer" id="id_chofer" class="border border-gray-300 rounded-md p-2 w-full" required>
            </div>


            <div class="mb-4">
                <label for="hora_inicio" class="block font-medium text-gray-700">Hora de Inicio:</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="border border-gray-300 rounded-md p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label for="hora_final" class="block font-medium text-gray-700">Hora de Finalización:</label>
                <input type="time" name="hora_final" id="hora_final" class="border border-gray-300 rounded-md p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="hora_final" class="block font-medium text-gray-700">Estado:</label>
                <select name="" id="">
                    <option value="">Activo</option>
                    <option value="">En curso</option>
                    <option value="">Inactivo</option>
                </select>
            </div>
            <!-- Botón de enviar -->
            <div class="text-right">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Crear Viaje
                </button>
            </div>
        </form>
    </div>
@stop
