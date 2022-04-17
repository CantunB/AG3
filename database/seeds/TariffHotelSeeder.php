<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class TariffHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['category' => 'Tarifas', 'name' => 'create_tariff']);
        Permission::create(['category' => 'Tarifas', 'name' => 'read_tariff']);
        Permission::create(['category' => 'Tarifas', 'name' => 'update_tariff']);
        Permission::create(['category' => 'Tarifas', 'name' => 'delete_tariff']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo([
            'create_tariff',
            'read_tariff',
            'update_tariff',
            'delete_tariff'
            ]);
        $admin = Role::findByName('Administrador');
        $admin->givePermissionTo([
            'create_tariff',
            'read_tariff',
            'update_tariff',
            'delete_tariff'
        ]);
        /** ZONA 1  */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 1,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '1300',
            'USD' => '65',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 1,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '2400',
            'USD' => '120',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 1,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '700',
            'USD' => '35',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 1,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '1200',
            'USD' => '60',
        ]);

        /** ZONA 2  */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 2,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '1300',
            'USD' => '65',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 2,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '2400',
            'USD' => '120',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 2,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '700',
            'USD' => '35',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 2,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '1200',
            'USD' => '60',
        ]);

        /** ZONA 3  */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 3,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '1600',
            'USD' => '80',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 3,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '3000',
            'USD' => '150',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 3,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '900',
            'USD' => '45',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 3,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '1600',
            'USD' => '80',
        ]);

        /** ZONA 4  */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 4,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2000',
            'USD' => '100',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 4,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '3800',
            'USD' => '190',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 4,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1200',
            'USD' => '60',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 4,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '2200',
            'USD' => '110',
        ]);

        /** ZONA 5  */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 5,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '1600',
            'USD' => '80',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 5,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '3000',
            'USD' => '150',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 5,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '800',
            'USD' => '40',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 5,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '1400',
            'USD' => '70',
        ]);

        /** ZONA 6 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 6,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2000',
            'USD' => '100',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 6,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '3800',
            'USD' => '190',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 6,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1200',
            'USD' => '60',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 6,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '2200',
            'USD' => '110',
        ]);

        /** ZONA 7 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 7,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2000',
            'USD' => '100',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 7,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '3800',
            'USD' => '190',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 7,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1200',
            'USD' => '60',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 7,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '2200',
            'USD' => '110',
        ]);


        /** ZONA 8 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 8,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2100',
            'USD' => '105',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 8,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '4000',
            'USD' => '200',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 8,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1300',
            'USD' => '65',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 8,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '2400',
            'USD' => '120',
        ]);

        /** ZONA 9 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 9,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2300',
            'USD' => '115',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 9,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '4400',
            'USD' => '220',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 9,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1500',
            'USD' => '75',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 9,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '2800',
            'USD' => '140',
        ]);

        /** ZONA 10 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 10,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2500',
            'USD' => '125',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 10,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '4800',
            'USD' => '240',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 10,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1700',
            'USD' => '85',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 10,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '3200',
            'USD' => '160',
        ]);

        /** ZONA 11 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 11,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '3500',
            'USD' => '175',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 11,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '6800',
            'USD' => '340',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 11,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '2300',
            'USD' => '115',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 11,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '4400',
            'USD' => '220',
        ]);

        /** ZONA 12 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 12,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '3500',
            'USD' => '175',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 12,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '6800',
            'USD' => '340',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 12,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '2300',
            'USD' => '115',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 12,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '4400',
            'USD' => '220',
        ]);

        /** ZONA 13 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 13,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '5000',
            'USD' => '250',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 13,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '9800',
            'USD' => '490',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 13,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '3400',
            'USD' => '170',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 13,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '6600',
            'USD' => '330',
        ]);

    }
}
