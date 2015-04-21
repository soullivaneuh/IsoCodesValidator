<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Ean13
 */
class Ean13 extends Constraint
{
    public $message = 'This EAN 13 code is not valid.';
}
