<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['category' => 'Aerolineas','name' => 'create_airlines']);
        Permission::create(['category' => 'Aerolineas','name' => 'read_airlines']);
        Permission::create(['category' => 'Aerolineas','name' => 'update_airlines']);
        Permission::create(['category' => 'Aerolineas','name' => 'delete_airlines']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo([
            'create_airlines',
            'read_airlines',
            'update_airlines',
            'delete_airlines'
            ]);
        $admin = Role::findByName('Administrador');
        $admin->givePermissionTo([
            'create_airlines',
            'read_airlines',
            'update_airlines',
            'delete_airlines'
        ]);
    }
}
