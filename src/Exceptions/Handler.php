<?php

namespace Fahedaljghine\ExceptionMail\Exceptions;

use Fahedaljghine\ExceptionMail\Mail\ExceptionOccurred;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $e)
    {
        if ($this->shouldReport($e)) {
            $this->sendEmail($e); // sends an email
        }

        parent::report($e);
    }


    public function sendEmail(Throwable $e)
    {
        if (Config::get('exception-mail.enabled')) {
            $addresses = Config::get('exception-mail.addresses', []);
            Mail::to($addresses)->send(new ExceptionOccurred($e->getMessage()));
        }
    }
}
