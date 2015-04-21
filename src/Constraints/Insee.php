<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Insee
 */
class Insee extends Constraint
{
    public $message = 'This INSEE number is not valid.';
}
