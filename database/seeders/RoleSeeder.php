<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        $administrador = Role::create(['name' => 'Administrador']);

        //Assing permissions
        $administrador->givePermissionTo(
            Permission::all()->pluck('name')->toArray()
        );
    }
}
