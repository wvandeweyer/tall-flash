# TALL Stack Flash Notification

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wvandeweyer/tall-flash.svg?style=flat-square)](https://packagist.org/packages/wvandeweyer/tall-flash)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/wvandeweyer/tall-flash/run-tests?label=tests)](https://github.com/wvandeweyer/tall-flash/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/wvandeweyer/tall-flash/Check%20&%20fix%20styling?label=code%20style)](https://github.com/wvandeweyer/tall-flash/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/wvandeweyer/tall-flash.svg?style=flat-square)](https://packagist.org/packages/wvandeweyer/tall-flash)

---
This is a package to send flash messages in a Laravel app via either the session storage or via Livewire.

## Usage 

Usage via session storage

```php
class MyAwesomeController
{
    public function store()
    {
        // ......
        flash()->success('Hooray, we have saved your input');
        // ....
    }
}
```



## Livewire Flash Message

To flash a message via Livewire, you must chain ```livewire($this)```. This will emit the information to the Flash notification component.

```php
public function livewireMethod()
{
    flash()->info('I want to share this info message.')->livewire($this);
}
```



## Display Messages

You can display the messages by including this Livewire component in your template. It will display messages stored in the session, as well as messages emitted via Livewire.

```blade
<livewire:flash-container />
```

## Message types

By default following levels are defined

- info
- error
- warning
- success

## Dismissable Messages

Messages can be dismissed when chaining ```dismissable()``` 
The package uses AlpineJS to hide the message in this case.

---

## Installation

You can install the package via composer:

```bash
composer require wvandeweyer/tall-flash
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Wvandeweyer\Flash\FlashServiceProvider"
```

This is the contents of the published config file:

```php
return [
    'sessionKey' => 'flash_message',
    'styles' => [
        'info' => [
            'bg-color' => 'bg-blue-50',
            'icon-color' => 'text-blue-400',
            'text-color' => 'text-blue-600',
            'icon' => 'info',
            'dismissable-bg-color' => 'bg-blue-50',
            'dismissable-bg-color-hover' => 'bg-blue-100',
            'dismissable-icon-color' => 'bg-blue-500',
        ],
        'success' => [
            'bg-color'     => 'bg-green-50',
            'icon-color'   => 'text-green-400',
            'text-color'   => 'text-green-600',
            'icon'         => 'check',
            'dismissable-bg-color' => 'bg-green-50',
            'dismissable-bg-color-hover' => 'bg-green-100',
            'dismissable-icon-color' => 'bg-green-500',
        ],
        'warning' => [
            'bg-color'     => 'bg-yellow-50',
            'icon-color'   => 'text-yellow-400',
            'text-color'   => 'text-yellow-600',
            'icon'         => 'warning',
            'dismissable-bg-color' => 'bg-yellow-50',
            'dismissable-bg-color-hover' => 'bg-yellow-100',
            'dismissable-icon-color' => 'bg-yellow-500',
        ],
        'error' => [
            'bg-color'     => 'bg-red-50',
            'icon-color'   => 'text-red-400',
            'text-color'   => 'text-red-600',
            'icon'         => 'error',
            'dismissable-bg-color' => 'bg-red-50',
            'dismissable-bg-color-hover' => 'bg-red-100',
            'dismissable-icon-color' => 'bg-red-500',
        ],
];
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Wim Vandeweyer](https://github.com/wvandeweyer)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
