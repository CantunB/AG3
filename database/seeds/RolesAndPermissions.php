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
        Permission::create([ 'category' => 'Configuraciones', 'name' => 'create_settings']);
        Permission::create([ 'category' => 'Configuraciones', 'name' => 'read_settings']);
        Permission::create([ 'category' => 'Configuraciones', 'name' => 'update_settings']);
        Permission::create([ 'category' => 'Configuraciones', 'name' => 'delete_settings']);
        // USUARIOS
        Permission::create([ 'category' => 'Usuarios', 'name' => 'create_users']);
        Permission::create([ 'category' => 'Usuarios', 'name' => 'read_users']);
        Permission::create([ 'category' => 'Usuarios', 'name' => 'update_users']);
        Permission::create([ 'category' => 'Usuarios', 'name' => 'delete_users']);
        // ROLES
        Permission::create([ 'category' => 'Roles', 'name' => 'create_roles']);
        Permission::create([ 'category' => 'Roles', 'name' => 'read_roles']);
        Permission::create([ 'category' => 'Roles', 'name' => 'update_roles']);
        Permission::create([ 'category' => 'Roles', 'name' => 'delete_roles']);
        // PERMISOS
        Permission::create([ 'category' => 'Permisos','name' => 'create_permissions']);
        Permission::create([ 'category' => 'Permisos', 'name' => 'read_permissions']);
        Permission::create([ 'category' => 'Permisos', 'name' => 'update_permissions']);
        Permission::create([ 'category' => 'Permisos', 'name' => 'delete_permissions']);

        $sa = Role::create(['name' => 'Super-Admin']);
        $sa->givePermissionTo('create_settings');
        $sa->givePermissionTo('read_settings');
        $sa->givePermissionTo('update_settings');
        $sa->givePermissionTo('delete_settings');
        $sa->givePermissionTo('create_users');
        $sa->givePermissionTo('read_users');
        $sa->givePermissionTo('update_users');
        $sa->givePermissionTo('delete_users');
        $sa->givePermissionTo('create_roles');
        $sa->givePermissionTo('read_roles');
        $sa->givePermissionTo('update_roles');
        $sa->givePermissionTo('delete_roles');
        $sa->givePermissionTo('create_permissions');
        $sa->givePermissionTo('read_permissions');
        $sa->givePermissionTo('update_permissions');
        $sa->givePermissionTo('delete_permissions');
        // create roles and assign existing permissions
        $admin = Role::create(['name' => 'Administrador']);
        $admin->givePermissionTo('read_settings');
        $admin->givePermissionTo('read_users');
        $admin->givePermissionTo('create_users');
        $admin->givePermissionTo('update_users');
        $admin->givePermissionTo('delete_users');

        $operator = Role::create(['name' => 'Operador']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        // create personal users
        $user = User::create([
            'name' => 'Bernabé',
            'paterno' => 'Cantún',
            'materno' => 'Domínguez',
            'email' => 'cantunberna@gmail.com',
            'phone' => '938 172 6488',
            'status' => 2,
            'password' => bcrypt('Cantun97.-')
        ]);
        $user->assignRole($sa);
        $user = User::create([
            'name' => 'Victor José',
            'paterno' => 'Cantún',
            'materno' => 'Domínguez',
            'email' => 'cantundominguez@gmail.com',
            'phone' => '938 160 9121',
            'status' => 2,
            'password' => bcrypt('vicocapri')
        ]);
        $user->assignRole($sa);
        $user = User::create([
            'name' => 'Jorge',
            'paterno' => 'Abreu',
            'materno' => 'Giral',
            'email' => 'joagi2000@ag3luxury.com',
            'phone' => '982 103 4347',
            'password' => bcrypt('Ag3luxury')
        ]);
        $user->assignRole($admin);

        $user = User::create([
            'name' => 'Luis',
            'paterno' => 'Abreu',
            'materno' => 'Giral',
            'email' => 'luis@ag3luxury.com',
            'phone' => '938 137 8856',
            'password' => bcrypt('Ag3luxury')
        ]);
        $user->assignRole($admin);
    }
}
