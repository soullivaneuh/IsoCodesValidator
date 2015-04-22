<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Siren;
use SLLH\IsoCodesValidator\Constraints\SirenValidator;

class SirenValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new SirenValidator();
    }

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
        return array(
            array('432167567'),
            array(432167567),
            array('417625639'),
            array('334932720'),
            array('440288371'),
            array('517439543')
        );
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
        return array(
            array('44079707'),
            array(44079707),
            array('4407970745'),
            array('440797075'),
            array('488537813'),
            array('432167568'),
            array('417625630'),
            array('334932721'),
            array('440288372'),
            array('517439544'),
            array(' '),
            array('azertyuio'),
        );
    }
}
