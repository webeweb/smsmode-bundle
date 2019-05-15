smsmode-bundle
==============

[![Build Status](https://travis-ci.com/webeweb/smsmode-bundle.svg?branch=master)](https://travis-ci.com/webeweb/smsmode-bundle)
[![Coverage Status](https://coveralls.io/repos/github/webeweb/smsmode-bundle/badge.svg?branch=master)](https://coveralls.io/github/webeweb/smsmode-bundle?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webeweb/smsmode-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/webeweb/smsmode-bundle/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/webeweb/smsmode-bundle/v/stable)](https://packagist.org/packages/webeweb/smsmode-bundle)
[![Latest Unstable Version](https://poser.pugx.org/webeweb/smsmode-bundle/v/unstable)](https://packagist.org/packages/webeweb/smsmode-bundle)
[![License](https://poser.pugx.org/webeweb/smsmode-bundle/license)](https://packagist.org/packages/webeweb/smsmode-bundle)
[![composer.lock](https://poser.pugx.org/webeweb/smsmode-bundle/composerlock)](https://packagist.org/packages/webeweb/smsmode-bundle)

sMsmode bundle for Symfony 2 and more.

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

---

## Compatibility

[![PHP](https://img.shields.io/badge/PHP-%5E5.6%7C%5E7.0-blue.svg)](http://php.net)
[![Symfony](https://img.shields.io/badge/Symfony-%5E2.7%7C%5E3.0%7C%5E4.0-brightgreen.svg)](https://symfony.com)

---

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
$ composer require webeweb/smsmode-bundle "^1.0"
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
            new WBW\Bundle\SMSModeBundle\WBWSMSModeBundle(),
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
    resource: "@WBWSMSModeBundle/Resources/config/routing.yml"
```

---

## Usage

Read the [documentation](DOCUMENTATION.md).

---

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

---

## License

`smsmode-bundle` is released under the LGPL License. See the bundled [LICENSE](LICENSE)
file for details.

Please note that the sMsmode API is not free for use, see their
[product page](https://www.smsmode.com/tarifs-sms/) for details on pricing.
