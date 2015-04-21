<?php

namespace SLLH\IsoCodesValidator\Constraints;

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
        return array(
            array('177022A00100229'),
            array('253012B073004'),
            array('177025626004544'),
            array('253077507300483'),
            array('188057208107893'),
        );
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
        return array(
            array('353072B07300483'),
            array('253072C07300483'),
            array(' '),
        );
    }
}
