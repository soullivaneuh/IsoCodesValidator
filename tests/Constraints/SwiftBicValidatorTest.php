<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class SwiftBicValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['RBOSGGSX'],
            ['RZTIAT22263'],
            ['BCEELULL'],
            ['MARKDEFF'],
            ['GENODEF1JEV'],
            ['UBSWCHZH80A'],
            ['CEDELULLXXX'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['CE1EL2LLFFF'],
            ['E31DCLLFFF'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid SWIFT.';
    }
}
