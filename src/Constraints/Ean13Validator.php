<?php

namespace SLLH\IsoCodesValidator\Constraints;

trigger_error('The '.__NAMESPACE__.'\Ean13Validator class is deprecated since 1.2 and will be removed in 2.0. User '.__NAMESPACE__.'\IsoCodesGenericValidator instead', E_USER_DEPRECATED);

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class Ean13Validator extends IsoCodesGenericValidator
{
}
