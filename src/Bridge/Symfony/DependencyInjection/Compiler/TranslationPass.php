<?php

namespace SLLH\IsoCodesValidator\Bridge\Symfony\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Finder\Finder;

/**
 * Register IsoCodesValidator translations files.
 *
 * Files resources register method based on
 * Symfony\Bundle\FrameworkBundle\DependencyInjection\FrameworkExtension::registerTranslatorConfiguration
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class TranslationPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('translator.default')) {
            return;
        }

        $translator = $container->findDefinition('translator.default');

        $finder = Finder::create()
            ->files()
            ->filter(function (\SplFileInfo $file) {
                return 2 === substr_count($file->getBasename(), '.') && preg_match('/\.\w+$/', $file->getBasename());
            })
            ->in(__DIR__.'/../../../../translations')
        ;

        foreach ($finder as $file) {
            list($domain, $locale, $format) = explode('.', $file->getBasename(), 3);
            $translator->addMethodCall('addResource', [$format, (string) $file, $locale, $domain]);
        }
    }
}
