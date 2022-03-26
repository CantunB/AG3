<?php

namespace App\Providers;

use App\Models\Agency;
use App\Models\Airline;
use App\Models\Hotel;
use App\Models\Operator;
use App\Models\TypeService;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\Assign;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // Carbon::setLocale(config('app.locale'));
        // Carbon::setLocale(config('app.locale'));
    //    setlocale(LC_ALL, 'es_MX', 'es', 'ES', 'es_MX.utf8');

        view()->composer(['layouts.app','home'], function($view){
            $units = Unit::count();
            $operators = Operator::count();
            $hotels = Hotel::count();
            $airlines = Airline::count();
            $type_services = TypeService::count();
            $agencies = Agency::count();
            // $sales = Assign
            $view->with([
                'units' => $units,
                'operators' => $operators,
                'hotels' => $hotels,
                'airlines' => $airlines,
                'type_services' => $type_services,
                'agencies' => $agencies,
            ]);
        });
        // view()->composer('layouts.includes.components.topbar', function ($view) {
        //     $view->with('current_locale', app()->getLocale());
        //     $view->with('available_locales', config('app.available_locales'));
        // });

    }
}
