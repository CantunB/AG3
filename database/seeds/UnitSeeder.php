<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'create_unit']);
        Permission::create(['name' => 'read_unit']);
        Permission::create(['name' => 'update_unit']);
        Permission::create(['name' => 'delete_unit']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo([
            'create_unit',
            'read_unit',
            'update_unit',
            'delete_unit'
            ]);

    }
}
