<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'usuarios']);
        Permission::create(['name' => 'roles']);
        Permission::create(['name' => 'permisos']);
        Permission::create(['name' => 'estudiantes']);
        Permission::create(['name' => 'materias']);
        Permission::create(['name' => 'calificaciones']);

    }
}
