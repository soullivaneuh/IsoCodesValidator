<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class SirenValidator
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class SirenValidator extends IsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if ($value && !IsoCodes\Siren::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
