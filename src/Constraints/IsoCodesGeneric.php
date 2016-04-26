<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

@trigger_error('The '.__NAMESPACE__.'\IsoCodesGeneric class is deprecated since version 2.1 and will be removed in 3.0.', E_USER_DEPRECATED);

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 *
 * @deprecated since version 2.1. To be removed in 3.0
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
