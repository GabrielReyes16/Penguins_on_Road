<?php
//Pendiente de corregir el tipo de dato del id
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = ['A', 'C', 'P'];


        for ($i = 1; $i <= 80; $i++) {
            $rol = Arr::random($roles);
             User::create([
                'name' => 'User '.$i,
                'email' => 'user'.$i.'@example.com',
                'password' => Hash::make('password'.$i),
                'rol' => $rol
            ]);
        }
    }
}