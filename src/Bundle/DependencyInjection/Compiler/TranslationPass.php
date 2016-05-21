<?php

namespace SLLH\IsoCodesValidator\Bundle\DependencyInjection\Compiler;

@trigger_error(
    'The '.__NAMESPACE__.'\TranslationPass class is deprecated since version 2.1 and will be removed in 3.0.'
    .' Use SLLH\IsoCodesValidator\Bridge\Symfony\DependencyInjection\Compiler\TranslationPass instead.',
    E_USER_DEPRECATED
);

/**
 * Register IsoCodesValidator translations files.
 *
 * Files resources register method based on
 * Symfony\Bundle\FrameworkBundle\DependencyInjection\FrameworkExtension::registerTranslatorConfiguration
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 *
 * @deprecated since version 2.1, to be removed in 3.0. Use SLLH\IsoCodesValidator\Bridge\Symfony\DependencyInjection\Compiler\TranslationPass instead.
 */
class TranslationPass extends \SLLH\IsoCodesValidator\Bridge\Symfony\DependencyInjection\Compiler\TranslationPass
{
}
