<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

/**
 * Class ZipCode
 */
class ZipCode extends Constraint
{
    const US            = 'US';
    const CANADA        = 'Canada';
    const FRANCE        = 'France';
    const NETHERLANDS   = 'Netherlands';

    const ALL           = 'all';

    public static $countries = array(
        self::US,
        self::CANADA,
        self::FRANCE,
        self::NETHERLANDS,
    );

    public $country = self::ALL;

    public $message = 'This value is not a valid ZIP code.';

    /**
     * {@inheritdoc}
     */
    public function __construct($options = null)
    {
        parent::__construct($options);

        if ($this->country != self::ALL && !in_array($this->country, self::$countries)) {
            throw new ConstraintDefinitionException(sprintf('The option "country" must be one of "%s" or "all"', implode('", "', self::$countries)));
        }
    }
}
