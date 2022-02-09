<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // USUARIOS
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'read_users']);
        Permission::create(['name' => 'update_users']);
        Permission::create(['name' => 'delete_users']);
        // ROLES
        Permission::create(['name' => 'create_roles']);
        Permission::create(['name' => 'read_roles']);
        Permission::create(['name' => 'update_roles']);
        Permission::create(['name' => 'delete_roles']);
        // PERMISOS
        Permission::create(['name' => 'create_permissions']);
        Permission::create(['name' => 'read_permissions']);
        Permission::create(['name' => 'update_permissions']);
        Permission::create(['name' => 'delete_permissions']);
        // create roles and assign existing permissions
        $admin = Role::create(['name' => 'administrador']);
        $admin->givePermissionTo('create_users');
        $admin->givePermissionTo('read_users');
        $admin->givePermissionTo('delete_users');

        $sa = Role::create(['name' => 'Super-Admin']);

        $operator = Role::create(['name' => 'operator']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        // create personal users
        $user = User::create([
            'name' => 'Bernabé',
            'paterno' => 'Cantún',
            'materno' => 'Domínguez',
            'email' => 'cantunberna@gmail.com',
            'phone' => '9381726488',
            'status' => 2,
            'password' => bcrypt('Cantun97.-')
        ]);
        $user->assignRole($sa);
        $user = User::create([
            'name' => 'Victor José',
            'paterno' => 'Cantún',
            'materno' => 'Domínguez',
            'email' => 'cantundominguez@gmail.com',
            'phone' => '9381609121',
            'status' => 2,
            'password' => bcrypt('vicocapri')
        ]);
        $user->assignRole($sa);
        $user = User::create([
            'name' => 'Jorge',
            'paterno' => 'Abreu',
            'materno' => 'Giral',
            'email' => 'joagi2000@ag3luxury.com',
            'password' => bcrypt('Simple12!')
        ]);
        $user->assignRole($admin);
    }
}
