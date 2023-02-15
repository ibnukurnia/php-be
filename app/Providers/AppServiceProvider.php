<?php

namespace App\Providers;

use App\Exceptions\ShipperNotFoundException;
use Exception;
use App\Services\JneService;
use App\Services\SicepatService;
use App\Services\JntService;
use App\Interfaces\ShippingInterface;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\TransactionController;
use App\Services\ShippingService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ShippingInterface::class ,function ()
        {
            if (request()->expedisi == 'JNE') {
                return $this->app->get(JneService::class);
            }
            if (request()->expedisi == 'SiCepat') {
                return $this->app->get(SicepatService::class);
            }
            if (request()->expedisi == 'Jnt') {
                return $this->app->get(JntService::class);
            }
            throw new ShipperNotFoundException("Shipper Tidak DiTemukan!");
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
