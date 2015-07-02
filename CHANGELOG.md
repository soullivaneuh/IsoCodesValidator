# CHANGELOG

* 2.0.0 (2015-??-??)

 * Make Symfony 2.7 LTS as a minimum requirement.
 * Make Silex 1.2 as a minimum requirement.
 * Remove deprecated `IsoCodesConstraintValidator` interface.
 * Remove deprecated `ZipCode` country option values.

* 1.2.0 (2015-??-??)

 * Factor simple IsoCodes validators by adding a generic one.

* 1.1.0 (2015-06-27)

 * Bump `ronanguilloux/isocodes` package to `~1.2`.
 * Deprecate `IsoCodesConstraintValidator` in favor of `AbstractIsoCodesConstraintValidator`.
 * Add `CreditCard` constraint.
 * Add `Ip` constraint.
 * Add `Iban` constraint.
 * Add `Isbn` constraint.
 * Refactor `ZipCode` to get new countries option. See related PR: [ronanguilloux/IsoCodes#38](https://github.com/ronanguilloux/IsoCodes/pull/38)
 * Make Symfony and Silex integration internal on this project.

* 1.0.5 (2015-06-27)

 * Fix invalid translation source on zip code

* 1.0.4 (2015-06-23)

 * Fix deprecation issues for ZipCode validator and Symfony validator context.

* 1.0.3 (2015-06-02)

 * Add .gitattributes to ignore useless files on export.

* 1.0.2 (2015-05-01)

 * Add `sllh/iso-codes-validator-bundle` and `sllh/iso-codes-validator-service-provider` suggest on composer.json

* 1.0.1 (2015-04-30)

 * Simplify ZipCode validator (ronanguilloux/isocodes >=1.1.4 required)
 * PHP >= 5.4 is the new requirement
 * Short syntax arrays introduced
