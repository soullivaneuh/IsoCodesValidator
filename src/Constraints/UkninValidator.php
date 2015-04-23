<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class UkninValidator
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class UkninValidator extends IsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if ($value && !IsoCodes\Uknin::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
