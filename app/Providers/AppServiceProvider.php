<?php

namespace App\Providers;

use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Console\Scheduling\Schedule;

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

        app('router')->aliasMiddleware('user', UserMiddleware::class);
        app('router')->aliasMiddleware('admin', AdminMiddleware::class);
        app('router')->aliasMiddleware('role', \App\Http\Middleware\RoleMiddleware::class);
        $this->app->singleton(Schedule::class, function ($app) {
            return $app->make(Schedule::class)->dailyAt('07:30', function () {
                Artisan::call('absence:mark-alpa');
            });
        });
    }
}
