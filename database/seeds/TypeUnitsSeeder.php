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
        ]);
        $type = TypeUnit::create([
            'type_units' => 'VAN',
        ]);
    }
}
