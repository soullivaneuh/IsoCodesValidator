<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Cif
 */
class Cif extends Constraint
{
    public $message = 'This value is not a valid CIF.';
}
