<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class Ean8ValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['42345671'],
            ['4719-5127'],
            ['9638-5074'],
        ];
    }

    public function getInvalidValues()
    {
        return [
            [42345670],
            [423456712],
            ['423456712'],
            ['12345671'],
            ['4234.5671'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This EAN 8 code is not valid.';
    }
}
