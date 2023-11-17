<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('success', function () {
            return '<?php if(session()->has("success")): ?>';
        });
    
        Blade::directive('endsuccess', function () {
            return '<?php endif; ?>';
        });
    }
}
