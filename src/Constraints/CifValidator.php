<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Class CifValidator
 */
class CifValidator extends IsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Cif) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\Cif');
        }

        if ($value && !IsoCodes\Cif::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
