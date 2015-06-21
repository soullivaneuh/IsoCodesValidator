<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\CreditCard;
use SLLH\IsoCodesValidator\Constraints\CreditCardValidator;

class CreditCardValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new CreditCardValidator();
    }

    protected function createConstraint()
    {
        return new CreditCard();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new CreditCard());
        $this->assertNoViolation();
    }

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
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new CreditCard());

        $this->buildViolation('This value is not a valid credit card scheme.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            ['CE1EL2LLFFF'],
            ['E31DCLLFFF'],
            [' '],
        ];
    }
}
