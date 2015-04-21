<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Vat
 */
class Vat extends Constraint
{
    public $message = 'This value is not a valid VAT.';
}
