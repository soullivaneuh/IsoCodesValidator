<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Siret;
use SLLH\IsoCodesValidator\Constraints\SiretValidator;

class SiretValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new SiretValidator();
    }

    protected function createConstraint()
    {
        return new Siret();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Siret());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return [
            [44079707400026],
            ['48853781200015'],
            ['43216756700028'],
            ['41762563900030'],
            ['33493272000017'],
            ['44028837100014'],
            ['51743954300011'],
        ];
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Siret());

        $this->buildViolation('This value is not a valid SIRET.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            [440797074000],
            ['440797074000278'],
            ['44079707400027'],
            ['48853781200016'],
            ['43216756700029'],
            ['41762563900031'],
            ['33493272000018'],
            ['44028837100015'],
            ['51743954300012'],
            [' '],
            ['azertyuiopqsdf'],

        ];
    }
}
