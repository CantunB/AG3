<?php

use App\Models\TypeUnit;
use Illuminate\Database\Seeder;

class TypeUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = TypeUnit::create([
            'type_units' => 'SUBURBAN',
            'max_pax' => 6,
            'max_suitcases' => 6
        ]);
        $type = TypeUnit::create([
            'type_units' => 'VAN',
            'max_pax' => 7,
            'max_suitcases' => 10
        ]);
    }
}
