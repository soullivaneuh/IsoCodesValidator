<?php

namespace SLLH\IsoCodesValidator\tests\Constraints;

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
        return [
            ['N0032484H'],
            ['A09212275'],
            ['A59032557'],
            ['A17031246'],
            ['B85358596'],
            ['E61685095'],
            ['V27236942'],
            ['G61685095'],
        ];
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
        return [
            ['K11111111'],
            ['L61685095'],
            ['X61685095'],
            ['Y61685095'],
            ['N0032484'],
            ['N0032484I'],
            ['M0032484I'],
            ['M0032484H'],
            [' '],
        ];
    }
}
