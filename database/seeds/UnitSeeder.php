<?php

use App\Models\Unit;
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
        Permission::create(['category' => 'Unidades', 'name' => 'create_unit']);
        Permission::create(['category' => 'Unidades', 'name' => 'read_unit']);
        Permission::create(['category' => 'Unidades', 'name' => 'update_unit']);
        Permission::create(['category' => 'Unidades', 'name' => 'delete_unit']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo([
            'create_unit',
            'read_unit',
            'update_unit',
            'delete_unit'
            ]);

        $unidad = Unit::create([
            'unit' => 'SUB01',
            'brand' => 'CHEVROLET',
            'type' => 'SUBURBAN',
            'year' => '2018',
            'insurance_carrier' =>  'AXXA',
            'sct_plate_number' =>  '47RB8F',
            'color' => 'BLANCO',
            'insurance_policy' => '130261890601',
            'insurance_start_validity' => '03/07/22',
        ]);
        $unidad = Unit::create([
            'unit' => 'SUB02',
            'brand' => 'CHEVROLET',
            'type' => 'SUBURBAN',
            'year' => '2018',
            'insurance_carrier' =>  'QUALITAS',
            'sct_plate_number' =>  '48RB8F',
            'color' => 'GRIS',
            'insurance_policy' => '1000091418',
            'insurance_start_validity' => '26/07/22',
        ]);
        $unidad = Unit::create([
            'unit' => 'SUB03',
            'brand' => 'CHEVROLET',
            'type' => 'SUBURBAN',
            'year' => '2018',
            'insurance_carrier' =>  'QUALITAS',
            'sct_plate_number' =>  '85RB7F',
            'color' => 'NEGRO',
            'insurance_policy' => '1000092089',
            'insurance_start_validity' => '27/08/22',
        ]);
        $unidad = Unit::create([
            'unit' => 'SUB04',
            'brand' => 'CHEVROLET',
            'type' => 'SUBURBAN',
            'year' => '2021',
            'insurance_carrier' =>  'GNP',
            'sct_plate_number' =>  '31RC4S',
            'color' => 'NEGRO',
            'insurance_policy' => '470876012',
            'insurance_start_validity' => '06/09/22',
        ]);
        $unidad = Unit::create([
            'unit' => 'SUB05',
            'brand' => 'CHEVROLET',
            'type' => 'SUBURBAN',
            'year' => '2016',
            'insurance_carrier' =>  'QUALITAS',
            'sct_plate_number' =>  '71RA5F',
            'color' => 'BLANCO',
            'insurance_policy' => '1000090428',
            'insurance_start_validity' => '26/11/21',
        ]);
        $unidad = Unit::create([
            'unit' => 'VAN01',
            'brand' => 'VW',
            'type' => 'VAN',
            'year' => '2019',
            'insurance_carrier' =>  'ZURICH',
            'sct_plate_number' =>  '16RC4G',
            'color' => 'BLANCO',
            'insurance_policy' => '110741047',
            'insurance_start_validity' => '26/03/22',
        ]);
        $unidad = Unit::create([
            'unit' => 'VAN02',
            'brand' => 'VW',
            'type' => 'TRANSPORTER',
            'year' => '2021',
            'insurance_carrier' =>  'ZURICH',
            'sct_plate_number' =>  '65RC4S',
            'color' => 'BLANCO',
            'insurance_policy' => '110844135',
            'insurance_start_validity' => '29/07/22',
        ]);
        $unidad = Unit::create([
            'unit' => 'VAN03',
            'brand' => 'VW',
            'type' => 'VAN',
            'year' => '2021',
            'insurance_carrier' =>  'ZURICH',
            'sct_plate_number' =>  '77RC4S',
            'color' => 'BLANCO',
            'insurance_policy' => '110844134',
            'insurance_start_validity' => '29/07/22',
        ]);
        $unidad = Unit::create([
            'unit' => 'VAN04',
            'brand' => 'VW',
            'type' => 'VAN',
            'year' => '2021',
            'insurance_carrier' =>  'ZURICH',
            'sct_plate_number' =>  '91RB5D',
            'color' => 'BLANCO',
            'insurance_policy' => '110846060',
            'insurance_start_validity' => '02/08/22',
        ]);
        $unidad = Unit::create([
            'unit' => 'VAN05',
            'brand' => 'VW',
            'type' => 'VAN',
            'year' => '2021',
            'insurance_carrier' =>  'ZURICH',
            'sct_plate_number' =>  '94RC5Y',
            'color' => 'BLANCO',
            'insurance_policy' => '110933773',
            'insurance_start_validity' => '08/11/22',
        ]);

    }
}
