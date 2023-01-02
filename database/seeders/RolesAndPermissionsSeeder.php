<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);
        $user = Role::create(['name' => 'user']);
        
        Permission::create(['name' => 'create users'])->assignRole($admin);
        Permission::create(['name' => 'edit users'])->assignRole($admin);
        Permission::create(['name' => 'delete users'])->assignRole($admin);
        Permission::create(['name' => 'view users'])->assignRole($admin, $manager);

        Permission::create(['name' => 'create clients'])->assignRole($admin, $manager);
        Permission::create(['name' => 'edit clients'])->assignRole($admin, $manager);
        Permission::create(['name' => 'delete clients'])->assignRole($admin);
        Permission::create(['name' => 'view clients'])->assignRole($admin, $manager);

        Permission::create(['name' => 'create teams'])->assignRole($admin, $manager);
        Permission::create(['name' => 'edit teams'])->assignRole($admin, $manager);
        Permission::create(['name' => 'delete teams'])->assignRole($admin);
        Permission::create(['name' => 'view teams'])->assignRole($admin, $manager);

        Permission::create(['name' => 'create projects'])->assignRole($admin, $manager);
        Permission::create(['name' => 'edit projects'])->assignRole($admin, $manager);
        Permission::create(['name' => 'delete projects'])->assignRole($admin);
        Permission::create(['name' => 'view projects'])->assignRole($admin, $manager);

        Permission::create(['name' => 'create tasks'])->assignRole($admin, $manager);
        Permission::create(['name' => 'edit tasks'])->assignRole($admin, $manager);
        Permission::create(['name' => 'delete tasks'])->assignRole($admin);
        Permission::create(['name' => 'view tasks'])->assignRole($admin, $manager, $user);
    }
}
