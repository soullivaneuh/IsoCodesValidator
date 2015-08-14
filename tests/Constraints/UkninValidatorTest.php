<?php

namespace SLLH\IsoCodesValidator\tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Uknin;
use SLLH\IsoCodesValidator\Constraints\UkninValidator;

class UkninValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new UkninValidator();
    }

    protected function createConstraint()
    {
        return new Uknin();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Uknin());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return [
            ['AB123456C'],
            ['EH123456A'],
            ['HG123456B'],
        ];
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Uknin());

        $this->buildViolation('This value is not a valid NINO.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            ['AD123456CA'],
            ['AD12345C'],
            ['AD123456'],
            ['AF123456C'],
            ['AB123456F'],
            ['TN011258F'],
            [' '],
            ['azertyuiop'],
        ];
    }
}
