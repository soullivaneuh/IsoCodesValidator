# Upgrade from 1.0 to 1.1

## Symfony and Silex integration

To simplify project dependencies, Symfony and Silex integration systems are now inside the project itself.

Class namespaces are changed on some composer modification has to be done.

### Symfony integration

If your project **is not using** [Symfony Full Stack](http://symfony.com/projects/symfonyfs),
you must add the following dependencies:

```bash
composer require symfony/dependency-injection symfony/http-kernel symfony/finder
```

Replace `sllh/iso-codes-validator-bundle` by `sllh/iso-codes-validator` (`~1.1`)
on your `composer.json` file.

Change bundle namespace and your code.

Before:

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new SLLH\IsoCodesValidatorBundle\SLLHIsoCodesValidatorBundle(),
    );
}
```

After:

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new SLLH\IsoCodesValidator\Bundle\SLLHIsoCodesValidatorBundle(),
    );
}
```

### Silex integration

Replace `sllh/iso-codes-validator-service-provider` by `sllh/iso-codes-validator` (`~1.1`)
on your `composer.json` file.

Change service provider namespace and your code.

Before:

```php
use SLLH\Provider\IsoCodesValidatorServiceProvider;

$app->register(new IsoCodesValidatorServiceProvider());
```

After:

```php
use SLLH\IsoCodesValidator\Provider\IsoCodesValidatorServiceProvider;

$app->register(new IsoCodesValidatorServiceProvider());
```

## ConstraintValidator base class

`IsoCodesConstraintValidator` abstract class is deprecated in favor of `AbstractIsoCodesConstraintValidator`
to match Symfony coding style rules.

`IsoCodesConstraintValidator` will be removed in 2.0.

Before:

```php
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;

class CustomValidator extends IsoCodesConstraintValidator
{
    // ...
}
```

After:

```php
use SLLH\IsoCodesValidator\AbstractIsoCodesConstraintValidator;

class CustomValidator extends AbstractIsoCodesConstraintValidator
{
    // ...
}
```

## ZipCode validator country option

ZipCode validator was refactored to get benefit of
[new country code patterns](https://github.com/ronanguilloux/IsoCodes/blob/1.2.0/src/IsoCodes/ZipCode.php#L27-L203).

Because of that, `Canada`, `France` and `Netherlands` country options are now deprecated.

Use country codes equivalent instead: `CA`, `FR` and `NL`.

The `US` option still the same, but the related constant will be removed in 2.0.
