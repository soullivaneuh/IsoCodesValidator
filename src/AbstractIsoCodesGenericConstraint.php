<?php

namespace SLLH\IsoCodesValidator;

use SLLH\IsoCodesValidator\Constraints\IsoCodesGenericValidator;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
abstract class AbstractIsoCodesGenericConstraint extends AbstractConstraint
{
    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return IsoCodesGenericValidator::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsoCodesClass()
    {
        $constraintClassTab = explode('\\', get_class($this));

        return 'IsoCodes\\'.end($constraintClassTab);
    }
}
