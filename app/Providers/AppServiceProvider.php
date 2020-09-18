<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PaymentGatewayInterface;
use App\Repositories\BankPaymentGateway;
use App\Repositories\CreditPaymentGateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->singleTon(PaymentGatewayInterface::class, function($app){
             if( request('process') === 'credit'){
                return new CreditPaymentGateway('usd');
             }
            return new BankPaymentGateway('usd');
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
