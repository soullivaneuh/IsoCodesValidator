# Upgrade from 1.1 to 1.2

## Deprecated validator

The `IsoCodesGenericValidator` was introduced in order to factoring validators with same `IsoCodes::validate()` logic.

The following validator classes are now deprecated:

* `BbanValidator`
* `CifValidator`
* `CreditCardValidator`
* `Ean13Validator`
* `IbanValidator`
* `InseeValidator`
* `NifValidator`
* `SirenValidator`
* `SiretValidator`
* `StructuredCommunicationValidator`
* `SwiftBicValidator`
* `UkninValidator`
* `VatValidator`

Use `IsoCodesGenericValidator` instead.
