<?php

use App\Models\PaymentMethods;
use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $method = PaymentMethods::create([
            'method' => 'Balance',
        ]);
        $method = PaymentMethods::create([
            'method' => 'Cash',
        ]);
        $method = PaymentMethods::create([
            'method' => 'Clip',
        ]);
        $method = PaymentMethods::create([
            'method' => 'Transfer',
        ]);
    }
}
