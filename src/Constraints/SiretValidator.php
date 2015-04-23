<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class SiretValidator
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class SiretValidator extends IsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if ($value && !IsoCodes\Siret::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
