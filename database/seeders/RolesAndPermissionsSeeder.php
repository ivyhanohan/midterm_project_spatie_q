<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataEntry = Role::create(['name' => 'Data Entry']);
        $admin = Role::create(['name' => 'Administrator']);

        // Assign permissions
        Permission::create(['name' => 'create tasks']);
        Permission::create(['name' => 'edit tasks']);
        Permission::create(['name' => 'delete tasks']);

        // Assign permissions to roles
        $dataEntry->givePermissionTo('create tasks');
        $admin->givePermissionTo(['create tasks', 'edit tasks', 'delete tasks']);
}
}
