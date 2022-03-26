<?php

use App\Models\TypeService;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class TypeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['category' => 'Tipo de Servicios', 'name' => 'create_typeservices']);
        Permission::create(['category' => 'Tipo de Servicios', 'name' => 'read_typeservices']);
        Permission::create(['category' => 'Tipo de Servicios', 'name' => 'update_typeservices']);
        Permission::create(['category' => 'Tipo de Servicios', 'name' => 'delete_typeservices']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo([
            'create_typeservices',
            'read_typeservices',
            'update_typeservices',
            'delete_typeservices'
            ]);

        $type = TypeService::create([
            'name' => 'Salidas',
        ]);
        $type = TypeService::create([
            'name' => 'Llegadas',
        ]);
        $type = TypeService::create([
            'name' => 'Servicio Abierto',
        ]);
        $type = TypeService::create([
            'name' => 'Circuito',
        ]);
        // $type = TypeService::create([
        //     'name' => 'Transfer',
        // ]);
        // $type = TypeService::create([
        //     'name' => 'Tour',
        // ]);
        // $type = TypeService::create([
        //     'name' => 'Eventos',
        // ]);
        // $type = TypeService::create([
        //     'name' => 'Cortesias',
        //  ]);
        //  $type = TypeService::create([
        //     'name' => 'Balance',
        //  ]);
    }
}
