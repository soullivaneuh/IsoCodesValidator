<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class CreditCard
 */
class CreditCard extends Constraint
{
    public $message = 'This credit card scheme is not valid.';
}
