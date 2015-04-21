<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Cif
 */
class Cif extends Constraint
{
    public $message = 'This CIF code is not valid.';
}
