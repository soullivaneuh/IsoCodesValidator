<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class CifValidator
 */
class CifValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if ($value && !IsoCodes\Cif::validate($value)) {
            $this->context->addViolation($constraint->message);
        }
    }
}
