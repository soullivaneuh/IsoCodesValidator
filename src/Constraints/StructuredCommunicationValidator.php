<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class StructuredCommunication
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class StructuredCommunicationValidator extends IsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if ($value && !IsoCodes\StructuredCommunication::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
