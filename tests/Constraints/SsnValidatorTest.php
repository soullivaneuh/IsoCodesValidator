<?php

namespace SLLH\IsoCodesValidator\tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Ssn;
use SLLH\IsoCodesValidator\Constraints\SsnValidator;

class SsnValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new SsnValidator();
    }

    protected function createConstraint()
    {
        return new Ssn();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Ssn());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return [
            ['423-05-9675'],
            ['432-01-5257'],
            ['600-01-4950'],
            ['619-01-7173'],
            ['651-01-3431'],
        ];
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Ssn());

        $this->buildViolation('This value is not a valid SSN.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            ['574-09-0776'],
            ['123-45-6789'],
            ['1234-567-89'],
            ['123456789'],
            ['773-45-6789'],
            [' '],
        ];
    }
}
