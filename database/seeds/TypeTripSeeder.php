<?php

use App\Models\TypeTrip;
use Illuminate\Database\Seeder;

class TypeTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = TypeTrip::create([
            'type_trip' => 'SENCILLO',
        ]);
        $type = TypeTrip::create([
            'type_trip' => 'REDONDO',
        ]);
    }
}
