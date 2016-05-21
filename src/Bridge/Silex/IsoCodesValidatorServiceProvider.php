<?php

namespace SLLH\IsoCodesValidator\Bridge\Silex;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

final class IsoCodesValidatorServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $pimple)
    {
        if (isset($pimple['translator'])) {
            $file = __DIR__.'/../../translations/validators.'.$pimple['locale'].'.xlf';
            if (file_exists($file)) {
                $pimple['translator']->addResource('xliff', $file, $pimple['locale'], 'validators');
            }
        }
    }
}
