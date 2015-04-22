<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Cif;
use SLLH\IsoCodesValidator\Constraints\CifValidator;

class CifValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new CifValidator();
    }

    protected function createConstraint()
    {
        return new Cif();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Cif());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return array(
            array('N0032484H'),
            array('A09212275'),
            array('A59032557'),
            array('A17031246'),
            array('B85358596'),
            array('E61685095'),
            array('V27236942'),
            array('G61685095'),
        );
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Cif());

        $this->buildViolation('This value is not a valid CIF.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return array(
            array('K11111111'),
            array('L61685095'),
            array('X61685095'),
            array('Y61685095'),
            array('N0032484'),
            array('N0032484I'),
            array('M0032484I'),
            array('M0032484H'),
            array(' '),
        );
    }
}
