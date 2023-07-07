<?php
namespace Database\Seeders;

use App\Models\Perfil;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Turno;
use App\Models\Ruta;
use App\Models\Bus;
use App\Models\Chofer;
use App\Models\User;
use App\Models\Viaje;
use App\Models\Paradero;
use App\Models\ViajeGPS;
use App\Models\BoletaViaje;
use App\Models\Reserva;

class holaMundo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear empresas
        $empresas = [
            [
                'RUC' => '1234567890',
                'nombre' => 'Empresa 1',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'RUC' => '0987654321',
                'nombre' => 'Empresa 2',
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
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 1,
                'nombre' => 'PARADERO: Av. Javier Prado con la Ca. Velasquez (a 1 cdra. de San Luis)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 1,
                'nombre' => 'CAMPUS',
                'ubicacion' => 'Lima, Perú',
            ],

            [
                'id_ruta' => 2,
                'nombre' => 'PARADERO INICIAL: PUENTE NUEVO (ALTURA GRIFO REPSOL)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 2,
                'nombre' => 'CAMPUS',
                'ubicacion' => 'Lima, Perú',
            ],

            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. FRUTALES CON AV. JAVIER PRADO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO U. DE LIMA (J. PRADO) POR LA VIA AUXILIAR',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. AGUSTIN DE LA ROSA TORO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. SAN LUIS',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. AVIACION',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO RICARDO PALMA (J. PRADO)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON CALLE LAS ORQUIDEAS (ANTES DE LA CLINICA J. PRADO)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON AV. PETIT THOUARS',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON AV. LAS PALMERAS',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON AV. LOS ALAMOS',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON AV. LAS FLORES',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. J. PRADO CON CALLE ROMA (ANTES DE SALAVERRY)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO SAN FELIPE (AV. GREGORIO ESCOBEDO CON AV. SANCHEZ CARRION)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. LA MARINA CON AV. SUCRE',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. LA MARINA CON AV. UNIVERSITARIA',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. LA MARINA CON AV. RAFAEL ESCARDO (HIRAOKA)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO AV. LA MARINA CON AV. FAUCETT',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 3,
                'nombre' => 'PARADERO OV. LA PERLA',
                'ubicacion' => 'Lima, Perú',
            ],

            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO LOS FICUS',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO PUENTE NUEVO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO PUENTE TRUJILLO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO CAQUETA',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO HABICH',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO 2DA. DE PALAO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO JARDINES',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO PLAZA NORTE',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 4,
                'nombre' => 'PARADERO MEGA PLAZA',
                'ubicacion' => 'Lima, Perú',
            ],


            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO HUACHIPA',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO SANTA CLARA (COSTADO REAL PLAZA)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO HORACIO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO HUAYCAN',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO ÑAÑA',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO EL CUADRO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO LOS ALAMOS',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 5,
                'nombre' => 'PARADERO PLAZA CHACLACAYO',
                'ubicacion' => 'Lima, Perú',
            ],


            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO EVITAMIENTO (TREBOL)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO PTE. PRIMAVERA',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO PROSEGUR',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO PTE. BENAVIDES (ABAJO)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO TOTTUS (MALL ATOCONGO)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 6,
                'nombre' => 'PARADERO PTE. ATOCONGO (ABAJO)',
                'ubicacion' => 'Lima, Perú',
            ],



            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. FRUTALES CON AV. JAVIER PRADO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO U. DE LIMA (J. PRADO) POR LA VIA AUXILIAR',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. AGUSTIN DE LA ROSA TORO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. SAN LUIS',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. JAVIER PRADO CON AV. AVIACION',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO RICARDO PALMA (J. PRADO)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. J. PRADO CON CALLE LAS ORQUIDEAS (ANTES DE LA CLINICA J. PRADO)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 7,
                'nombre' => 'PARADERO AV. J. PRADO CON AV. PETIT THOUARS',
                'ubicacion' => 'Lima, Perú',
            ],





            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO HUACHIPA',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO SANTA CLARA (COSTADO REAL PLAZA)',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO HORACIO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO HUAYCAN',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO ÑAÑA',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO EL CUADRO',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO LOS ALAMOS',
                'ubicacion' => 'Lima, Perú',
            ],
            [
                'id_ruta' => 8,
                'nombre' => 'PARADERO PLAZA CHACLACAYO',
                'ubicacion' => 'Lima, Perú',
            ],

        ];

        foreach ($paraderos as $paraderoData) {
            Paradero::create($paraderoData);
        }


        // Crear buses
        $buses = [
            [
                'placa' => 'ABC123',
                'aforo' => 50,
                'id_empresa' => 1,
            ],
            [
                'placa' => 'XYZ987',
                'aforo' => 40,
                'id_empresa' => 2,
            ],
        ];

        foreach ($buses as $busData) {
            Bus::create($busData);
        }
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

        // Crear choferes
        $choferes = [
            [
                'id_usuario' => 1,
                'id_bus' => 1,
                'id_empresa' => 1,
                'licencia_conducir' => '123456',
            ],
            [
                'id_usuario' => 2,
                'id_bus' => 2,
                'id_empresa' => 2,
                'licencia_conducir' => '654321',
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
                'id_chofer' => 2,
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
        ];

        foreach ($viajes as $viajeData) {
            Viaje::create($viajeData);
        }

        // Crear viajes_gps
        $viajesGPS = [
            [
                'id_viaje' => 1,
                'posicion_x' => '12.345',
                'posicion_y' => '67.890',
                'hora_posicion' => '08:30:00',
            ],
            [
                'id_viaje' => 2,
                'posicion_x' => '98.765',
                'posicion_y' => '43.210',
                'hora_posicion' => '15:30:00',
            ],
        ];

        foreach ($viajesGPS as $viajeGPSData) {
            ViajeGPS::create($viajeGPSData);
        }

        $reservas = [
            [
                'id_usuario' => 1,
                'id_viaje' => 1,
                'fecha_reserva' => '2023-07-03',
                'codigoDeAcceso' => 'ABCDE12345',
                'codigo_qr' => 'ABC123',
            ],
            [
                'id_usuario' => 2,
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
                'id_usuario_pasajero' => 1,
                'id_viaje' => 1,
                'id_reserva' => 1,
                'fecha_viaje' => '2023-01-01',
                'hora_abordaje' => '07:30:00',
                'aforo_viaje' => 1,
            ],
            [
                'id_usuario_pasajero' => 2,
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

        // Crear reservas
        
    }
}
