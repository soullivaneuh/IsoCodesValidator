<?php

namespace SLLH\IsoCodesValidator\Constraints;

use SLLH\IsoCodesValidator\AbstractIsoCodesGenericConstraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class Ean8 extends AbstractIsoCodesGenericConstraint
{
    public $message = 'This EAN 8 code is not valid.';

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesVersion()
    {
        return '2.1.0';
    }
}
