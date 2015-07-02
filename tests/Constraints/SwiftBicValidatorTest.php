<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\SwiftBic;
use SLLH\IsoCodesValidator\Constraints\SwiftBicValidator;

class SwiftBicValidatorTest extends AbstractConstraintValidatorTest
{
    /**
     * @group legacy
     */
    protected function setUp()
    {
        parent::setUp();
    }

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
        return [
            ['RBOSGGSX'],
            ['RZTIAT22263'],
            ['BCEELULL'],
            ['MARKDEFF'],
            ['GENODEF1JEV'],
            ['UBSWCHZH80A'],
            ['CEDELULLXXX'],
        ];
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
        return [
            ['CE1EL2LLFFF'],
            ['E31DCLLFFF'],
            [' '],
        ];
    }
}
