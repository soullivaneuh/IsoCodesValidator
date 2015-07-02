<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class IsoCodesGeneric extends Constraint
{
    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return __CLASS__.'Validator';
    }
}
