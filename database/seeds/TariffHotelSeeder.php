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
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 1,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '2400',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 1,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '700',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 1,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '1200',
        ]);

        /** ZONA 2  */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 2,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '1300',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 2,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '2400',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 2,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '700',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 2,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '1200',
        ]);

        /** ZONA 3  */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 3,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '1600',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 3,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '3000',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 3,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '900',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 3,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '1600',
        ]);

        /** ZONA 4  */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 4,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2000',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 4,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '3800',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 4,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1200',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 4,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '2200',
        ]);

        /** ZONA 5  */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 5,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '1600',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 5,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '3000',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 5,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '800',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 5,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '1400',
        ]);

        /** ZONA 6 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 6,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2000',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 6,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '3800',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 6,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1200',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 6,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '2200',
        ]);

        /** ZONA 7 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 7,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2000',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 7,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '3800',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 7,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1200',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 7,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '2200',
        ]);


        /** ZONA 8 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 8,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2100',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 8,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '4000',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 8,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1300',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 8,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '2400',
        ]);

        /** ZONA 9 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 9,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2300',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 9,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '4400',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 9,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1500',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 9,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '2800',
        ]);

        /** ZONA 10 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 10,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '2500',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 10,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '4800',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 10,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '1700',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 10,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '3200',
        ]);

        /** ZONA 11 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 11,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '3500',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 11,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '6800',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 11,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '2300',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 11,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '4400',
        ]);

        /** ZONA 12 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 12,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '3500',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 12,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '6800',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 12,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '2300',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 12,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '4400',
        ]);

        /** ZONA 13 */
        DB::table('tariff_hotels')->insert([
            'id_zona' => 13,
            'type_unit_id' => 1,
            'type_trip_id' => 1,
            'MXN' => '5000',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 13,
            'type_unit_id' => 1,
            'type_trip_id' => 2,
            'MXN' => '9800',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 13,
            'type_unit_id' => 2,
            'type_trip_id' => 1,
            'MXN' => '3400',
        ]);
        DB::table('tariff_hotels')->insert([
            'id_zona' => 13,
            'type_unit_id' => 2,
            'type_trip_id' => 2,
            'MXN' => '6600',
        ]);

    }
}
