# socialite-stripe

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

**Note:** Replace ```Max Fetisov``` ```kovalski``` ```http://arsum.com``` ```max.fetisov@arsum.com``` ```arsumcom``` ```socialite-stripe``` ```:package_description``` with their correct values in [README.md](README.md), [CHANGELOG.md](CHANGELOG.md), [CONTRIBUTING.md](CONTRIBUTING.md), [LICENSE.md](LICENSE.md) and [composer.json](composer.json) files, then delete this line.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require arsumcom/socialite-stripe
```

## Configuration

After installing the SocialiteStripe library, register the `ArsumCom\SocialiteStripe\SocialiteStripeServiceProvider` in your `config/app.php` configuration file:

```php
'providers' => [
    // Other service providers...

    ArsumCom\SocialiteStripe\SocialiteStripeServiceProvider::class,
],
```

You will also need to add credentials for the OAuth services your application utilizes. These credentials should be placed in your `config/services.php` configuration file, and should use the key `stripe`. For example:
```php
'stripe' => [
    'client_id' => env('STRIPE_CLIENT_ID', 'your-stripe-app-id'),
    'client_secret' => env('STRIPE_CLIENT_SECRET', 'your-stripe-app-secret'),
    'redirect' => env('STRIPE_REDIRECT', 'http://your-callback-url'),
],
```
## Basic Usage

https://github.com/laravel/socialite#basic-usage

## Security

If you discover any security related issues, please email max.fetisov@arsum.com instead of using the issue tracker.

## Credits

- [Max Fetisov][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/arsumcom/socialite-stripe.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/arsumcom/socialite-stripe/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/arsumcom/socialite-stripe.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/arsumcom/socialite-stripe.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/arsumcom/socialite-stripe.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/arsumcom/socialite-stripe
[link-travis]: https://travis-ci.org/arsumcom/socialite-stripe
[link-scrutinizer]: https://scrutinizer-ci.com/g/arsumcom/socialite-stripe/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/arsumcom/socialite-stripe
[link-downloads]: https://packagist.org/packages/arsumcom/socialite-stripe
[link-author]: https://github.com/kovalski
[link-contributors]: ../../contributors
