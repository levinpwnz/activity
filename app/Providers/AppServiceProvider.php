<?php

namespace App\Providers;

use App\Servers\Contracts\ServerContract;
use App\Servers\JsonRpcServer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ServerContract::class, JsonRpcServer::class);
    }

    public function boot()
    {
    }
}
