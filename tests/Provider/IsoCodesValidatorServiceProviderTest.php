<?php

namespace SLLH\IsoCodesValidator\Tests\Provider;

use Silex\Application;
use Silex\Provider\TranslationServiceProvider;
use SLLH\IsoCodesValidator\Provider\IsoCodesValidatorServiceProvider;
use Symfony\Component\Translation\TranslatorInterface;

class IsoCodesValidatorServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegisterAndBoot()
    {
        $app = new Application();

        $app->register(new IsoCodesValidatorServiceProvider());
        $app->boot();

        return $app;
    }

    public function testRegisterWithTranslator()
    {
        $app = new Application();

        $app->register(new TranslationServiceProvider());
        $app->register(new IsoCodesValidatorServiceProvider());
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
        $app->register(new IsoCodesValidatorServiceProvider());

        /** @var TranslatorInterface $translator */
        $translator = $app['translator'];
        $this->assertInstanceOf('Symfony\Component\Translation\TranslatorInterface', $translator);

        $source = 'This value is not a valid VAT.';
        $translation = $translator->trans($source, [], 'validators', $locale);
        if ($locale !== 'en') {
            // String should be translated
            $existing ? $this->assertNotEquals($source, $translation) : $this->assertEquals($source, $translation);
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
}
