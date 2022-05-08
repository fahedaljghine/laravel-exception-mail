<?php

namespace Fahedaljghine\ExceptionMail;

use Fahedaljghine\ExceptionMail\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;

class ExceptionMailServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $configPath = __DIR__ . '/../config/config.php';
        $configKey = 'exception-mail';


        $this->publishes([
            $configPath => config_path("$configKey.php"),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/emails' => resource_path('views/emails'),
        ]);

        $this->mergeConfigFrom(
            $configPath, $configKey
        );
    }

    public function register()
    {
        $this->app->singleton(ExceptionHandler::class, Handler::class);
    }
}