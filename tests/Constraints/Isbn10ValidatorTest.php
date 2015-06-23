<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Isbn10;
use SLLH\IsoCodesValidator\Constraints\Isbn10Validator;

/**
 * @group legacy
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class Isbn10ValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new Isbn10Validator();
    }

    protected function createConstraint()
    {
        return new Isbn10();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Isbn10());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return [
            ['8881837188'],
            ['2266111566'],
            ['2123456802'],
            ['888 18 3 7 1-88'],
            ['2-7605-1028-X'],
        ];
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Isbn10());

        $this->buildViolation('This value is not a valid ISBN-10.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            ['8881837187'],
            ['888183718A'],
            ['stringof10'],
            [888183718],
            [88818371880],
            ['88818371880'],
            ['8881837188A'],
            ['8881837189'],
            [' '],
        ];
    }
}
