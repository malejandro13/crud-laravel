<?php

namespace App\Providers;

use App\Interfaces\ClientInterface;
use Illuminate\Support\ServiceProvider;
use App\Decorators\ClientCacheDecorator;

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
        $this->app->bind(ClientInterface::class, ClientCacheDecorator::class);
    }
}
