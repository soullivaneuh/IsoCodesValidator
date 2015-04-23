<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class InseeValidator
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class InseeValidator extends IsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if ($value && !IsoCodes\Insee::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
