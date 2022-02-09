<?php

use App\Models\Operator;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create_operators']);
        Permission::create(['name' => 'read_operators']);
        Permission::create(['name' => 'update_operators']);
        Permission::create(['name' => 'delete_operators']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo([
            'create_operators',
            'read_operators',
            'update_operators',
            'delete_operators'
            ]);

        factory(Operator::class, 5)->create();

        $operador = Operator::create([
            'name' => 'Marcos Guillermo',
            'paterno' => 'Cantún',
            'materno' => 'Domínguez',
            'email' => 'marcos@gmail.com',
            'password' =>  bcrypt('password1234'),
            'phone' => '9381726488',
        ]);
    }
}
