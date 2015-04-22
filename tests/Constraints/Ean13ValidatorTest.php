<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Ean13;
use SLLH\IsoCodesValidator\Constraints\Ean13Validator;

class Ean13ValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new Ean13Validator();
    }

    protected function createConstraint()
    {
        return new Ean13();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Ean13());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return array(
            array('4719512002889'),
            array('9782868890061'),
            array('4006381333931'),
            array('978-2-1234-5680-3'),
            array('4719-5120-0288-9'),
            array('978 2 1234 5680 3'),
        );
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Ean13());

        $this->buildViolation('This EAN 13 code is not valid.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return array(
            array(2266111566),
            array('2266111566'),
            array('A782868890061'),
            array('4006381333932'),
            array('4719.5120.0288.9'),
            array(' ')
        );
    }
}
