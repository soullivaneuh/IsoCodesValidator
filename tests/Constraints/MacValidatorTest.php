<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Mac;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class MacValidatorTest extends AbstractConstraintValidatorTest
{
    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Mac());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return [
            ['01-2d-4c-ef-89-ab'],
            ['01-2D-4C-EF-89-AB'],
            ['01:2d:4c:ef:89:ab'],
            ['01:2D:4C:EF:89:AB'],
            ['01-2d-4c-ef-89-59'],
            ['ff-2d-4c-ef-89-59'],
        ];
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Mac());

        $this->buildViolation('This value is not a valid MAC address.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            [999999999],
            [9999.9999],
            ['01-2d-4c-ef-89-ab-06'],
            ['01-2d:4c-ef:89-ab'],
            ['01-2d-4c-EF-89-ab'],
            ['01-2d-4C-ef-89-ab'],
            ['01-2dc-4c-ef-89-ab'],
            [' '],
        ];
    }

    protected function createConstraint()
    {
        return new Mac();
    }
}
