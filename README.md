#  Send Events and Tags in Drip.com

Using this package you can register Events and Tags straight from your Eloquent models.

Here are a few examples of the provided methods:

```php
// fetch a user
$user = User::first();

// add an Event for this user
$user->registerEvent('received_job_offer', ['job_title' => 'great_job']);

// add a Tag for this user
$user->addTag('candidate');
```

## Installation

This package can be installed through Composer.

``` bash
composer require li0nel/laravel-drip
```

In Laravel 5.5 and above the package will autoregister the service provider. In Laravel 5.4 you must install this service provider.

```php
// config/app.php
'providers' => [
    ...
    li0nel\Drip\DripServiceProvider::class,
    ...
];
```
