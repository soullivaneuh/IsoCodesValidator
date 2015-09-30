<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\StructuredCommunication;
use SLLH\IsoCodesValidator\Constraints\StructuredCommunicationValidator;

class StructuredCommunicationValidatorTest extends AbstractConstraintValidatorTest
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
        return new StructuredCommunicationValidator();
    }

    protected function createConstraint()
    {
        return new StructuredCommunication();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new StructuredCommunication());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return [
            [101327481006],
            ['101327481006'],
            ['123456789002'],
        ];
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new StructuredCommunication());

        $this->buildViolation('This value is not a valid structured communication code.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            ['12345678902'],
            [12345678902],
            [123456789020],
            [10132748100],
            [10132748107],
            [1013274810067],
            [101374810060],
            [' '],
        ];
    }
}
