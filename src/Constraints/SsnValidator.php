<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\AbstractIsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class SsnValidator extends AbstractIsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        // Have to instantiate it. See: https://github.com/ronanguilloux/IsoCodes/issues/12
        $ssn = new IsoCodes\Ssn();

        if ($value && !$ssn->validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
