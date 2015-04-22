<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

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
        return array(
            array('423-05-9675'),
            array('432-01-5257'),
            array('600-01-4950'),
            array('619-01-7173'),
            array('651-01-3431')
        );
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
        return array(
            array('574-09-0776'),
            array('123-45-6789'),
            array('1234-567-89'),
            array('123456789'),
            array('773-45-6789'),
            array(' '),
        );
    }
}
