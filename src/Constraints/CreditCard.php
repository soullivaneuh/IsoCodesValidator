<?php

namespace SLLH\IsoCodesValidator\Constraints;

use SLLH\IsoCodesValidator\AbstractIsoCodesGenericConstraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class CreditCard extends AbstractIsoCodesGenericConstraint
{
    public $message = 'This value is not a valid credit card scheme.';

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesVersion()
    {
        return '1.0.0';
    }
}
