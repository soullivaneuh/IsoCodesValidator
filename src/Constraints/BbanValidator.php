<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes\Bban;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class BbanValidator
 */
class BbanValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!Bban::validate($value)) {
            $this->context->addViolation($constraint->message);
        }
    }
}
