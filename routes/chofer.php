<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// Creación del rol
$rol_chofer = Role::create(['name' => 'Chofer']);