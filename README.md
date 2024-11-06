# PHP library for www.mekarisign.com

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ahmadrivaldi-arv/mekarisign.svg?style=flat-square)](https://packagist.org/packages/ahmadrivaldi-arv/mekarisign)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ahmadrivaldi-arv/mekarisign/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ahmadrivaldi-arv/mekarisign/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ahmadrivaldi-arv/mekarisign/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ahmadrivaldi-arv/mekarisign/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ahmadrivaldi-arv/mekarisign.svg?style=flat-square)](https://packagist.org/packages/ahmadrivaldi-arv/mekarisign)


## Installation

You can install the package via composer:

```bash
composer require ahmadrivaldi-arv/mekarisign
```


You can publish the config file with:

```bash
php artisan vendor:publish --tag="mekarisign-config"
```

This is the contents of the published config file:

```php
return [

    /**
     * API endpoint mekari sign
     */
    "base_url" => env("MEKARISIGN_BASE_URL", "https://sandbox-api.mekari.com/v2/esign/v1"),

    /**
     * API client id from [developers,sandbox].mekarisign.com
     */
    "client_id" => env("MEKARISIGN_CLIENT_ID"),

    /**
     * API client secret from [developers,sandbox].mekarisign.com
     */
    "client_secret" => env("MEKARISIGN_CLIENT_SECRET"),

    "template_id" => env("MEKARISIGN_TEMPLATE_ID"),
];
```


## Usage

see [Mekari Sign Documentation](https://documenter.getpostman.com/view/21582074/2s93K1oecc#5e54a637-aede-40f4-b07e-aa89e9ac146e) for the payloads

```php
$psreAutoSign = new \Ahmdrv\MekariSign\MekariSign;
$payload = []; // see mekari documentation

$pasreAutoSign->requestPsreSign($payload);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ahmad Rivaldi](https://github.com/ahmadrivaldi-arv)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
