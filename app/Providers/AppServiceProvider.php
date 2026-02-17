<?php

namespace App\Providers;

use Collective\Html\FormBuilder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Forzar HTTPS en producción
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
        
        // O forzar HTTPS siempre si tu servidor está detrás de un proxy/load balancer
        // URL::forceScheme('https');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
