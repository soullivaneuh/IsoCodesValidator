<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Cif
 */
class Cif extends Constraint
{
    public $message = 'This Cif code is not valid.';
}
