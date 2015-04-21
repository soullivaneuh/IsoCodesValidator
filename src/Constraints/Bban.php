<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Bban
 */
class Bban extends Constraint
{
    public $message = 'This BBAN code is not valid.';
}
