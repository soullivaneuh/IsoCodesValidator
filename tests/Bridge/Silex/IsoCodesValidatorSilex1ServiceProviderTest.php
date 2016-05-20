<?php

namespace SLLH\IsoCodesValidator\Tests\Bridge\Silex;

use Silex\Application;
use Silex\Provider\TranslationServiceProvider;
use SLLH\IsoCodesValidator\Bridge\Silex\IsoCodesValidatorSilex1ServiceProvider;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class IsoCodesValidatorSilex1ServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegisterAndBoot()
    {
        $app = new Application();

        $app->register(new IsoCodesValidatorSilex1ServiceProvider());
        $app->boot();

        return $app;
    }

    public function testRegisterWithTranslator()
    {
        $app = new Application();

        $app->register(new TranslationServiceProvider());
        $app->register(new IsoCodesValidatorSilex1ServiceProvider());
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
        $app->register(new IsoCodesValidatorSilex1ServiceProvider());

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
}
