<?php

namespace SLLH\IsoCodesValidator\Constraints;

class BbanValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new BbanValidator();
    }

    protected function createConstraint()
    {
        return new Bban();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Bban());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return array(
            array('15459450000411700920U62'),
            array('10207000260402601177083')
        );
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Bban());

        $this->buildViolation('This value is not a valid BBAN.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return array(
            array(10207000260402601177083),
            array('15459 45000 0411700920U 62'),
            array('10207000260402601177084'),
            array(10207000260402601177084),
            array(' '),
        );
    }
}
