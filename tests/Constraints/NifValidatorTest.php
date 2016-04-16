<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class NifValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['04381012H'],
            ['04381012h'],
            ['12345678Z'],
            ['99999999R'],
            ['Z6171167L'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['A08000143'],
            ['12345678'],
            ['9999999L'],
            ['999999999L'],
            ['12345678W'],
            ['L9999999K'],
            ['A9999999L'],
            ['A9999999L'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid NIF.';
    }
}
