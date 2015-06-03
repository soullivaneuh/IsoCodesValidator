<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\AbstractIsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class Ean13Validator.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class Ean13Validator extends AbstractIsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if ($value && !IsoCodes\Ean13::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
