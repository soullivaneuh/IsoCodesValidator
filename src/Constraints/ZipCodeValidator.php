<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\AbstractIsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class ZipCodeValidator extends AbstractIsoCodesConstraintValidator
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

        if ($constraint->country == ZipCode::ALL) {
            $validated = false;
            foreach (ZipCode::$countries as $country) {
                if ($this->validateCountry($value, $country)) {
                    $validated = true;
                    break;
                }
            }
            if ($validated === false) {
                $this->createViolation($constraint->message);
            }
        } elseif (!$this->validateCountry($value, $constraint->country)) {
            $this->createViolation($constraint->message);
        }
    }

    /**
     * @deprecated To be removed when bumping requirements to ronanguilloux/isocodes ~1.2
     *
     * @param mixed  $value
     * @param string $country
     *
     * @return bool
     */
    private function validateCountry($value, $country)
    {
        $deprecatedOptionsBridge = [
            'US'            => 'US',
            'Canada'        => 'CA',
            'France'        => 'FR',
            'Netherlands'   => 'NL',
        ];

        return IsoCodes\ZipCode::validate($value, $deprecatedOptionsBridge[$country]);
    }
}
