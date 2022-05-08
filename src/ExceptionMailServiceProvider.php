<?php

namespace Fahedaljghine\ExceptionMail;

use Fahedaljghine\ExceptionMail\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;

class ExceptionMailServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../config/exception-mail.php' => config_path('exception-mail.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/emails' => resource_path('views/emails'),
        ], 'blade');
    }

    public function register()
    {
        $this->app->singleton(ExceptionHandler::class, Handler::class);

        $this->mergeConfigFrom(__DIR__ . '/../config/exception-mail.php', 'exception-mail');
    }
}
