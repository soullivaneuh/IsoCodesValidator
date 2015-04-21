<?php

namespace SLLH\IsoCodesValidator\Constraints;

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
        return array(
            array('340000000000009'),
            array('30000000000004'),
            array('6011000000000004'),
            array('38520000023237'),
            array('201400000000009'),
            array('2131000000000008'),
            array('5500000000000004'),
            array('6334000000000004'),
            array('4903010000000009'),
            array('4111111111111111'),
            array('6304100000000008'),
            array(6304100000000008),
        );
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new CreditCard());

        $this->buildViolation('This CreditCard scheme is not valid.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return array(
            array('CE1EL2LLFFF'),
            array('E31DCLLFFF'),
            array(' ')
        );
    }
}
