<?php

namespace SLLH\IsoCodesValidator\Provider;

use SLLH\IsoCodesValidator\Bridge\Silex\IsoCodesValidatorSilex1ServiceProvider;

@trigger_error(
    'The '.__NAMESPACE__.'\IsoCodesValidatorServiceProvider class is deprecated since version 2.1 and will be removed in 3.0.'
    .' Use SLLH\IsoCodesValidator\Bridge\Silex\IsoCodesValidatorSilex1ServiceProvider.',
    E_USER_DEPRECATED
);

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 *
 * @deprecated since version 2.1, to be removed in 3.0. Use SLLH\IsoCodesValidator\Bridge\Silex\IsoCodesValidatorSilex1ServiceProvider instead.
 */
class IsoCodesValidatorServiceProvider extends IsoCodesValidatorSilex1ServiceProvider
{
}
