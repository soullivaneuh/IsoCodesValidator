<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class NifValidator.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class NifValidator extends IsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if ($value && !IsoCodes\Nif::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
