<?php

namespace SLLH\IsoCodesValidator\Constraints;

use SLLH\IsoCodesValidator\AbstractIsoCodesGenericConstraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class Siren extends AbstractIsoCodesGenericConstraint
{
    public $message = 'This value is not a valid SIREN.';

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesVersion()
    {
        return '1.0.0';
    }
}
