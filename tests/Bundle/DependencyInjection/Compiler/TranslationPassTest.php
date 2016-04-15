<?php

namespace SLLH\IsoCodesValidator\Tests\Bundle\DependencyInjection\Compiler;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractCompilerPassTestCase;
use SLLH\IsoCodesValidator\Bundle\DependencyInjection\Compiler\TranslationPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class TranslationPassTest extends AbstractCompilerPassTestCase
{
    protected function registerCompilerPass(ContainerBuilder $container)
    {
        $container->addCompilerPass(new TranslationPass());
    }

    public function testWithTranslatorService()
    {
        $this->registerService('translator.default', 'Symfony\Bundle\FrameworkBundle\Translation\Translator');
        $this->compile();

        // TODO: Check if translations resources are correctly added to the translator service.
    }
}
