<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Permisos
        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view permissions',
            'edit permissions',
            'create permissions',
            'delete permissions',
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }
        
    // Roles
        $admin = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        $admin->givePermissionTo(Permission::all());
        
        $manager = Role::create(['name' => 'Gerente', 'guard_name' => 'web']);
        $manager->givePermissionTo([
            'view users',
            'create users',
            'edit users',
            'view roles',
        ]);
    }
}
