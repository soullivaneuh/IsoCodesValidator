<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\StructuredCommunication;
use SLLH\IsoCodesValidator\Constraints\StructuredCommunicationValidator;

class StructuredCommunicationTest extends AbstractConstraintValidatorTest
{
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
        return array(
            array(101327481006),
            array('101327481006'),
            array('123456789002'),
        );
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
        return array(
            array('12345678902'),
            array(12345678902),
            array(123456789020),
            array(10132748100),
            array(10132748107),
            array(1013274810067),
            array(101374810060),
            array(' '),
        );
    }
}
