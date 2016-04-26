<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class SirenValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['432167567'],
            [432167567],
            ['417625639'],
            ['334932720'],
            ['440288371'],
            ['517439543'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['44079707'],
            [44079707],
            ['4407970745'],
            ['440797075'],
            ['488537813'],
            ['432167568'],
            ['417625630'],
            ['334932721'],
            ['440288372'],
            ['517439544'],
            ['azertyuio'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid SIREN.';
    }
}
