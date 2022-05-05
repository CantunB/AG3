<?php

use App\Models\Register;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['category' => 'Registros', 'name' => 'create_registers']);
        Permission::create(['category' => 'Registros', 'name' => 'read_registers']);
        Permission::create(['category' => 'Registros', 'name' => 'update_registers']);
        Permission::create(['category' => 'Registros', 'name' => 'delete_registers']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo([
            'create_registers',
            'read_registers',
            'update_registers',
            'delete_registers'
            ]);
        $admin = Role::findByName('Administrador');
        $admin->givePermissionTo([
            'create_registers',
            'read_registers',
            'update_registers',
            'delete_registers'
        ]);

        // factory(Register::class, 30)->create();
    }
}
