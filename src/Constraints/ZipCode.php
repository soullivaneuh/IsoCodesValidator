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
    /**
     * @deprecated since 1.1, to be removed in 2.0.
     */
    const US            = 'US';
    /**
     * @deprecated since 1.1, to be removed in 2.0.
     */
    const CANADA        = 'Canada';
    /**
     * @deprecated since 1.1, to be removed in 2.0.
     */
    const FRANCE        = 'France';
    /**
     * @deprecated since 1.1, to be removed in 2.0.
     */
    const NETHERLANDS   = 'Netherlands';

    const ALL           = 'all';

    /**
     * @deprecated since 1.1, to be removed in 2.0.
     */
    public static $countries = [
        self::US,
        self::CANADA,
        self::FRANCE,
        self::NETHERLANDS,
    ];

    public $country = self::ALL;

    public $message = 'This value is not a valid ZIP code.';

    /**
     * {@inheritdoc}
     */
    public function __construct($options = null)
    {
        parent::__construct($options);

        // 1.0 BC
        if ($this->country !== 'US' && in_array($this->country, self::$countries, true)) {
            $deprecatedOptionsBridge = [
                'Canada'        => 'CA',
                'France'        => 'FR',
                'Netherlands'   => 'NL',
            ];

            @trigger_error('The value "'.$this->country.'" for '.__CLASS__.'::country options is deprecated since version 1.1 and will be removed in 2.0. Use '.$deprecatedOptionsBridge[$this->country].' instead.', E_USER_DEPRECATED);

            $this->country = $deprecatedOptionsBridge[$this->country];
        }

        if ($this->country != self::ALL && !in_array($this->country, IsoCodes\ZipCode::getAvailableCountries())) {
            throw new ConstraintDefinitionException(sprintf(
                'The option "country" must be one of "%s" or "all"',
                implode('", "', IsoCodes\ZipCode::getAvailableCountries())
            ));
        }
    }
}
