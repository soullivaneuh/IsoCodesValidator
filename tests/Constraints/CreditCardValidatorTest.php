<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class CreditCardValidatorTest extends AbstractGenericConstraintValidatorTest
{
    public function getValidValues()
    {
        // To be removed when https://github.com/ronanguilloux/IsoCodes/pull/93 will be merged.
        return array_filter(parent::getValidValues(), function ($value) {
            return is_string($value[0]);
        });
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid credit card scheme.';
    }
}
