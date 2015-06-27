# CHANGELOG

* 1.1.0 (2015-??-??)

 * Bump `ronanguilloux/isocodes` package to `~1.2`.
 * Deprecate `IsoCodesConstraintValidator` in favor of `AbstractIsoCodesConstraintValidator`.
 * Add `CreditCard` constraint.
 * Add `Ip` constraint.
 * Add `Iban` constraint.
 * Add `Isbn` constraint.
 * Refactor `ZipCode` to get new countries option. See related PR: [ronanguilloux/IsoCodes#38](https://github.com/ronanguilloux/IsoCodes/pull/38)
 * Make Symfony and Silex integration internal on this project.

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
