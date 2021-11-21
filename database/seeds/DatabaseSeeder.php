<?php

use App\Models\Hotel;
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
        $this->call(AgencieSeeder::class);
        $this->call(TypeServiceSeeder::class);
        $this->call(OperatorSeeder::class);
        $this->call(AirlineSeeder::class);
        $this->call(RegisterSeeder::class);
        $this->call(UnitSeeder::class);
    }
}
