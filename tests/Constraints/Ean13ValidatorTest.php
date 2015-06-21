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
        return [
            ['4719512002889'],
            ['9782868890061'],
            ['4006381333931'],
            ['978-2-1234-5680-3'],
            ['4719-5120-0288-9'],
            ['978 2 1234 5680 3'],
        ];
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
        return [
            [2266111566],
            ['2266111566'],
            ['A782868890061'],
            ['4006381333932'],
            ['4719.5120.0288.9'],
            [' '],
        ];
    }
}
