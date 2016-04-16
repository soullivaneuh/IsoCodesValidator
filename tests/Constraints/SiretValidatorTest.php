<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class SiretValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
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
     * {@inheritdoc}
     */
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
            ['azertyuiopqsdf'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid SIRET.';
    }
}
