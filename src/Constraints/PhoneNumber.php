<?php

namespace SLLH\IsoCodesValidator\Constraints;

use SLLH\IsoCodesValidator\AbstractConstraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class PhoneNumber extends AbstractConstraint
{
    const ANY = 'any';

    /**
     * @var string
     *
     * Using PhoneNumber::ANY option will valid phone numbers with only country code prefixes (e.g. +33).
     *
     * For the avaible country, @see \libphonenumber\PhoneNumberUtil::isValidRegionCode
     */
    public $country = self::ANY;

    public $message = 'This value is not a valid phone number.';

    /**
     * {@inheritdoc}
     */
    public function __construct($options = null)
    {
        parent::__construct($options);
    }

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesVersion()
    {
        return '2.1.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesClass()
    {
        return \IsoCodes\PhoneNumber::class;
    }
}
