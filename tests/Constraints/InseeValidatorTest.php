<?php

namespace SLLH\IsoCodesValidator\tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Insee;
use SLLH\IsoCodesValidator\Constraints\InseeValidator;

class InseeValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new InseeValidator();
    }

    protected function createConstraint()
    {
        return new Insee();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Insee());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return [
            ['177022A00100229'],
            ['253012B073004'],
            ['177025626004544'],
            ['253077507300483'],
            ['188057208107893'],
        ];
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Insee());

        $this->buildViolation('This INSEE number is not valid.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            ['353072B07300483'],
            ['253072C07300483'],
            [' '],
        ];
    }
}
