# Upgrade from 1.0 to 1.1

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
