<?php

use App\Models\Zone;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zone = Zone::create([
            'zona' => '1'
        ]);
        $zone = Zone::create([
            'zona' => '2'
        ]);
        $zone = Zone::create([
            'zona' => '3'
        ]);
        $zone = Zone::create([
            'zona' => '4'
        ]);
        $zone = Zone::create([
            'zona' => '5'
        ]);
        $zone = Zone::create([
            'zona' => '6'
        ]);
        $zone = Zone::create([
            'zona' => '7'
        ]);
        $zone = Zone::create([
            'zona' => '8'
        ]);
        $zone = Zone::create([
            'zona' => '9'
        ]);
        $zone = Zone::create([
            'zona' => '10'
        ]);
        $zone = Zone::create([
            'zona' => '11'
        ]);
        $zone = Zone::create([
            'zona' => '12'
        ]);
        $zone = Zone::create([
            'zona' => '13'
        ]);
    }
}
