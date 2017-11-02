<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\AbstractConstraint;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class ZipCode extends AbstractConstraint
{
    const ALL = 'all';

    public $country = self::ALL;

    public $message = 'This value is not a valid ZIP code.';

    /**
     * {@inheritdoc}
     */
    public function __construct($options = null)
    {
        parent::__construct($options);

        if (self::ALL != $this->country && !in_array($this->country, IsoCodes\ZipCode::getAvailableCountries())) {
            throw new ConstraintDefinitionException(sprintf(
                'The option "country" must be one of "%s" or "all"',
                implode('", "', IsoCodes\ZipCode::getAvailableCountries())
            ));
        }
    }

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
        return IsoCodes\ZipCode::class;
    }
}
