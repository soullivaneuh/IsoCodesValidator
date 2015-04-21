<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class CreditCardValidator
 */
class CreditCardValidator extends IsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if ($value && !IsoCodes\CreditCard::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
