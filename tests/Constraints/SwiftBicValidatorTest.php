<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\SwiftBic;
use SLLH\IsoCodesValidator\Constraints\SwiftBicValidator;

class SwiftBicValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new SwiftBicValidator();
    }

    protected function createConstraint()
    {
        return new SwiftBic();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new SwiftBic());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return array(
            array('RBOSGGSX'),
            array('RZTIAT22263'),
            array('BCEELULL'),
            array('MARKDEFF'),
            array('GENODEF1JEV'),
            array('UBSWCHZH80A'),
            array('CEDELULLXXX'),
        );
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new SwiftBic());

        $this->buildViolation('This value is not a valid SWIFT.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return array(
            array('CE1EL2LLFFF'),
            array('E31DCLLFFF'),
            array(' '),
        );
    }
}
