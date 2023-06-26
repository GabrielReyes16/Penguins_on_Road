<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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
