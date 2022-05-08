# laravel-exception-mail

![Laravel 9.0](https://img.shields.io/badge/Laravel-9.0-f4645f.svg)
![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)

This package will allow you to specify email addresses to send them all the exceptions that occurs in Laravel application.

## Hire Me

You can hire me to help you get your business online, consulting, conflict solving, building up your development team and whatever you need for a web solutions. You can check all of my information by [Checking my website](https://fahedaljghine.com/).


## Installation

You can install the package via composer:
``` bash
composer require fahedaljghine/laravel-exception-mail
```

The package will automatically register itself.

You must publish the config with:

```bash
php artisan vendor:publish --provider="Fahedaljghine\ExceptionMail\ExceptionMailServiceProvider" --tag="config"
```

This is the contents of the file which will be published at `config/exception-mail.php`

```php

return [
    /*
    * Add email addresses you want them to receive the exception
    */
    'addresses' => [
        //'developer1@companydomain.com',
        //'developer2@companydomain.com',
    ],
];
```


If you would like to change the email template you can publish the blade email template with:

```bash
php artisan vendor:publish --provider="Fahedaljghine\ExceptionMail\ExceptionMailServiceProvider" --tag="blade"
```

The blade template will be published at `resources/views/emails/exception-mail.blade.php`

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

You are welcome to contribute


## Credits

- [Fahed Aljghine](https://github.com/fahedaljghine)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
