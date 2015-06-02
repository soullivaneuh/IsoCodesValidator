<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class SwiftBicValidator.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class SwiftBicValidator extends IsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if ($value && !IsoCodes\SwiftBic::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
