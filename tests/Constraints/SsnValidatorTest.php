<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class SsnValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['423-05-9675'],
            ['432-01-5257'],
            ['600-01-4950'],
            ['619-01-7173'],
            ['651-01-3431'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['574-09-0776'],
            ['123-45-6789'],
            ['1234-567-89'],
            ['123456789'],
            ['773-45-6789'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid SSN.';
    }
}
