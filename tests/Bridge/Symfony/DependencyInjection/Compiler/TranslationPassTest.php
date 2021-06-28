<?php

namespace SLLH\IsoCodesValidator\Tests\Bridge\Symfony\DependencyInjection\Compiler;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractCompilerPassTestCase;
use SLLH\IsoCodesValidator\Bridge\Symfony\DependencyInjection\Compiler\TranslationPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class TranslationPassTest extends AbstractCompilerPassTestCase
{
    protected function registerCompilerPass(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new TranslationPass());
    }

    public function providerWithTranslatorService(): array
    {
        return [
            ['fr', 'Cette valeur n\'est pas un code BBAN valide.'],
            ['nl', 'Deze waarde is geen geldige BBAN.'],
        ];
    }

    /**
     * @dataProvider providerWithTranslatorService
     */
    public function testWithTranslatorService($locale, $expect)
    {
        $translatorDefinition = $this->registerService('translator.default', 'Symfony\Component\Translation\Translator');
        $translatorDefinition->setArguments([$locale]);
        $translatorDefinition->addMethodCall('addLoader', ['xlf', new XliffFileLoader()]);
        $translatorDefinition->setPublic(true);
        $this->compile();

        /** @var Translator $translator */
        $translator = $this->container->get('translator.default');
        $this->assertSame(
            $expect,
            $translator->trans('This value is not a valid BBAN.', [], 'validators')
        );
    }
}
