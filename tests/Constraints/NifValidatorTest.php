<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Nif;
use SLLH\IsoCodesValidator\Constraints\NifValidator;

class NifValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new NifValidator();
    }

    protected function createConstraint()
    {
        return new Nif();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Nif());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return array(
            array('04381012H'),
            array('04381012h'),
            array('12345678Z'),
            array('99999999R'),
            array('Z6171167L'),
        );
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Nif());

        $this->buildViolation('This value is not a valid NIF.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return array(
            array('A08000143'),
            array('12345678'),
            array('9999999L'),
            array('999999999L'),
            array('12345678W'),
            array('L9999999K'),
            array('A9999999L'),
            array('A9999999L'),
            array(' '),
        );
    }
}
