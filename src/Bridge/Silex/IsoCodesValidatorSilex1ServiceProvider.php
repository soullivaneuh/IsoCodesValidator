<?php

namespace SLLH\IsoCodesValidator\Bridge\Silex;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class IsoCodesValidatorSilex1ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Application $app)
    {
        if (isset($app['translator'])) {
            $file = __DIR__.'/../../translations/validators.'.$app['locale'].'.xlf';
            if (file_exists($file)) {
                $app['translator']->addResource('xliff', $file, $app['locale'], 'validators');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }
}
