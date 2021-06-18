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



## Dismissable Messages

Messages can be dismissible when chaining ```dismissable()``` or not dismissable by chaining ```notDismissable()``` or ```dismissable(false)```  

By default the messages will be dismissable. The default can be changed by publising the config file and changing the defaults.dismissable value.

The package uses AlpineJS to hide the message in this case.



## Display Messages

You can display the messages by including this Livewire component in your template. It will display messages stored in the session, as well as messages emitted via Livewire.

```blade
<livewire:flash-container />
```



## Message types

By default following levels are defined, but can be changed in the config file.

- info
- error
- warning
- success

When adding a level, you must also update the view ```flash-message.blade.php``` . The styles are included in the blade file for the sole reason Tailwind will scan it when purging classes.



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



## Testing

```bash
composer test
```



## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.



## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.



## Security Vulnerabilities

If you discover any security related issues, please email wim@wimvandeweyer.be instead of using the issue tracker.



## Credits

- [Wim Vandeweyer](https://github.com/wvandeweyer)
- [All Contributors](../../contributors)



## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
