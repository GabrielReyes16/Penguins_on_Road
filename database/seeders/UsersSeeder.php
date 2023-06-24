<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $letrasIniciales = ['P', 'C', 'A'];
        for ($i = 0; $i < 50; $i++) {
            $letraInicial = $letrasIniciales[array_rand($letrasIniciales)];
            $digitos = mt_rand(10000, 99999);
            $ID = $letraInicial . $digitos;
            // Verificar si el nuevo ID está en uso
            $existingUser = User::where('id', $ID)->first();

            while ($existingUser) {
                $letraInicial = $letrasIniciales[array_rand($letrasIniciales)];
                $digitos = mt_rand(10000, 99999);
                $ID = $letraInicial . $digitos;
            // Verificar si el nuevo ID está en uso
            $existingUser = User::where('id', $ID)->first();
}

            User::create([
                'id' => $ID,
                'nombres' => "usuario$i",
                'apellidos' => "apellido$i",
                'email' => "email$i@test.com",
                'password' => Hash::make("pass$i")
            ]);
        }
    }
}