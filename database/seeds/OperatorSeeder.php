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

        // factory(Operator::class, 5)->create();

        $operador = Operator::create([
            'name' => 'Marcos Guillermo',
            'paterno' => 'Cantún',
            'materno' => 'Domínguez',
            'email' => 'marcos@gmail.com',
            'password' =>  bcrypt('password1234'),
            'phone' => '9381726488',
        ]);
        $operador = Operator::create([
            'name' => 'Moises',
            'paterno' => 'Mendez',
            'materno' => 'Ramirez',
            'email' => 'moises_r@ag3luxury.com',
            'password' =>  bcrypt('password1234'),
        ]);
        $operador = Operator::create([
            'name' => 'Luis Fernando',
            'paterno' => 'Juarez',
            'materno' => 'Guillermo',
            'email' => 'luis_j@ag3luxury.com',
            'password' =>  bcrypt('password1234'),
        ]);
        $operador = Operator::create([
            'name' => 'Rafael ',
            'paterno' => 'Figueroa',
            'materno' => 'Ochoa',
            'email' => 'rafael_f@ag3luxury.com',
            'password' =>  bcrypt('password1234'),
        ]);
        $operador = Operator::create([
            'name' => 'Jose Guadalupe',
            'paterno' => 'Gomez',
            'materno' => 'Gomez',
            'email' => 'jose_g@ag3luxury.com',
            'password' =>  bcrypt('password1234'),
        ]);
        $operador = Operator::create([
            'name' => 'Angel Humberto ',
            'paterno' => 'Cauich',
            'materno' => 'Ruz',
            'email' => 'angel_h@ag3luxury.com',
            'password' =>  bcrypt('password1234'),
        ]);
        $operador = Operator::create([
            'name' => 'Luis Gerardo',
            'paterno' => 'Mendez',
            'materno' => 'Cordova',
            'email' => 'luis_m@ag3luxury.com',
            'password' =>  bcrypt('password1234'),
        ]);
        $operador = Operator::create([
            'name' => 'Felix Gilberto',
            'paterno' => 'Gutierrez',
            'materno' => 'Dominguez',
            'email' => 'felix_d@ag3luxury.com',
            'password' =>  bcrypt('password1234'),
        ]);
        $operador = Operator::create([
            'name' => 'Victor Hugo',
            'paterno' => 'Rodriguez',
            'materno' => 'Dominguez',
            'email' => 'victor_r@ag3luxury.com',
            'password' =>  bcrypt('password1234'),
        ]);
        $operator = Operator::create([
            'name' => 'Onecimo',
            'paterno' => 'Vargas',
            'materno' => 'Hernandez',
            'email' => 'onecimo_v@ag3luxury.com',
            'password' => bcrypt('password1234'),
        ]);
        $operador = Operator::create([
            'name' => 'Julio Cesar',
            'paterno' => 'Mendez',
            'materno' => 'Cordoba',
            'email' => 'julio_m@ag3luxury.com',
            'password' =>  bcrypt('password1234'),
        ]);
        $operator = Operator::create([
            'name' => 'Javier',
            'paterno' => 'Cordova',
            'materno' => 'Alegria',
            'email' => 'julio_c@ag3luxury.com',
            'password' => bcrypt('password1234'),
        ]);
        $operador = Operator::create([
            'name' => 'Eusebio',
            'paterno' => 'Ulloa',
            'materno' => 'Gonzales',
            'email' => 'eusebio_u@ag3luxury.com',
            'password' =>  bcrypt('password1234'),
        ]);


    }
}
