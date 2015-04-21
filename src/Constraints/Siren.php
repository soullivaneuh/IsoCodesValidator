<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Siren
 */
class Siren extends Constraint
{
    public $message = 'This value is not a valid SIREN.';
}
