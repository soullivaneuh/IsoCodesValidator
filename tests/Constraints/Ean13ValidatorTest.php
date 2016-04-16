<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class Ean13ValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['4719512002889'],
            ['9782868890061'],
            ['4006381333931'],
            ['978-2-1234-5680-3'],
            ['4719-5120-0288-9'],
            ['978 2 1234 5680 3'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            [2266111566],
            ['2266111566'],
            ['A782868890061'],
            ['4006381333932'],
            ['4719.5120.0288.9'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This EAN 13 code is not valid.';
    }
}
