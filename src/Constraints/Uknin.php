<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Uknin
 */
class Uknin extends Constraint
{
    public $message = 'This value is not a valid NINO.';
}
