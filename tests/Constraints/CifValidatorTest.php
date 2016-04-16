<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class CifValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['N0032484H'],
            ['A09212275'],
            ['A59032557'],
            ['A17031246'],
            ['B85358596'],
            ['E61685095'],
            ['V27236942'],
            ['G61685095'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['K11111111'],
            ['L61685095'],
            ['X61685095'],
            ['Y61685095'],
            ['N0032484'],
            ['N0032484I'],
            ['M0032484I'],
            ['M0032484H'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid CIF.';
    }
}
