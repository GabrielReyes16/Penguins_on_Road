<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/de3d576e9f.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-4xl font-bold text-center mt-8">Seleccione un turno de ruta</h1>
        <div class="flex flex-col items-center mt-8">
            @foreach ($turnos as $turno)
                <a href="{{ route('ruta.turno', ['id' => $turno->id_turno]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-8 rounded mb-4 w-48">{{'Turno'}} {{ $turno->nombre }}</a>
            @endforeach
        </div>
        
    </div>
</body>

</html>