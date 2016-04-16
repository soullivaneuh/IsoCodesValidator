<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class MacValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
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
     * {@inheritdoc}
     */
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid MAC address.';
    }
}
