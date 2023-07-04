<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// Creación del rol
$rol_pasajero = Role::create(['name' => 'Pasajero']);