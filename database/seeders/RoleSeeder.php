<?php

namespace Database\Seeders;

use App\Models\Chofer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol_admin = Role::create(['name' => 'Administrador']);
        $rol_chofer = Role::create(['name' => 'Chofer']);
        $rol_pasajero = Role::create(['name' => 'Pasajero']);

        // Rol de Admin
        Permission::create(['name' => 'admin.dashboard'])->syncRoles($rol_admin);

        Permission::create(['name' => 'admin.users.index'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.users.create'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.users.show'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles($rol_admin);

        Permission::create(['name' => 'admin.buses.index'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.buses.create'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.buses.show'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.buses.edit'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.buses.destroy'])->syncRoles($rol_admin);

        Permission::create(['name' => 'admin.choferes.index'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.choferes.create'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.choferes.edit'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.choferes.destroy'])->syncRoles($rol_admin);

        Permission::create(['name' => 'admin.boletas_viaje.index'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.boletas_viaje.create'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.boletas_viaje.edit'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.boletas_viaje.destroy'])->syncRoles($rol_admin);

        Permission::create(['name' => 'admin.rutas.index'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.rutas.create'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.rutas.edit'])->syncRoles($rol_admin);
        Permission::create(['name' => 'admin.rutas.destroy'])->syncRoles($rol_admin);

        Permission::create(['name' => 'admin.viajes.index'])->syncRoles($rol_admin);

        // Rol de Chofer
     


        // Rol de Pasajero
    }
}
