<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ContactInfo;
use Illuminate\Support\Facades\View;

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
        View::composer('components.layout.footer', function ($view) {
            $contactInfo = ContactInfo::latest()->first();
            $view->with('contactInfo', $contactInfo);
        });
    }
}
