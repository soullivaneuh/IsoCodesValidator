<?php

namespace SLLH\IsoCodesValidator\Constraints;

use SLLH\IsoCodesValidator\AbstractConstraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class Ip extends AbstractConstraint
{
    public $message = 'This value is not a valid IP address.';

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesVersion()
    {
        return '1.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesClass()
    {
        return \IsoCodes\IP::class;
    }
}
