<?php

namespace SLLH\IsoCodesValidator\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class IsoCodesValidatorServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $app)
    {
        if (isset($app['translator'])) {
            $file = __DIR__.'/../Resources/translations/validators.'.$app['locale'].'.xlf';
            if (file_exists($file)) {
                $app['translator']->addResource('xliff', $file, $app['locale'], 'validators');
            }
        }
    }
}
