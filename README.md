# SolisCloud API Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tykus/soliscloud-client.svg?style=flat-square)](https://packagist.org/packages/tykus/soliscloud-client)
[![Total Downloads](https://img.shields.io/packagist/dt/tykus/soliscloud-client.svg?style=flat-square)](https://packagist.org/packages/tykus/soliscloud-client)
![GitHub Actions](https://github.com/tykus/soliscloud-client/actions/workflows/main.yml/badge.svg)

A PHP client library for the SolisCloud API. Get data from your solar panels installation.

## Installation

You can install the package via composer:

```bash
composer require tykus/soliscloud-client
```

## Usage

```php
// Initialize the client
$client = new Tykus\SolisCloudClient($keyId, $keySecret);

// Get the current data for the given Station.
$client->getStationDetail($stationId);
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email brian@tykus.ie instead of using the issue tracker.

## Credits

-   [Brian O'Sullivan](https://github.com/tykus)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

