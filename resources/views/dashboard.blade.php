<x-app-layout>
    <div class="container-dash">
        <h1>Bienvenido, <span id="admin-name">{{ Auth::user()->name }}</span></h1>
        <p>Hora actual: <span id="current-time"></span></p>

        <div id="chart-container" style="height: ">
            <canvas id="chart"></canvas>
        </div>
    </div>

    <!-- Agrega los enlaces a los archivos JavaScript y librerías necesarios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script>
        // Código JavaScript para obtener la hora actual y mostrarla en el elemento con id "current-time"
        var currentTimeElement = document.getElementById('current-time');
        var currentTime = new Date().toLocaleTimeString();
        currentTimeElement.textContent = currentTime;

        // Código JavaScript para obtener la información del clima y mostrarla en el elemento con id "weather-info"
        var weatherInfoElement = document.getElementById('weather-info');
        // ... Agrega aquí tu código para obtener y mostrar la información del clima ...

        // Código JavaScript para generar la gráfica con la cantidad de registros en las tablas de la base de datos
        // Utiliza la librería Chart.js para generar la gráfica
        var chartElement = document.getElementById('chart');

        // Consultas SQL para obtener la cantidad de registros en cada tabla
        var usersCount = {{ App\Models\User::count() }};
        var choferesCount = {{ App\Models\Chofer::count() }};
        var busesCount = {{ App\Models\Bus::count() }};
        var viajesCount = {{ App\Models\Viaje::count() }};

        var chartData = {
            labels: ['Users', 'Choferes', 'Buses', 'Viajes'],
            datasets: [{
                label: 'Cantidad de Registros',
                data: [usersCount, choferesCount, busesCount, viajesCount],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        };
        var chartOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };
        var chart = new Chart(chartElement, {
            type: 'bar',
            data: chartData,
            options: chartOptions
        });
    </script>
</x-app-layout>
