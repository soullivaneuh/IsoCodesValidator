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
    protected function getInvalidMessage()
    {
        return 'This EAN 8 code is not valid.';
    }

    /**
     * {@inheritdoc}
     */
    protected function getIsoCodesTestClass()
    {
        return 'Gtin8Test';
    }
}
