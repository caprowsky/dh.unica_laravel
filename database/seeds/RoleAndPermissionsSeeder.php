<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        
        // Utentis
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'add users']);
        
        // tabellas
        Permission::create(['name' => 'edit rows']);
        Permission::create(['name' => 'delete rows']);
        Permission::create(['name' => 'add rows']);

        // create roles and assign created permissions


        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo(['edit rows', 'delete rows','add rows']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
