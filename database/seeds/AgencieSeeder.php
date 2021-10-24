<?php

use App\Models\Agency;
use Illuminate\Database\Seeder;

class AgencieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agency = Agency::create([
            'business_name' => 'COMERCIALIZADORA BETANCOURT, SA DE CV',
            'rfc' => 'CBE060703MN0',
        ]);
        $agency = Agency::create([
            'business_name' => 'CANCUN VIAJES PARA ESTUDIANTES',
            'rfc' => 'CVE110908532',
        ]);
        $agency = Agency::create([
            'business_name' => 'EXPERIENCIAS Y EXCELENCIA S.A. DE C.V.',
            'rfc' => 'EEX160720DA9',
        ]);
        $agency = Agency::create([
            'business_name' => 'IMAGEN TOMOGRAFICA Y MOLECULAR S.C',
            'rfc' => 'ITM160813N54',
        ]);
        $agency = Agency::create([
            'business_name' => 'INTERNATIONAL TRAVEL PLANNERS SA DE CV',
            'rfc' => 'ITP161220BZ7',
        ]);
        $agency = Agency::create([
            'business_name' => 'MEXICANA DE TURISMO NACIONAL FRAPIN S.A.S DE CV',
            'rfc' => 'MTN171024JU7',
        ]);
        $agency = Agency::create([
            'business_name' => 'OLYMPIA CANCUN S.A DE C.V',
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
            'business_name' => 'SERVICOS TERRESTRES ESPECIALIZADOS MARGIS SA DE CV',
            'rfc' => 'STE960627SV8',
        ]);
        $agency = Agency::create([
            'business_name' => 'TRANSPORTADORA GARF',
            'rfc' => 'TGA180613LZ8',
        ]);
        $agency = Agency::create([
            'business_name' => 'SOCIEDAD DE TRANSPORTES PROFESIONALES S.A. DE C.V',
            'rfc' => 'TPR020516UX7',
        ]);
        $agency = Agency::create([
            'business_name' => 'TRANSCUN SAVI, S.A. DE C. V.',
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
            'business_name' => 'TRANSPORTADORA TURISTICA MAPLE CANCUN SA DE CV',
            'rfc' => 'TTM111020AI5',
        ]);
        $agency = Agency::create([
            'business_name' => 'TRANSFERS AND TOURISM SERVICES GROUP SA DE CV',
            'rfc' => 'TTS1612071C3',
        ]);
        $agency = Agency::create([
            'business_name' => 'VIP LUXURY TOURS, S.A. DE C.V.',
            'rfc' => 'VLT1601183X0',
        ]);

    }
}
