<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Class BbanValidator
 */
class BbanValidator extends IsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Bban) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\Bban');
        }

        if ($value && !IsoCodes\Bban::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
