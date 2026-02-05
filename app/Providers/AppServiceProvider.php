<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // បន្ថែមបន្ទាត់នេះចូល

class AppServiceProvider extends ServiceProvider
{
    // ... កូដផ្សេងៗ
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
    if (config('app.env') === 'production') {
        URL::forceScheme('https');
    }
}
}
