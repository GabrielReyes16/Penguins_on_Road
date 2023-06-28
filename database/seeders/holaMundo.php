<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perfil;
use App\Models\User;
use App\Models\Chofer;
use App\Models\Turno;
use App\Models\Ruta;
use App\Models\Empresa;
use App\Models\Bus;
use App\Models\Viaje;
use App\Models\Paradero;
use App\Models\ViajeGps;
use App\Models\BoletaViaje;

class holaMundo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Crear perfiles
        Perfil::create([
            'nombre' => 'Perfil 1',
            'apellidos' => 'Apellidos 1',
            'biografia' => 'Biografía 1',
            'especialidad' => 'Especialidad 1',
            'enlaces' => 'Enlaces 1',
            'foto_perfil' => 'foto1.jpg',
        ]);

        Perfil::create([
            'nombre' => 'Perfil 2',
            'apellidos' => 'Apellidos 2',
            'biografia' => 'Biografía 2',
            'especialidad' => 'Especialidad 2',
            'enlaces' => 'Enlaces 2',
            'foto_perfil' => 'foto2.jpg',
        ]);

        // Crear usuarios
        User::create([
            'name' => 'Usuario 1',
            'email' => 'usuario1@example.com',
            'password' => bcrypt('password1'),
            'rol' => 'rol1',
            'id_perfil' => 1,
        ]);

        User::create([
            'name' => 'Usuario 2',
            'email' => 'usuario2@example.com',
            'password' => bcrypt('password2'),
            'rol' => 'rol2',
            'id_perfil' => 2,
        ]);

        // Crear choferes
        Chofer::create([
            'id_usuario' => 1,
            'licencia_conducir' => 'ABC123456',
        ]);

        Chofer::create([
            'id_usuario' => 2,
            'licencia_conducir' => 'XYZ987654',
        ]);

        // Crear turnos
        Turno::create([
            'nombre' => 'Turno 1',
            'hora_inicio' => '08:00:00',
        ]);

        Turno::create([
            'nombre' => 'Turno 2',
            'hora_inicio' => '16:00:00',
        ]);

        // Crear rutas
        Ruta::create([
            'id_turno' => 1,
            'punto_inicial' => 'Punto Inicial 1',
            'punto_final' => 'Punto Final 1',
        ]);

        Ruta::create([
            'id_turno' => 2,
            'punto_inicial' => 'Punto Inicial 2',
            'punto_final' => 'Punto Final 2',
        ]);

        // Crear empresas
        Empresa::create([
            'RUC' => '123456789',
            'nombre' => 'Empresa 1',
            'ubicacion' => 'Ubicación 1',
        ]);

        Empresa::create([
            'RUC' => '987654321',
            'nombre' => 'Empresa 2',
            'ubicacion' => 'Ubicación 2',
        ]);

        // Crear buses
        Bus::create([
            'placa' => 'ABC123',
            'aforo' => 50,
            'id_empresa' => 1,
            'id_chofer' => 1,
        ]);

        Bus::create([
            'placa' => 'XYZ987',
            'aforo' => 40,
            'id_empresa' => 2,
            'id_chofer' => 2,
        ]);

        // Crear viajes
        Viaje::create([
            'id_ruta' => 1,
            'id_bus' => 1,
            'fecha_viaje' => '2023-06-01',
            'hora_inicio' => '09:00:00',
            'hora_final' => '11:00:00',
            'estado' => 'Activo',
            'aforo' => 30,
        ]);

        Viaje::create([
            'id_ruta' => 2,
            'id_bus' => 2,
            'fecha_viaje' => '2023-06-02',
            'hora_inicio' => '17:00:00',
            'hora_final' => '19:00:00',
            'estado' => 'Activo',
            'aforo' => 25,
        ]);

        // Crear paraderos
        Paradero::create([
            'id_ruta' => 1,
            'nombre' => 'Paradero 1',
            'ubicacion' => 'Ubicación 1',
        ]);

        Paradero::create([
            'id_ruta' => 2,
            'nombre' => 'Paradero 2',
            'ubicacion' => 'Ubicación 2',
        ]);

        // Crear viajes GPS
        ViajeGps::create([
            'id_viaje' => 1,
            'posicion_x' => '123.456',
            'posicion_y' => '987.654',
            'hora_posicion' => '10:00:00',
        ]);

        ViajeGps::create([
            'id_viaje' => 2,
            'posicion_x' => '789.123',
            'posicion_y' => '456.321',
            'hora_posicion' => '18:00:00',
        ]);

        // Crear boletas de viaje
        BoletaViaje::create([
            'id_usuario_pasajero' => 1,
            'id_usuario_chofer' => 2,
            'id_viaje' => 1,
            'fecha_viaje' => '2023-06-01',
            'hora_abordaje' => '08:45:00',
            'aforo_viaje' => 28,
        ]);

        BoletaViaje::create([
            'id_usuario_pasajero' => 2,
            'id_usuario_chofer' => 1,
            'id_viaje' => 2,
            'fecha_viaje' => '2023-06-02',
            'hora_abordaje' => '16:30:00',
            'aforo_viaje' => 23,
        ]);
    }
}
