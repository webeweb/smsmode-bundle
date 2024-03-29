smsmode-bundle
==============

[![Build Status](https://img.shields.io/github/actions/workflow/status/webeweb/smsmode-bundle/build.yml?style=flat-square)](https://github.com/webeweb/smsmode-bundle/actions)
[![Coverage Status](https://img.shields.io/coveralls/github/webeweb/smsmode-bundle/master.svg?style=flat-square)](https://coveralls.io/github/webeweb/smsmode-bundle?branch=master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/quality/g/webeweb/smsmode-bundle/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/webeweb/smsmode-bundle/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/webeweb/smsmode-bundle.svg?style=flat-square)](https://packagist.org/packages/webeweb/smsmode-bundle)
[![License](https://img.shields.io/packagist/l/webeweb/smsmode-bundle.svg?style=flat-square)](https://packagist.org/packages/webeweb/smsmode-bundle)
[![composer.lock](https://img.shields.io/badge/.lock-uncommited-important.svg?style=flat-square)](https://packagist.org/packages/webeweb/smsmode-bundle)

sMsmode bundle for Symfony 4 and more.

> IMPORTANT NOTICE: This package is no longer maintained.

`sMsmode` provides an API that enables you to easily and automatically send SMS
messages from your applications. This API provides the following functions:

- sending immediate or scheduled SMS messages
- managing SMS replies
- SMS history
- deleting SMS message
- account balance
- creating sub-account
- transferring credits from one account to another one
- adding contact
- getting delivery report
- callback on delivery report update

Includes:

- [webeweb/smsmode-library](https://github.com/webeweb/smsmode-library)

If you like this package, pay me a beer (or a coffee)
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-0070ba.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)

## Compatibility

[![PHP](https://img.shields.io/packagist/php-v/webeweb/smsmode-bundle.svg?style=flat-square)](http://php.net)
[![Symfony](https://img.shields.io/badge/symfony-%5E4.4%7C%5E5.0%7C%5E6.0-brightness.svg?style=flat-square)](https://symfony.com)

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
$ composer require webeweb/smsmode-bundle
```

This command requires you to have Composer installed globally, as explained in
the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
    public function registerBundles() {
        $bundles = [
            // ...
            new WBW\Bundle\SmsModeBundle\WBWSmsModeBundle(),
        ];

        // ...

        return $bundles;
    }
```

Once the bundle is added then do:

```bash
$ php bin/console assets:install
```

Add the bundle routing in the `app/config/routing.yml` file of your project:

```yml
wbw_smsmode:
    prefix:   "/"
    resource: "@WBWSmsModeBundle/Resources/config/routing.yml"
```

## Usage

Read the [documentation](Resources/doc/index.md).

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
$ git clone https://github.com/webeweb/smsmode-bundle.git
$ cd smsmode-bundle
$ composer install
```

Once all required libraries are installed then do:

```bash
$ vendor/bin/phpunit
```

## License

`smsmode-bundle` is released under the MIT License. See the bundled [LICENSE](LICENSE)
file for details.

Please note that the sMsmode API is not free for use, see their
[product page](https://www.smsmode.com/tarifs-sms/) for details on pricing.

## Donate

If you like this work, please consider donating at
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-0070ba.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)
