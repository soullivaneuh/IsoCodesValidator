<?php

namespace SLLH\IsoCodesValidator\Constraints;

use SLLH\IsoCodesValidator\AbstractConstraint;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class Isbn extends AbstractConstraint
{
    public $message = 'This value is not a valid ISBN.';

    public $type = null;

    /**
     * {@inheritdoc}
     */
    public function __construct($options = null)
    {
        parent::__construct($options);

        if (null !== $this->type && !in_array($this->type, [10, 13])) {
            throw new ConstraintDefinitionException('The option "type" must be 10 or 13');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOption()
    {
        return 'type';
    }

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesVersion()
    {
        return '1.2.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesClass()
    {
        return \IsoCodes\Isbn::class;
    }
}
