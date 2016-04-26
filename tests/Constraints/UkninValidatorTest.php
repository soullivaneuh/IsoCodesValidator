<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class UkninValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['AB123456C'],
            ['EH123456A'],
            ['HG123456B'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['AD123456CA'],
            ['AD12345C'],
            ['AD123456'],
            ['AF123456C'],
            ['AB123456F'],
            ['TN011258F'],
            ['azertyuiop'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid NINO.';
    }
}
