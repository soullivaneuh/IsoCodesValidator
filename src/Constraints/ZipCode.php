<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class ZipCode extends Constraint
{
    const ALL           = 'all';

    public $country = self::ALL;

    public $message = 'This value is not a valid ZIP code.';

    /**
     * {@inheritdoc}
     */
    public function __construct($options = null)
    {
        parent::__construct($options);

        if ($this->country != self::ALL && !in_array($this->country, IsoCodes\ZipCode::getAvailableCountries())) {
            throw new ConstraintDefinitionException(sprintf('The option "country" must be one of "%s" or "all"', implode('", "', IsoCodes\ZipCode::getAvailableCountries())));
        }
    }
}
