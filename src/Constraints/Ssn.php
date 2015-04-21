<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Ssn
 */
class Ssn extends Constraint
{
    public $message = 'This value is not a valid SSN.';
}
