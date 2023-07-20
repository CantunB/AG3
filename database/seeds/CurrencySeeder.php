<?php

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency = Currency::create([
            'CurrencyIsO' => 'MXN',
            'Languague' => 'es',
            'CurrencyName' => 'Peso Mexicano',
            'Money' => 'Peso',
            'Symbol' => '$',
            'CurrencyValue' =>'1'
        ]);
        $currency = Currency::create([
            'CurrencyIsO' => 'USD',
            'Languague' => 'en',
            'CurrencyName' => 'Dolar Americano',
            'Money' => 'Dólar',
            'Symbol' => '$',
            'CurrencyValue' =>'20'
        ]);
        $currency = Currency::create([
            'CurrencyIsO' => 'CNY',
            'Languague' => 'en',
            'CurrencyName' => 'Chinese Yuan',
            'Money' => '人民币',
            'Symbol' => '¥',
            'CurrencyValue' =>'0.12'
        ]);
        $currency = Currency::create([
            'CurrencyIsO' => 'EUR',
            'Languague' => 'fr',
            'CurrencyName' => 'Euro',
            'Money' => 'Euro',
            'Symbol' => '€',
            'CurrencyValue' =>'18.74'
        ]);

    }
}
