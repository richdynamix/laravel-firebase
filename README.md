# Laravel-Firebase

[![Latest Version on Packagist](https://img.shields.io/packagist/v/richdynamix/laravel-firebase.svg?style=flat-square)](https://packagist.org/packages/richdynamix/laravel-firebase)
[![Build Status](https://img.shields.io/travis/richdynamix/laravel-firebase/master.svg?style=flat-square)](https://travis-ci.org/richdynamix/laravel-firebase)
[![Quality Score](https://img.shields.io/scrutinizer/g/richdynamix/laravel-firebase.svg?style=flat-square)](https://scrutinizer-ci.com/g/richdynamix/laravel-firebase)
[![Total Downloads](https://img.shields.io/packagist/dt/richdynamix/laravel-firebase.svg?style=flat-square)](https://packagist.org/packages/richdynamix/laravel-firebase)

At present the package provides no more than a convenient wrapper to the kreait/firebase-php package for interacting with Firebase Realtime Database.

## Installation

You can install the package via composer:

```bash
composer require richdynamix/laravel-firebase
```

## Usage

``` php
use Richdynamix\LaravelFirebase\Firebase;

$firebase = Firebase::getDatabase();

```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email steven@digitonic.co.uk instead of using the issue tracker.

## Credits

- [Steven Richardson](https://github.com/richdynamix)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).