<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\IsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class ZipCodeValidator
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class ZipCodeValidator extends IsoCodesConstraintValidator
{
    /**
     * @param mixed              $value
     * @param ZipCode|Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if (!$value) {
            return;
        }

        try {
            if ($constraint->country == ZipCode::ALL) {
                $validated = false;
                foreach (ZipCode::$countries as $country) {
                    if (IsoCodes\ZipCode::validate($value, $country)) {
                        $validated = true;
                        break;
                    }
                }
                if ($validated === false) {
                    $this->createViolation($constraint->message);
                }
            } elseif (!IsoCodes\ZipCode::validate($value, $constraint->country)) {
                $this->createViolation($constraint->message);
            }
        } catch (\InvalidArgumentException $e) {
            // Add violation instead of throwing error. Could be removed if following PR is accepted: https://github.com/ronanguilloux/IsoCodes/pull/13
            $this->createViolation($constraint->message);
        }
    }
}
