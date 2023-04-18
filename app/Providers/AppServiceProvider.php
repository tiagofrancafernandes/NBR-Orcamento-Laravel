<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::useScriptTagAttributes([
            // 'data-turbo-track' => 'reload', // Specify a value for the attribute...
            'async' => false, // Specify an attribute without a value...
            'integrity' => false, // Exclude an attribute that would otherwise be included...
            'defer' => false, // Specify an attribute without a value...
        ]);
    }
}
