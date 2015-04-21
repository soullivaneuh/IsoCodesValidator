<?php

namespace SLLH\IsoCodesValidator\Constraints;

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
        return array(
            array('AB123456C'),
            array('EH123456A'),
            array('HG123456B'),
        );
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
        return array(
            array('AD123456CA'),
            array('AD12345C'),
            array('AD123456'),
            array('AF123456C'),
            array('AB123456F'),
            array('TN011258F'),
            array(' '),
            array('azertyuiop'),
        );
    }
}
