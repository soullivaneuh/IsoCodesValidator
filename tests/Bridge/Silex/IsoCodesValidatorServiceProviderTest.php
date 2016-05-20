<?php

namespace SLLH\IsoCodesValidator\Tests\Bridge\Silex;

use Silex\Application;
use Silex\Provider\LocaleServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use SLLH\IsoCodesValidator\Bridge\Silex\IsoCodesValidatorServiceProvider;
use SLLH\IsoCodesValidator\Bridge\Silex\IsoCodesValidatorSilex1ServiceProvider;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class IsoCodesValidatorServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegisterAndBoot()
    {
        $app = new Application();

        $app->register($this->getServiceProvider());
        $app->boot();

        return $app;
    }

    public function testRegisterWithTranslator()
    {
        $app = new Application();

        // Silex >=2.0 BC
        if (class_exists('Silex\Provider\LocaleServiceProvider')) {
            $app->register(new LocaleServiceProvider());
        }
        $app->register(new TranslationServiceProvider());
        $app->register($this->getServiceProvider());
    }

    /**
     * @dataProvider getValidLocales
     */
    public function testTranslationFiles($locale, $existing)
    {
        $app = new Application([
            'locale' => $locale,
        ]);

        $app->register(new TranslationServiceProvider());
        $app->register($this->getServiceProvider());

        /** @var TranslatorInterface $translator */
        $translator = $app['translator'];
        $this->assertInstanceOf('Symfony\Component\Translation\TranslatorInterface', $translator);

        $source = 'This value is not a valid VAT.';
        $translation = $translator->trans($source, [], 'validators', $locale);
        if ($locale !== 'en') {
            // String should be translated
            $existing ? $this->assertNotSame($source, $translation) : $this->assertSame($source, $translation);
        }
    }

    public function getValidLocales()
    {
        return [
            ['en', true],
            ['fr', true],
            ['mad_locale', false],
        ];
    }

    /**
     * @return IsoCodesValidatorServiceProvider|IsoCodesValidatorSilex1ServiceProvider
     */
    private function getServiceProvider()
    {
        // Silex <2.0 BC
        if (interface_exists('Silex\ServiceProviderInterface')) {
            return new IsoCodesValidatorSilex1ServiceProvider();
        }

        return new IsoCodesValidatorServiceProvider();
    }
}
