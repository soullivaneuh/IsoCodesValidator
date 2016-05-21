# Upgrade from 2.x to 3.0

## Deprecations

All the deprecated code introduced on 2.x is removed on 3.0.

Please read 2.x upgrade guides for more information.

See also the [diff code](https://github.com/Soullivaneuh/IsoCodesValidator/compare/2.x...v3.0.0).

## Translations files move

The translations file was moved from `Resources/translations` to `translations`.

Developers using the Symfony or Silex integration should not be impacted.

## API closing

Some classes are now `final` you should not override them:

* `IsoCodesValidatorSilex1ServiceProvider`
* `SLLHIsoCodesValidatorBundle`
* `TranslationPass`
* `IsoCodesGenericValidator`
* Some test classes
