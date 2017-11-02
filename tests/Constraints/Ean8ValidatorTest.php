<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use IsoCodes\Tests\Gtin8Test;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class Ean8ValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    protected function getIsoCodesTestInstance()
    {
        return new Gtin8Test();
    }
}
