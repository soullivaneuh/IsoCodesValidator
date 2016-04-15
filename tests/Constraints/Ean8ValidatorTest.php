<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Ean8;

class Ean8ValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createConstraint()
    {
        return new Ean8();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Ean8());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return [
            ['42345671'],
            ['4719-5127'],
            ['9638-5074'],
        ];
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Ean8());

        $this->buildViolation('This EAN 8 code is not valid.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            [42345670],
            [423456712],
            ['423456712'],
            ['12345671'],
            ['4234.5671'],
            [' '],
        ];
    }
}
