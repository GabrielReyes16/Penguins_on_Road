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
        for ($i = 0; $i < 50; $i++) {
            $letraInicial = Str::randomElement(['P', 'C', 'A']);
            $digitos = Str::random(5, '0123456789');
            $ID = $letraInicial . $digitos;
            // Verificar si el nuevo ID está en uso
            $existingUser = User::where('ID', $ID)->first();

            while ($existingUser) {
            $letraInicial = Str::randomElement(['P', 'C', 'A']);
            $digitos = Str::random(5, '0123456789');
            $ID = $letraInicial . $digitos;
            // Verificar si el nuevo ID está en uso
            $existingUser = User::where('ID', $ID)->first();
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