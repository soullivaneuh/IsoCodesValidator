<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Siret
 */
class Siret extends Constraint
{
    public $message = 'This value is not a valid SIRET.';
}
