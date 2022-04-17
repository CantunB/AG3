<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class CanceledSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['category' => 'Cancelados','name' => 'create_canceled']);
        Permission::create(['category' => 'Cancelados','name' => 'read_canceled']);
        Permission::create(['category' => 'Cancelados','name' => 'update_canceled']);
        Permission::create(['category' => 'Cancelados','name' => 'delete_canceled']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo([
            'create_canceled',
            'read_canceled',
            'update_canceled',
            'delete_canceled'
            ]);
        $admin = Role::findByName('Administrador');
        $admin->givePermissionTo([
            'create_canceled',
            'read_canceled',
            'update_canceled',
            'delete_canceled'
        ]);
    }
}
