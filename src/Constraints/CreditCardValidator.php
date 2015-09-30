<?php

namespace SLLH\IsoCodesValidator\Constraints;

@trigger_error('The '.__NAMESPACE__.'\CreditCardValidator class is deprecated since 1.2 and will be removed in 2.0. Use '.__NAMESPACE__.'\IsoCodesGenericValidator instead', E_USER_DEPRECATED);

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class CreditCardValidator extends IsoCodesGenericValidator
{
}
