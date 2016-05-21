# IsoCodesValidator

Symfony validator wrapper of [IsoCodes](https://github.com/ronanguilloux/IsoCodes) project.

[![Latest Stable Version](https://poser.pugx.org/sllh/iso-codes-validator/v/stable)](https://packagist.org/packages/sllh/iso-codes-validator)
[![Latest Unstable Version](https://poser.pugx.org/sllh/iso-codes-validator/v/unstable)](https://packagist.org/packages/sllh/iso-codes-validator)
[![License](https://poser.pugx.org/sllh/iso-codes-validator/license)](https://packagist.org/packages/sllh/iso-codes-validator)
[![Dependency Status](https://www.versioneye.com/php/sllh:iso-codes-validator/badge.svg)](https://www.versioneye.com/php/sllh:iso-codes-validator)
[![Reference Status](https://www.versioneye.com/php/sllh:iso-codes-validator/reference_badge.svg)](https://www.versioneye.com/php/sllh:iso-codes-validator/references)

[![Total Downloads](https://poser.pugx.org/sllh/iso-codes-validator/downloads)](https://packagist.org/packages/sllh/iso-codes-validator)
[![Monthly Downloads](https://poser.pugx.org/sllh/iso-codes-validator/d/monthly)](https://packagist.org/packages/sllh/iso-codes-validator)
[![Daily Downloads](https://poser.pugx.org/sllh/iso-codes-validator/d/daily)](https://packagist.org/packages/sllh/iso-codes-validator)

[![Build Status](https://travis-ci.org/Soullivaneuh/IsoCodesValidator.svg?branch=3.x)](https://travis-ci.org/Soullivaneuh/IsoCodesValidator)
[![AppVeyor Status](https://ci.appveyor.com/api/projects/status/6ha1gcdv6uwg4ukc/branch/3.x?svg=true)](https://ci.appveyor.com/project/Soullivaneuh/isocodesvalidator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Soullivaneuh/IsoCodesValidator/badges/quality-score.png?b=3.x)](https://scrutinizer-ci.com/g/Soullivaneuh/IsoCodesValidator/?branch=3.x)
[![Code Climate](https://codeclimate.com/github/Soullivaneuh/IsoCodesValidator/badges/gpa.svg)](https://codeclimate.com/github/Soullivaneuh/IsoCodesValidator)
[![Coverage Status](https://coveralls.io/repos/Soullivaneuh/IsoCodesValidator/badge.svg?branch=3.x)](https://coveralls.io/r/Soullivaneuh/IsoCodesValidator?branch=3.x)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/15e2cfed-cfb8-4856-ac0d-92768fc0c324/mini.png)](https://insight.sensiolabs.com/projects/15e2cfed-cfb8-4856-ac0d-92768fc0c324)

## Documentation

All the installation and usage instructions are located in this README.
Check it for specific version:

* [__4.x__(unstable)](https://github.com/Soullivaneuh/IsoCodesValidator/tree/master) with support for Symfony `^2.7|^3.0` and Silex `^1.2|^2.0`
* [__3.x__](https://github.com/Soullivaneuh/IsoCodesValidator/tree/3.x) with support for Symfony `^2.7|^3.0` and Silex `^1.2|^2.0`
* [__2.x__](https://github.com/Soullivaneuh/IsoCodesValidator/tree/2.x) with support for Symfony `^2.7|^3.0` and Silex `^1.2|^2.0`
* [__1.x__](https://github.com/Soullivaneuh/IsoCodesValidator/tree/1.x) with support for Symfony `^2.3|^3.0` and Silex `^1.1`

## Prerequisites

This version of the project requires:

* PHP 5.6+ or 7.0+
* Symfony Validator component 2.7+
* Symfony 2.7+ or 3.0+ for bundle integration
* Silex 1.2+ for service provider integration

## Installation

First of all, you need to require this library through composer:

``` bash
$ composer require sllh/iso-codes-validator
```

After this, you can use it as is.

If you are using it on a **Symfony** or **Silex** project,
you should read the following instructions for a better integration.

### As a Symfony bundle

If your project **is not using** [Symfony Full Stack](http://symfony.com/projects/symfonyfs),
you must add the following dependencies:

```bash
$ composer require symfony/dependency-injection symfony/http-kernel symfony/finder
```

#### Translations

If you wish to use default validator messages translations in this bundle,
you have to make sure you have translator enabled in your config.

``` yaml
# app/config/config.yml

framework:
    translator: ~
```

#### Enable the bundle

``` php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new SLLH\IsoCodesValidator\Bridge\Symfony\Bundle\SLLHIsoCodesValidatorBundle(),
    );
}
```

### As a Silex service provider

Add Silex dependency on your project:

```bash
$ composer require silex/silex
```

#### Register the service

##### Silex 1.x

```php
use Silex\Provider\TranslationServiceProvider();
use SLLH\IsoCodesValidator\Bridge\Silex\IsoCodesValidatorSilex1ServiceProvider;

// Get translation working
$app->register(new TranslationServiceProvider());

// Register the provider
$app->register(new IsoCodesValidatorSilex1ServiceProvider());
```

##### Silex 2.x

```php
use Silex\Provider\LocaleServiceProvider();
use Silex\Provider\TranslationServiceProvider();
use SLLH\IsoCodesValidator\Bridge\Silex\IsoCodesValidatorServiceProvider();

// Get translation working
$app->register(new LocaleServiceProvider());
$app->register(new TranslationServiceProvider(), array(
    'locale_fallbacks' => array('en'),
));

// Register the provider
$app->register(new IsoCodesValidatorServiceProvider());
```

## Usage

IsoCodesValidator is based on Symfony [Validator](http://symfony.com/components/Validator) library.

### Manual usage

Create and use IsoCodes constraints by using the Symfony [Validation](https://github.com/symfony/Validator#usage) class:

```php
use Symfony\Component\Validator\Validation;
use SLLH\IsoCodesValidator\Constraints\Vat;

$validator = Validation::createValidator();

$violations = $validator->validateValue('DE123456789', new Vat());
```

### With annotations

> Validation of objects is possible using "constraint mapping".
With such a mapping you can put constraints onto properties and objects of classes.
Whenever an object of this class is validated, its properties and method results are matched against the constraints.

```php
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use SLLH\IsoCodesValidator\Constraints as IsoCodesAssert;

class Company
{
    /**
     * @Assert\NotBlank
     * @IsoCodesAssert\Siret
     */
    private $siret;

    /**
     * @Assert\NotBlank
     * @IsoCodesAssert\Siren
     */
    private $siren;

    /**
     * @IsoCodesAssert\Vat
     */
    private $vat;

    /**
     * @IsoCodesAssert\ZipCode(country = "France")
     */
    private $zipCode;

    public function __construct($siret, $siren, $vat, $zipCode)
    {
        $this->siret = $siret;
        $this->siren = $siren;
        $this->vat = $vat;
        $this->zipCode = $zipCode
    }
}

$validator = Validation::createValidatorBuilder()
    ->enableAnnotationMapping()
    ->getValidator();

$company = new Company('48853781200015', '432167567', 'DE123456789', '59000');

$violations = $validator->validate($company);
```

### Silex method

> You can validate values directly using the validateValue validator method

```php
use SLLH\IsoCodesValidator\Constraints as IsoCodesAssert;

$app->get('/validate/{vat}', function ($vat) use ($app) {
    $errors = $app['validator']->validateValue($vat, new IsoCodesAssert\Vat());

    if (count($errors) > 0) {
        return (string) $errors;
    } else {
        return 'The VAT is valid';
    }
});
```

More implementations could be found on official [Silex Validator usage](http://silex.sensiolabs.org/doc/providers/validator.html#usage) documentation.

Remember to replace `Assert` by `IsoCodesAssert` with the correct import statement.

## Constraints reference

Constraints classes can be found on [src/Constraints](src/Constraints).

All works "as is" without any options unless `message`.

Only [ZipCode](src/Constraints/ZipCode.php) constraint
accept a `country` option to limit validation ('all' by default).

Please note that some [IsoCodes](https://github.com/ronanguilloux/IsoCodes/tree/master/src/IsoCodes) classes
are already implemented on [Symfony Validator component](http://symfony.com/doc/current/reference/constraints.html).
It's up to you to decide which one to use.

If you think an IsoCodes class is missing, feel free to open an issue or make a PR.

## License

This bundle is under the MIT license. See the complete license on the [LICENSE](LICENSE) file.

## TODO

 * Try to implement [OrganismeType12NormeB2](https://github.com/ronanguilloux/IsoCodes/blob/master/src/IsoCodes/OrganismeType12NormeB2.php) (Maybe with a special form type?)
 * Implement and test xml/yaml assert config for Symfony: http://symfony.com/doc/current/book/validation.html#the-basics-of-validation
