<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Nif;

class NifValidatorTest extends AbstractConstraintValidatorTest
{
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
        return [
            ['04381012H'],
            ['04381012h'],
            ['12345678Z'],
            ['99999999R'],
            ['Z6171167L'],
        ];
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
        return [
            ['A08000143'],
            ['12345678'],
            ['9999999L'],
            ['999999999L'],
            ['12345678W'],
            ['L9999999K'],
            ['A9999999L'],
            ['A9999999L'],
            [' '],
        ];
    }
}
