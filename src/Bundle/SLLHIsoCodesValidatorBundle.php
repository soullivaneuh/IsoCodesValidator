<?php

namespace SLLH\IsoCodesValidator\Bundle;

@trigger_error(
    'The '.__NAMESPACE__.'\SLLHIsoCodesValidatorBundle class is deprecated since version 2.1 and will be removed in 3.0.'
    .' Use SLLH\IsoCodesValidator\Bridge\Symfony\Bundle\SLLHIsoCodesValidatorBundle instead.',
    E_USER_DEPRECATED
);

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 *
 * @deprecated since version 2.1, to be removed in 3.0. Use SLLH\IsoCodesValidator\Bridge\Symfony\Bundle\SLLHIsoCodesValidatorBundle instead.
 */
class SLLHIsoCodesValidatorBundle extends \SLLH\IsoCodesValidator\Bridge\Symfony\Bundle\SLLHIsoCodesValidatorBundle
{
}
