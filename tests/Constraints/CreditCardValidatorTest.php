<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class CreditCardValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['340000000000009'],
            ['30000000000004'],
            ['6011000000000004'],
            ['38520000023237'],
            ['201400000000009'],
            ['2131000000000008'],
            ['5500000000000004'],
            ['6334000000000004'],
            ['4903010000000009'],
            ['4111111111111111'],
            ['6304100000000008'],
            [6304100000000008],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['CE1EL2LLFFF'],
            ['E31DCLLFFF'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid credit card scheme.';
    }
}
