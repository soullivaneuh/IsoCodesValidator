<?php

namespace SLLH\IsoCodesValidator\Tests\Fixtures\Constraints;

use SLLH\IsoCodesValidator\AbstractIsoCodesGenericConstraint;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class NotExists extends AbstractIsoCodesGenericConstraint
{
    /**
     * {@inheritdoc}
     */
    public function getIsoCodesVersion()
    {
        return '42.13.37';
    }
}
