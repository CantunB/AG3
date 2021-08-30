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

        $supervisor = Role::create(['name' => 'supervisor']);
        $supervisor->givePermissionTo('read_users');

        $sa = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = User::create([
            'name' => 'Berna Cantun',
            'email' => 'cantunberna@gmail.com',
            'password' => bcrypt('Cantun97.-')
        ]);
        $user->assignRole($sa);

        $user = User::create([
            'name' => 'Victor Cantun',
            'email' => 'cantundominguez@gmail.com',
            'password' => bcrypt('vicocapri')

        ]);
        $user->assignRole($sa);

        $user = User::create([
            'name' => 'Abreu Giral',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234')

        ]);
        $user->assignRole($admin);

        $user = User::create([
            'name' => 'AG3 LUXI',
            'email' => 'ag3@gmail.com',
            'password' => bcrypt('1234')

        ]);
        $user->assignRole($supervisor);
    }
}
