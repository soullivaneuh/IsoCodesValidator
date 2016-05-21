# CHANGELOG

* 3.0.0 (2016-05-21)

 * Move translations files from `Resources/translations` to `translations`.
 * Some classes are now final. Check UPGRADE-3.0.md for mor details.
 * Remove classes from deprecated `Bundle` namespace.
 * Remove classes from deprecated `Provider` namespace.
 * Remove deprecated `IsoCodesGeneric` class.

* 2.1.0 (2016-05-21)

 * Add `Mac` constraint.
 * Add `Ean8` constraint.
 * Add `ValidatorNotExistsException`.
 * Deprecate `IsoCodesGeneric` abstract class.
 * Move Silex and Symfony integrations classes onto `Bridge` namespace.

* 2.0.0 (2016-04-15)

 * Make PHP 5.6 as a minimum requirement.
 * Make Symfony 2.7 LTS as a minimum requirement.
 * Make Silex 1.2 as a minimum requirement.
 * Make `ronanguilloux/isocodes` 2.1 as a minimum requirement.
 * Remove deprecated `IsoCodesConstraintValidator` interface.
 * Remove deprecated `ZipCode` country option values.
 * Remove deprecated validators introduced in [#44](https://github.com/Soullivaneuh/IsoCodesValidator/pull/44)
 * Make translations ids more human readable.
 * `Ssn` constraint now inherit from `IsoCodesGeneric`. Generic validator is used instead.

* 1.2.3 (2016-04-14)

 * Add `ronanguilloux/isocodes` `2.x` compatibility.

* 1.2.2 (2016-04-14)

 * Fix some french translations.

* 1.2.1 (2015-11-17)

 * Allow Symfony3 requirement.

* 1.2.0 (2015-10-27)

 * Factor simple IsoCodes validators by adding a generic one.

* 1.1.1 (2015-07-23)

 * Fix not silenced deprecation notices.

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
