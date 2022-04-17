<?php

use App\Models\Hotel;
use App\Models\TypeTrip;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissions::class);
        $this->call(BookingSeeder::class);
        $this->call(AgencieSeeder::class);
        $this->call(TypeServiceSeeder::class);
        $this->call(OperatorSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(AirlineSeeder::class);
        $this->call(RegisterSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(TypeUnitsSeeder::class);
        $this->call(TypeTripSeeder::class);
        $this->call(TariffHotelSeeder::class);
        $this->call(CanceledSeeder::class);
        $this->call(PaymentMethodsSeeder::class);
    }
}
