<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class SsnValidator
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class SsnValidator extends IsoCodesConstraintValidator
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
