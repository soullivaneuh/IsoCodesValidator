<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
abstract class AbstractGenericConstraintValidatorTest extends AbstractConstraintValidatorTest
{
    /**
     * @dataProvider getValidValues
     */
    final public function testValidValues($value)
    {
        $this->validator->validate($value, $this->createConstraint());
        $this->assertNoViolation();
    }

    /**
     * @dataProvider getInvalidValues
     */
    final public function testInvalidValues($value)
    {
        $this->validator->validate($value, $this->createConstraint());

        $this->buildViolation($this->getInvalidMessage())
            ->assertRaised();
    }
}
