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
