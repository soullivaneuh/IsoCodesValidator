<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\AbstractIsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class ZipCodeValidator extends AbstractIsoCodesConstraintValidator
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

        if (ZipCode::ALL == $constraint->country) {
            $validated = false;
            foreach (IsoCodes\ZipCode::getAvailableCountries() as $country) {
                if (IsoCodes\ZipCode::validate($value, $country)) {
                    $validated = true;

                    break;
                }
            }
            if (false === $validated) {
                $this->createViolation($constraint->message);
            }
        } elseif (!IsoCodes\ZipCode::validate($value, $constraint->country)) {
            $this->createViolation($constraint->message);
        }
    }
}
