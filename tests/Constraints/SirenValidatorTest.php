<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Siren;

class SirenValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createConstraint()
    {
        return new Siren();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Siren());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return [
            ['432167567'],
            [432167567],
            ['417625639'],
            ['334932720'],
            ['440288371'],
            ['517439543'],
        ];
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Siren());

        $this->buildViolation('This value is not a valid SIREN.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            ['44079707'],
            [44079707],
            ['4407970745'],
            ['440797075'],
            ['488537813'],
            ['432167568'],
            ['417625630'],
            ['334932721'],
            ['440288372'],
            ['517439544'],
            [' '],
            ['azertyuio'],
        ];
    }
}
