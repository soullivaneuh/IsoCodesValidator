# Upgrade from 1.x to 2.0

## Deprecations

All the deprecated code introduced on 1.x is removed on 2.0.

Please read 1.x upgrade guides for more information.

See also the [diff code](https://github.com/Soullivaneuh/IsoCodesValidator/compare/1.x...v2.0.0).

## Minimal requirements

Minimal requirements have some changes:

* Symfony: 2.7 or higher
* Silex: 1.2 or higher
* PHP: 5.6 or higher
* `ronanguilloux/isocodes`: 2.1 or higher

## API closing

Constraint and validator classes are now `final` because there is no reason to override them.

## Classes removal

* `SLLH\IsoCodesValidator\Constraints\SsnValidator` does not exist anymore.

## Translations IDs

Translations IDs are changed. This could be BC break if you did an override on it.

See [#92](https://github.com/Soullivaneuh/IsoCodesValidator/pull/92).
