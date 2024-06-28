<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesandPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // Create permissions
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'edit organizations']);
        Permission::create(['name' => 'edit respondents']);
        Permission::create(['name' => 'edit admins']);
        Permission::create(['name'=> 'edit incidents']);
        //Permission::create(['name'=> '']);
        // Create roles and assign created permissions

        // Admin role
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('edit users');
        $admin->givePermissionTo('edit organizations');
        $admin->givePermissionTo('edit respondents');
        $admin->givePermissionTo('edit admins');
        $admin->givePermissionTo('edit incidents');

        // Editor role
        $editor = Role::create(['name' => 'organization head']);
        $editor->givePermissionTo('edit respondents');
        $editor->givePermissionTo('edit incidents');

        // Writer role
        $writer = Role::create(['name' => 'respondents']);
        $writer->givePermissionTo('edit incidents');
    }
}
