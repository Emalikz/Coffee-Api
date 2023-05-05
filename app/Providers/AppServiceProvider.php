<?php

namespace App\Providers;

use App\Services\AnalyticsService;
use App\Services\AuthService;
use App\Services\ProductService;
use App\Services\SellService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

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
        //
        App::bind(AuthService::class,function(Application $application){
            return new AuthService();
        });

        App::bind(ProductService::class,function(Application $application){
            return new ProductService(App::make(AuthService::class));
        });

        App::bind(SellService::class,function(Application $application){
            return new SellService(App::make(ProductService::class),App::make(AuthService::class));
        });

        App::bind(AnalyticsService::class,function(Application $application){
            return new AnalyticsService(App::make(ProductService::class));
        });
    }
}
