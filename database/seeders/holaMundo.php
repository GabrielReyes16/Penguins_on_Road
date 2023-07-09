<?php
namespace Database\Seeders;

use App\Models\BoletaViaje;
use App\Models\Bus;
use App\Models\Chofer;
use App\Models\Empresa;
use App\Models\Paradero;
use App\Models\Perfil;
use App\Models\Reserva;
use App\Models\Ruta;
use App\Models\Turno;
use App\Models\User;
use App\Models\Viaje;
use App\Models\ViajeGPS;
use Illuminate\Database\Seeder;

class holaMundo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// Crear perfiles
        $perfiles = [
            [
                'biografia' => null,
                'especialidad' => null,
                'enlaces' => null,
                'foto_perfil' => null,
            ],
            [
                'biografia' => null,
                'especialidad' => null,
                'enlaces' => null,
                'foto_perfil' => null,
            ],
            [
                'biografia' => null,
                'especialidad' => null,
                'enlaces' => null,
                'foto_perfil' => null,
            ],
            [
                'biografia' => null,
                'especialidad' => null,
                'enlaces' => null,
                'foto_perfil' => null,
            ],
            [
                'biografia' => null,
                'especialidad' => null,
                'enlaces' => null,
                'foto_perfil' => null,
            ],
            [
                'biografia' => null,
                'especialidad' => null,
                'enlaces' => null,
                'foto_perfil' => null,
            ],
        ];

        foreach ($perfiles as $perfilesData) {
            Perfil::create($perfilesData);
        }


        // Crear usuarios
        //Admins
        User::Create([
            'name' => 'Gabriel Reyes',
            'id_perfil' => 1,
            'email' => 'gabriel@example.com',
            'password' => bcrypt('gabrielreyes'),
        ])->assignRole('Administrador');
        User::Create([
            'name' => 'Harold Medrano',
            'id_perfil' => 2,
            'email' => 'harold@example.com',
            'password' => bcrypt('haroldmedrano'),
        ])->assignRole('Administrador');

        //Choferes
        User::Create([
            'name' => 'Adriana Hervias',
            'id_perfil' => 3,
            'email' => 'adri@example.com',
            'password' => bcrypt('adrihervias'),
        ])->assignRole('Chofer');
        User::Create([
            'name' => 'Adriana Palomino',
            'id_perfil' => 4,
            'email' => 'adriana@example.com',
            'password' => bcrypt('adripalomino'),
        ])->assignRole('Chofer');
        User::Create([
            'name' => 'Pedro Castillo',
            'email' => 'pedro@example.com',
            'password' => bcrypt('pedrocastillo'),
        ])->assignRole('Chofer');
        User::Create([
            'name' => 'Alan García',
            'email' => 'alan@example.com',
            'password' => bcrypt('alangarcia'),
        ])->assignRole('Chofer');
        User::Create([
            'name' => 'Paolo Guerrero',
            'email' => 'paolo@example.com',
            'password' => bcrypt('pguerrero'),
        ])->assignRole('Chofer');
        User::Create([
            'name' => 'Alejandro Toledo',
            'email' => 'alejandro@example.com',
            'password' => bcrypt('aletoledo'),
        ])->assignRole('Chofer');
        User::Create([
            'name' => 'Nicolas Maduro',
            'email' => 'nicolas@example.com',
            'password' => bcrypt('nicolasmaduro'),
        ])->assignRole('Chofer');
        User::Create([
            'name' => 'Dina Boluarte',
            'email' => 'dina@example.com',
            'password' => bcrypt('dinaboluarte'),
        ])->assignRole('Chofer');

        //Pasajeros
        User::Create([
            'name' => 'Rael Rivero',
            'id_perfil' => 5,
            'email' => 'rael@example.com',
            'password' => bcrypt('raelrivero'),
        ])->assignRole('Pasajero');
        User::Create([
            'name' => 'Marcelo Sanabria',
            'id_perfil' => 6,
            'email' => 'marcelo@example.com',
            'password' => bcrypt('marcelosanabria'),
        ])->assignRole('Pasajero');
        // Crear empresas
        $empresas = [
            [
                'RUC' => '1234567890',
                'nombre' => 'Paradox',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'RUC' => '0987654321',
                'nombre' => 'SafeTravel',
                'ubicacion' => 'Callao, Perú',
            ],
            [
                'RUC' => '1092387456',
                'nombre' => 'TuChofideconFianza',
                'ubicacion' => 'Arequipa, Perú',
            ],
        ];

        foreach ($empresas as $empresaData) {
            Empresa::create($empresaData);
        }

        // Crear turnos
        $turnos = [
            [
                'nombre' => 'Mañana',
                'hora_inicio' => '07:15:00',
            ],
            [
                'nombre' => 'Tarde',
                'hora_inicio' => '18:10:00',
            ],
            [
                'nombre' => 'Noche',
                'hora_inicio' => '22:20:00',
            ],
        ];

        foreach ($turnos as $turnoData) {
            Turno::create($turnoData);
        }

        // Crear rutas
        $rutas = [
            [
                'id_turno' => 1,
                // 'id_chofer' => 1,
                'punto_inicial' => 'AV. AVIACION - J. PRADO',
                'punto_final' => 'CAMPUS',
            ],
            [
                'id_turno' => 1,

                'punto_inicial' => 'PUENTE NUEVO - J. PRADO',
                'punto_final' => 'CAMPUS',
            ],
            [
                'id_turno' => 2,

                'punto_inicial' => 'CAMPUS',
                'punto_final' => 'AV. J. PRADO - OVALO LA PERLA',
            ],
            [
                'id_turno' => 2,

                'punto_inicial' => 'CAMPUS',
                'punto_final' => 'PUENTE NUEVO - MEGA PLAZA',
            ],
            [
                'id_turno' => 2,

                'punto_inicial' => 'CAMPUS',
                'punto_final' => 'CHACLACAYO',
            ],
            [
                'id_turno' => 2,
                'punto_inicial' => 'CAMPUS',
                'punto_final' => 'PUENTE ATOCONGO',
            ],
            [
                'id_turno' => 3,
                'punto_inicial' => 'CAMPUS',
                'punto_final' => 'AV. J. PRADO - PETIT THOUARS',
            ],
            [
                'id_turno' => 3,
                'punto_inicial' => 'CAMPUS',
                'punto_final' => 'CHACLACAYO',
            ],
        ];
        foreach ($rutas as $rutaData) {
            Ruta::create($rutaData);
        }

        // Crear paraderos
        $paraderos = [
            [
                'id_ruta' => 1,
                'nombre' => 'PARADERO INICIAL: ALTURA CINE STAR AVIACIÓN (A UNA CUADRA DE AV. J. PRADO)',
                'latitud' => -12.08903, 'longitud' => -77.00312,
            ],
            [
                'id_ruta' => 1,
                'nombre' => 'PARADERO: Av. Javier Prado con la Ca. Velasquez (a 1 cdra. de San Luis)',
                'latitud' => -12.08748, 'longitud' => -76.99789,
            ],
            [
                'id_ruta' => 1,
                'nombre' => 'CAMPUS',
                'latitud' => -12.04543, 'longitud' => -76.95219,
            ],

            [
                'id_ruta' => 2,
                'nombre' => 'PARADERO INICIAL: PUENTE NUEVO (ALTURA GRIFO REPSOL)',
                'latitud' => -12.02999, 'longitud' => -76.99905,
            ],
            [
                'id_ruta' => 2,
                'nombre' => 'CAMPUS',
                'latitud' => -12.04543, 'longitud' => -76.95219,
            ],

            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. FRUTALES CON AV. JAVIER PRADO',
                'latitud' => -12.07543, 'longitud' => -76.96378,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO U. DE LIMA (J. PRADO) POR LA VIA AUXILIAR',
                'latitud' => -12.08336, 'longitud' => -76.97123,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. AGUSTIN DE LA ROSA TORO',
                'latitud' => -12.08636, 'longitud' => -76.99252,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. SAN LUIS',
                'latitud' => -12.08651, 'longitud' => -76.99645,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. AVIACION',
                'latitud' => -12.08742, 'longitud' => -77.00322,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO RICARDO PALMA (J. PRADO)',
                'latitud' => -12.09002, 'longitud' => -77.01789,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON CALLE LAS ORQUIDEAS (ANTES DE LA CLINICA J. PRADO)',
                'latitud' => -12.09142, 'longitud' => -77.02803,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON AV. PETIT THOUARS',
                'latitud' => -12.09204, 'longitud' => -77.03210,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON AV. LAS PALMERAS',
                'latitud' => -12.09292, 'longitud' => -77.03855,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON AV. LOS ALAMOS',
                'latitud' => -12.09338, 'longitud' => -77.04188,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON AV. LAS FLORES',
                'latitud' => -12.09414, 'longitud' => -77.04722,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON CALLE ROMA (ANTES DE SALAVERRY)',
                'latitud' => -12.09345, 'longitud' => -77.05245,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO SAN FELIPE (AV. GREGORIO ESCOBEDO CON AV. SANCHEZ CARRION)',
                'latitud' => -12.09017, 'longitud' => -77.05740,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. LA MARINA CON AV. SUCRE',
                'latitud' => -12.08309, 'longitud' => -77.06695,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. LA MARINA CON AV. UNIVERSITARIA',
                'latitud' => -12.07822, 'longitud' => -77.08081,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. LA MARINA CON AV. RAFAEL ESCARDO (HIRAOKA)',
                'latitud' => -12.07748, 'longitud' => -77.09292,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. LA MARINA CON AV. FAUCETT',
                'latitud' => -12.07457, 'longitud' => -77.09907,
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO OV. LA PERLA',
                'latitud' => -12.06564, 'longitud' => -77.11861,
            ],

            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO LOS FICUS',
                'latitud' => -12.05395, 'longitud' => -76.97521,
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO PUENTE NUEVO',
                'latitud' => -12.02948, 'longitud' => -76.99909,
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO PUENTE TRUJILLO',
                'latitud' => -12.04148, 'longitud' => -77.03238,
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO CAQUETA',
                'latitud' => -12.03634, 'longitud' => -77.04366,
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO HABICH',
                'latitud' => -12.03007, 'longitud' => -77.05693,
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO 2DA. DE PALAO',
                'latitud' => -12.01858, 'longitud' => -77.05945,
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO JARDINES',
                'latitud' => -12.01464, 'longitud' => -77.05974,
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO PLAZA NORTE',
                'latitud' => -12.00695, 'longitud' => -77.06140,
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO MEGA PLAZA',
                'latitud' => -11.99441, 'longitud' => -77.06315,
            ],

            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO HUACHIPA',
                'latitud' => -12.01820, 'longitud' => -76.89581,
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO SANTA CLARA (COSTADO REAL PLAZA)',
                'latitud' => -12.01476, 'longitud' => -76.88549,
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO HORACIO',
                'latitud' => -12.00484, 'longitud' => -76.84466,
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO HUAYCAN',
                'latitud' => -11.99718, 'longitud' => -76.83543,
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO ÑAÑA',
                'latitud' => -11.98948, 'longitud' => -76.81870,
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO EL CUADRO',
                'latitud' => -11.98210, 'longitud' => -76.79724,
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO LOS ALAMOS',
                'latitud' => -11.97727, 'longitud' => -76.77585,
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO PLAZA CHACLACAYO',
                'latitud' => -11.97574, 'longitud' => -76.77040,
            ],

            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO EVITAMIENTO (TREBOL)',
                'latitud' => -12.08216, 'longitud' => -76.97951,
            ],
            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO PTE. PRIMAVERA',
                'latitud' =>-12.11151, 'longitud' => -76.97795,
            ],
            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO PROSEGUR',
                'latitud' => -12.12686, 'longitud' => -76.97716,
            ],
            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO PTE. BENAVIDES (ABAJO)',
                'latitud' => -12.13354, 'longitud' => -76.97917,
            ],
            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO TOTTUS (MALL ATOCONGO)',
                'latitud' => -12.14694, 'longitud' => -76.98238,
            ],
            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO PTE. ATOCONGO (ABAJO)',
                'latitud' => -12.14956, 'longitud' => -76.98334,
            ],

            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. FRUTALES CON AV. JAVIER PRADO',
                'latitud' => -12.07543, 'longitud' => -76.96378,
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO U. DE LIMA (J. PRADO) POR LA VIA AUXILIAR',
                'latitud' => -12.08336, 'longitud' => -76.97123,
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. AGUSTIN DE LA ROSA TORO',
                'latitud' => -12.08636, 'longitud' => -76.99252,
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. SAN LUIS',
                'latitud' => -12.08651, 'longitud' => -76.99645,
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. AVIACION',
                'latitud' => -12.08742, 'longitud' => -77.00322,
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO RICARDO PALMA (J. PRADO)',
                'latitud' => -12.09002, 'longitud' => -77.01789,
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. J. PRADO CON CALLE LAS ORQUIDEAS (ANTES DE LA CLINICA J. PRADO)',
                'latitud' => -12.09142, 'longitud' => -77.02803,
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. J. PRADO CON AV. PETIT THOUARS',
                'latitud' => -12.09204, 'longitud' => -77.03210,
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO HUACHIPA',
                'latitud' => -12.01820, 'longitud' => -76.89581,
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO SANTA CLARA (COSTADO REAL PLAZA)',
                'latitud' => -12.01476, 'longitud' => -76.88549,
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO HORACIO',
                'latitud' => -12.00484, 'longitud' => -76.84466,
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO HUAYCAN',
                'latitud' => -11.99718, 'longitud' => -76.83543,
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO ÑAÑA',
                'latitud' => -11.98948, 'longitud' => -76.81870,
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO EL CUADRO',
                'latitud' => -11.98210, 'longitud' => -76.79724,
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO LOS ALAMOS',
                'latitud' => -11.97727, 'longitud' => -76.77585,
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO PLAZA CHACLACAYO',
                'latitud' => -11.97574, 'longitud' => -76.77040,
            ],

        ];

        foreach ($paraderos as $paraderoData) {
            Paradero::create($paraderoData);
        }

        // Crear buses
            // Generar 8 registros de buses
        for ($i = 1; $i <= 8; $i++) {
        $bus = [
            'placa' => 'BUS' . $i,
            'aforo' => rand(50, 60),
            'id_empresa' => rand(1,3),
        ];

        $buses[] = $bus;
        }

        // Insertar los registros en la base de datos
        foreach ($buses as $bus) {
        Bus::create($bus);
        }

        

        // Crear choferes
        $choferes = [
            [
                'id_usuario' => 3,
                'id_bus' => 1,
                'id_empresa' => 1,
                'licencia_conducir' => '1234561',
                'estado' => 'Activo',
            ],
            [
                'id_usuario' => 4,
                'id_bus' => 2,
                'id_empresa' => 1,
                'licencia_conducir' => '6543219',
                'estado' => 'Inactivo',
            ],
            [
                'id_usuario' => 5,
                'id_bus' => 3,
                'id_empresa' => 1,
                'licencia_conducir' => '1238456',
                'estado' => 'Activo',
            ],
            [
                'id_usuario' => 6,
                'id_bus' => 4,
                'id_empresa' => 1,
                'licencia_conducir' => '6543621',
                'estado' => 'Activo',
            ],[
                'id_usuario' => 7,
                'id_bus' => 5,
                'id_empresa' => 1,
                'licencia_conducir' => '1234556',
            ],
            [
                'id_usuario' => 8,
                'id_bus' => 6,
                'id_empresa' => 1,
                'licencia_conducir' => '6543214',
                'estado' => 'Inactivo',
            ],[
                'id_usuario' => 9,
                'id_bus' => 7,
                'id_empresa' => 1,
                'licencia_conducir' => '1234563',
                'estado' => 'Activo',
            ],
            [
                'id_usuario' => 10,
                'id_bus' => 8,
                'id_empresa' => 1,
                'licencia_conducir' => '6543212',
                'estado' => 'Inactivo',
            ],
        ];

        foreach ($choferes as $choferData) {
            Chofer::create($choferData);
        }

        // Crear viajes
        $viajes = [
            [
                'id_ruta' => 1,
                'id_bus' => 1,
                'id_chofer' => 1,
                'fecha_viaje' => '2023-01-01',
                'hora_inicio' => '08:00:00',
                'hora_final' => '10:00:00',
                'estado' => 'Activo',
                'aforo_actual' => 30,
            ],
            [
                'id_ruta' => 2,
                'id_bus' => 2,
                'id_chofer' => 2,
                'fecha_viaje' => '2023-01-02',
                'hora_inicio' => '14:00:00',
                'hora_final' => '16:00:00',
                'estado' => 'Activo',
                'aforo_actual' => 20,
            ],
            [
                'id_ruta' => 3,
                'id_bus' => 3,
                'id_chofer' => 3,
                'fecha_viaje' => '2023-01-01',
                'hora_inicio' => '08:00:00',
                'hora_final' => '10:00:00',
                'estado' => 'Activo',
                'aforo_actual' => 30,
            ],
            [
                'id_ruta' => 4,
                'id_bus' => 4,
                'id_chofer' => 4,
                'fecha_viaje' => '2023-01-02',
                'hora_inicio' => '14:00:00',
                'hora_final' => '16:00:00',
                'estado' => 'Activo',
                'aforo_actual' => 20,
            ],
            [
                'id_ruta' => 5,
                'id_bus' => 5,
                'id_chofer' => 5,
                'fecha_viaje' => '2023-01-01',
                'hora_inicio' => '08:00:00',
                'hora_final' => '10:00:00',
                'estado' => 'Activo',
                'aforo_actual' => 30,
            ],
            [
                'id_ruta' => 6,
                'id_bus' => 6,
                'id_chofer' => 6,
                'fecha_viaje' => '2023-01-02',
                'hora_inicio' => '14:00:00',
                'hora_final' => '16:00:00',
                'estado' => 'Activo',
                'aforo_actual' => 20,
            ],
            [
                'id_ruta' => 7,
                'id_bus' => 7,
                'id_chofer' => 7,
                'fecha_viaje' => '2023-01-01',
                'hora_inicio' => '08:00:00',
                'hora_final' => '10:00:00',
                'estado' => 'Activo',
                'aforo_actual' => 30,
            ],
            [
                'id_ruta' => 8,
                'id_bus' => 8,
                'id_chofer' => 8,
                'fecha_viaje' => '2023-01-02',
                'hora_inicio' => '14:00:00',
                'hora_final' => '16:00:00',
                'estado' => 'Activo',
                'aforo_actual' => 20,
            ],
        ];

        foreach ($viajes as $viajeData) {
            Viaje::create($viajeData);
        }

        // // Crear viajes_gps
        // $viajesGPS = [
        //     [
        //         'id_viaje' => 1,
        //         'posicion_x' => '12.345',
        //         'posicion_y' => '67.890',
        //         'hora_posicion' => '08:30:00',
        //     ],
        //     [
        //         'id_viaje' => 2,
        //         'posicion_x' => '98.765',
        //         'posicion_y' => '43.210',
        //         'hora_posicion' => '15:30:00',
        //     ],
        // ];

        // foreach ($viajesGPS as $viajeGPSData) {
        //     ViajeGPS::create($viajeGPSData);
        // }

        //Crear reservas
        $reservas = [
            [
                'id_usuario' => 6,
                'id_viaje' => 1,
                'fecha_reserva' => '2023-07-03',
                'codigoDeAcceso' => 'ABCDE12345',
                'codigo_qr' => 'ABC123',
            ],
            [
                'id_usuario' => 7,
                'id_viaje' => 2,
                'fecha_reserva' => '2023-07-03',
                'codigoDeAcceso' => 'ABCDE54321',
                'codigo_qr' => 'XYZ987',
            ],
        ];

        foreach ($reservas as $reservaData) {
            Reserva::create($reservaData);
        }

        // Crear boletas_viaje
        $boletasViaje = [
            [
                'id_usuario_pasajero' => 6,
                'id_viaje' => 1,
                'id_reserva' => 1,
                'fecha_viaje' => '2023-01-01',
                'hora_abordaje' => '07:30:00',
                'aforo_viaje' => 1,
            ],
            [
                'id_usuario_pasajero' => 5,
                'id_viaje' => 2,
                'id_reserva' => 2,
                'fecha_viaje' => '2023-01-02',
                'hora_abordaje' => '13:30:00',
                'aforo_viaje' => 1,
            ],
        ];

        foreach ($boletasViaje as $boletaViajeData) {
            BoletaViaje::create($boletaViajeData);
        }
  

    }
}
