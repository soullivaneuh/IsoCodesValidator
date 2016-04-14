<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\AbstractIsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class SsnValidator extends AbstractIsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if (in_array('IsoCodes\IsoCodeInterface', class_implements('IsoCodes\Ssn'), true)) {
            $isValid = IsoCodes\Ssn::validate($value);
        } else { // IsoCodes 1.x BC. Should extends IsoCodesGenericValidator on next major.
            $ssn = new IsoCodes\Ssn();
            $isValid = $ssn->validate($value);
        }

        if ($value && !$isValid) {
            $this->createViolation($constraint->message);
        }
    }
}
