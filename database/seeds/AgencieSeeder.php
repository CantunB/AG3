<?php

use App\Models\Agency;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AgencieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['category' => 'Agencias','name' => 'create_agencies']);
        Permission::create(['category' => 'Agencias', 'name' => 'read_agencies']);
        Permission::create(['category' => 'Agencias', 'name' => 'update_agencies']);
        Permission::create(['category' => 'Agencias', 'name' => 'delete_agencies']);
        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo([
            'create_agencies',
            'read_agencies',
            'update_agencies',
            'delete_agencies'
            ]);
        $agency = Agency::create([
            'business_name' => 'COMERCIALIZADORA BETANCOURT, S.A. DE C.V.',
            'rfc' => 'CBE060703MN0',
        ]);
        $agency = Agency::create([
            'business_name' => 'CANCUN VIAJES PARA ESTUDIANTES DE S.A DE C.V',
            'name' => 'CST',
            'rfc' => 'CVE110908532',
        ]);
        $agency = Agency::create([
            'business_name' => 'EXPERIENCIAS Y EXCELENCIA S.A. DE C.V.',
            'name' => 'BON VOYAGE',
            'rfc' => 'EEX160720DA9',
        ]);
        $agency = Agency::create([
            'business_name' => 'IMAGEN TOMOGRAFICA Y MOLECULAR S.C',
            'rfc' => 'ITM160813N54',
        ]);
        $agency = Agency::create([
            'business_name' => 'MEXICANA DE TURISMO NACIONAL FRAPIN S.A.S DE C.V.',
            'rfc' => 'MTN171024JU7',
        ]);
        $agency = Agency::create([
            'business_name' => 'OLYMPIA CANCUN S.A DE C.V.',
            'rfc' => 'OCA140620CQ9',
        ]);
        $agency = Agency::create([
            'business_name' => 'PRALGO S.A. DE C.V.',
            'rfc' => 'PRA101123866',
        ]);
        $agency = Agency::create([
            'business_name' => 'SERVICIOS ANHORT PENINSULAR, S.C.',
            'rfc' => 'SAP131211I49',
        ]);
        $agency = Agency::create([
            'business_name' => 'SIAN KAAN PREMIUM TOURS S. DE R.L. DE C.V.',
            'rfc' => 'SKP110323RV4',
        ]);
        $agency = Agency::create([
            'business_name' => 'SERVICOS TERRESTRES ESPECIALIZADOS MARGIS S.A. DE C.V.',
            'name' => 'MARITUR',
            'rfc' => 'STE960627SV8',
        ]);
        $agency = Agency::create([
            'business_name' => 'INTERNATIONAL TRAVEL PLANNERS S.A DE C.V',
            'name' => 'MARITUR',
            'rfc' => 'ITP161220BZ7',
        ]);
        $agency = Agency::create([
            'business_name' => 'TRANSPORTADORA GARF',
            'rfc' => 'TGA180613LZ8',
        ]);
        $agency = Agency::create([
            'business_name' => 'TRANSCUN SAVI, S.A. DE C.V.',
            'name' => 'DANTIA LS',
            'rfc' => 'TSA191025U11',
        ]);
        $agency = Agency::create([
            'business_name' => 'TURISMO Y TRANSPORTACION DEL CARIBE, S.A. DE C.V.',
            'rfc' => 'TTC1605308L4',
        ]);
        $agency = Agency::create([
            'business_name' => 'TULUM TRANSPORTE DE LUJO S.A DE C.V',
            'rfc' => 'TTL171017V10',
        ]);
        $agency = Agency::create([
            'business_name' => 'TRANSPORTADORA TURISTICA MAPLE CANCUN S.A. DE CV',
            'rfc' => 'TTM111020AI5',
        ]);
        $agency = Agency::create([
            'business_name' => 'TRANSFERS AND TOURISM SERVICES GROUP S.A. DE CV',
            'rfc' => 'TTS1612071C3',
        ]);
        $agency = Agency::create([
            'business_name' => 'VIP LUXURY TOURS, S.A. DE C.V.',
            'rfc' => 'VLT1601183X0',
        ]);
        $agency = Agency::create([
            'business_name' => 'OPERADORA ELITE S.A. DE CV',
            'name' => 'HAPPYS',
            'rfc' => 'OEL8206237W8',
        ]);
        $agency = Agency::create([
            'business_name' => 'TRIPTOMEX S.A. DE C.V',
            'name' => 'TRIP TO MEX',
            'rfc' => 'TRI160606BL8',
        ]);
        $agency = Agency::create([
            'business_name' => 'MEXICO TRAVEL INFO S.A. DE C.V.',
            'name' => '',
            'rfc' => 'MTI1901306D7',
        ]);
        $agency = Agency::create([
            'business_name' => 'PLAYA DEL CARMEN TRANSFERS, S.A. DE C.V.',
            'name' => '',
            'rfc' => 'PCT011219L24',
        ]);
        $agency = Agency::create([
            'business_name' => 'ROYALE DMC S.A. DE C.V.',
            'name' => 'ROYAL TOURS',
            'rfc' => 'RDM0504059S4',
        ]);
        $agency = Agency::create([
            'business_name' => 'ROYALE TRANSFERS S.A. DE C.V.',
            'name' => 'ROYAL TOURS',
            'rfc' => 'RTR960112QZA',
        ]);

        $agency = Agency::create([
            'business_name' => 'SOCIEDAD DE TRANSPORTES PROFESIONALES S.A. DE C.V.',
            'name' => '',
            'rfc' => 'TPR020516UX7',
        ]);
        $agency = Agency::create([
            'business_name' => 'FAST TRAVEL',
            'name' => 'FAST TRAVEL',
            'rfc' => 'XXXXXXXXXXXX',
        ]);


    }
}
