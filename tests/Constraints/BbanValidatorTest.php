<?php

namespace SLLH\IsoCodesValidator\tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Bban;
use SLLH\IsoCodesValidator\Constraints\BbanValidator;

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
        return [
            ['15459450000411700920U62'],
            ['10207000260402601177083'],
        ];
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
        return [
            [10207000260402601177083],
            ['15459 45000 0411700920U 62'],
            ['10207000260402601177084'],
            [10207000260402601177084],
            [' '],
        ];
    }
}
