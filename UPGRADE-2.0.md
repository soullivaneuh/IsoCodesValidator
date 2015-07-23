# Upgrade from 1.x to 2.0

## Symfony requirement

This version need now Symfony 2.7 LTS as a minimum requirement.

## Silex requirement

This version need now Silex 2.0 as a minimum requirement.

## API closing

Constraint and validator classes are now `final` because there is no reason to override them.

## Deprecations

All deprecated code introduced on 1.x are removed on 2.0.

Please read 1.x upgrade guides for more information.

## Classes removal

* `SLLH\IsoCodesValidator\Constraints\SsnValidator` does not exist anymore.
