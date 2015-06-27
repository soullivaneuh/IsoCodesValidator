<?php

namespace SLLH\IsoCodesValidator\Bundle;

use SLLH\IsoCodesValidator\Bundle\DependencyInjection\Compiler\TranslationPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class SLLHIsoCodesValidatorBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TranslationPass());
    }
}
