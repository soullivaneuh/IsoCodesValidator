<?php

namespace SLLH\IsoCodesValidator\Constraints;

use SLLH\IsoCodesValidator\AbstractIsoCodesGenericConstraint;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class Mac extends AbstractIsoCodesGenericConstraint
{
    public $message = 'This value is not a valid MAC address.';

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesVersion()
    {
        return '2.0.0';
    }
}
