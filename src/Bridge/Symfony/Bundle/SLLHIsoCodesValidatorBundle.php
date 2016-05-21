<?php

namespace SLLH\IsoCodesValidator\Bridge\Symfony\Bundle;

use SLLH\IsoCodesValidator\Bridge\Symfony\DependencyInjection\Compiler\TranslationPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class SLLHIsoCodesValidatorBundle extends Bundle
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
