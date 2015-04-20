<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Bban
 */
class Bban extends Constraint
{
    public $message = 'This Bban code is not valid.';
}
