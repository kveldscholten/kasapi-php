# kasapi-php

[![Latest Stable Version](https://img.shields.io/packagist/v/kveldscholten/kasapi-php.svg)](https://packagist.org/packages/kveldscholten/kasapi-php)
[![GitHub](https://img.shields.io/github/license/kveldscholten/kasapi-php)](https://github.com/kveldscholten/kasapi-php/blob/master/LICENSE.md)

## Manage your All-Inkl account with the KAS API for PHP

All-Inkl.com provides an API for automated access to all your accounts, settings, (sub-)domains, databases, cronjobs, mail accounts, ...
This API is called the *KAS API*. To learn more about it, visit the official [KAS API Documentation](http://kasapi.kasserver.com/dokumentation/phpdoc/).
There are also some [example forms](http://kasapi.kasserver.com/dokumentation/?open=beispiele) to try out.

This is a PHP implementation of the API, which provides simple access to all functions provided by the API.

### Requirements

- [PHP >= 7.0](http://php.net/)
- [JSON Extension](https://www.php.net/manual/en/book.json.php)
- [SOAP Extension](https://www.php.net/manual/en/book.soap.php)

## Installation

The recommended installation method is to use Composer. This software is [available at Packagist](https://packagist.org/packages/kveldscholten/kasapi-php).

```
 composer require kveldscholten/kasapi-php
```

Alternatively you can clone the following Git repository (`git clone https://github.com/kveldscholten/kasapi-php.git`, see below).

## Usage

Now, we will take a closer look at how this API works.

Whenever you want to use the API, you need to create a KasConfiguration object first. This is done easily:
```php
$kasConfiguration = new KasApi\KasConfiguration($login, $authData, $authType);
```
`$login` is quite self explaining. The KAS API allows for different types of authentication. Thus, you need to specify an authentication type and the corresponding authentication data. Have a look at the documentation of All-Inkl to obtain a list of possible authentication methods.

As an example, assume you want to use `plain` as authentication method. In this case, `$authType` simply would be `plain`, and `$authData` should be set to the plain Password of your KAS account. Assuming your login is `w0123456` and your password is `password`, the following line would create the correct credential object:
```php
$kasConfiguration = new KasApi\KasConfiguration("w0123456", "password", "plain");
```
Next, you need to create an KasApi object to operate on:
```php
$kasApi = new KasApi\KasApi($kasConfiguration);
```
On this object, you can call any API method specified in the [KAS documentation](http://kasapi.kasserver.com/dokumentation/phpdoc/packages/API%20Funktionen.html). Alternatively, you can have a look at the KasApi class.
```php
$kasApi->get_databases();
```

Examples from the KasApi class might look like this:

```php
protected $functions = [
  [...]
  'get_dns_settings'        => 'zone_host!, record_id',
  'get_domains'             => 'domain_name',
  'get_topleveldomains'     => '',
  'get_ftpusers'            => 'ftp_login',
  'get_mailaccounts'        => 'mail_login',
  [...]
];
```
This array specifies which API functions you may call and which parameters to pass. The `!` suffix means that this parameter is required and has to be specified (e.g. `zone_host!`), all other parameters are optional (e.g. `domain_name`).

So if you look at `get_dns_settings` above, you see that a call like
```php
$kasApi->get_dns_settings([
  'zone_host' => 'example.com.',
  'record_id' => 123
]);
```
is perfectly valid.

## Usage without Composer

Here's an example of how to use the API if you just `git clone` this repository:
(Place this file in the parent directory of the `src` directory.)
```php
<?php

namespace KasApi;

foreach (glob("src/KasApi/*.php") as $filename) {
    require_once $filename; // include kasapi-php
}

try {
  $kasConfiguration = new KasConfiguration("w0123456", "password", "plain");
  $kasApi = new KasApi($kasConfiguration);

  $kasData = $kasApi->get_domains(); // any API function as described above
} catch(KasApiException $e) {
  echo $e->getFaultstring(); // show SOAP error
}

var_dump($kasData); // $kasData is a plain old PHP array

?>
```

## Feedback? Issues?
If you have any feedback, please provide it as comment or [create an issue](https://github.com/kveldscholten/kasapi-php/issue).

## Credits

- [Elias Kuiter](https://github.com/ekuiter/) created `kasapi-php` to provide an easy way to access All-Inkl's public API.
- [Daniel Herrmann](https://github.com/waza-ari/) as well for making big extensions to the API (such as streamlining the classes, correcting some errors and adding Composer integration).

## License

kasapi-php is available as open source under the terms of the [MIT License](https://github.com/kveldscholten/kasapi-php/blob/master/LICENSE.md).
