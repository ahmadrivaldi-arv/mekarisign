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
     * The base URL for the MekariSign API.
     *
     * This configuration option sets the base URL for the MekariSign API.
     * It uses the `env` function to retrieve the value from the environment
     * variable `MEKARISIGN_BASE_URL`. If the environment variable is not set,
     * it defaults to 'https://sandbox-api.mekari.com/v2/esign/v1'.
     *
     */
    'base_url' => env('MEKARISIGN_BASE_URL', 'https://sandbox-api.mekari.com/v2/esign/v1'),

    /**
     * Configuration file for MekariSign integration.
     *
     * This file contains the configuration settings for the MekariSign service.
     *
     * The client ID for the MekariSign service, retrieved from the environment variable 'MEKARISIGN_CLIENT_ID'.
     */
    'client_id' => env('MEKARISIGN_CLIENT_ID'),

    /**
     * The client secret for the MekariSign API.
     *
     * This value is retrieved from the environment configuration using the key 'MEKARISIGN_CLIENT_SECRET'.
     * Ensure that the environment variable is set correctly in your .env file.
     */
    'client_secret' => env('MEKARISIGN_CLIENT_SECRET'),

    /**
     * The client secret for the MekariSign service.
     *
     * This value is retrieved from the environment variable 'MEKARISIGN_CLIENT_SECRET'.
     * It is used to authenticate requests to the MekariSign API.
     *
     */
    'template_id' => env('MEKARISIGN_TEMPLATE_ID'),

    /**
     * Configuration for MekariSign signer name.
     *
     * This value is retrieved from the environment variable 'MEKARISIGN_SIGNER_NAME'.
     * It is used to specify the name of the signer in the MekariSign service.
     *
     */
    'signer_name' => env('MEKARISIGN_SIGNER_NAME'),

    /**
     * The email address of the signer.
     *
     * This configuration option retrieves the signer's email address from the environment
     * variable 'MEKARISIGN_SIGNER_EMAIL'. It is used to identify the signer in the MekariSign
     * service.
     *
     */
    'signer_email' => env('MEKARISIGN_SIGNER_EMAIL'),

    /**
     * The callback URL for MekariSign.
     *
     * This URL is used by MekariSign to send callback requests to your application.
     * The value is retrieved from the environment variable 'MEKARISIGN_CALLBACK_URL'.
     *
     */
    'callback_url' => env('MEKARISIGN_CALLBACK_URL')
];
```

## Usage

see [Mekari Sign Documentation](https://documenter.getpostman.com/view/21582074/2s93K1oecc#5e54a637-aede-40f4-b07e-aa89e9ac146e) for the payloads

```php
use Ahmdrv\MekariSign\Facades\MekariSign;
use Ahmdrv\MekariSign\Services\DocumentRequest;
use Ahmdrv\MekariSign\Services\Signer;
use Ahmdrv\MekariSign\Services\Annotation;

$annotation = Annotation::make()
			->setPage(1)
			->setPosition(61, 442)
			->setElementSize(160, 52)
			->setCanvasSize(768, 542);

$signer = Signer::make('Name of the Signer')
    ->setEmail('signer@example.com')
    ->setAnnotation($annotation);

$request = DocumentRequest::make($filename)
    ->setContent($content)
    ->setTemplate($templateId)
    ->addSigner($signer)
    ->toArray();

$response = MekariSign::requestPsreSign($request);

// get document id from response
$docId = $response->getDocumentId();

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

-   [Ahmad Rivaldi](https://github.com/ahmadrivaldi-arv)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
