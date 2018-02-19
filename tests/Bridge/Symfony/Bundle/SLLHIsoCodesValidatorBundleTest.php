<?php

namespace SLLH\IsoCodesValidator\Tests\Bridge\Symfony\Bundle;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractContainerBuilderTestCase;
use SLLH\IsoCodesValidator\Bridge\Symfony\Bundle\SLLHIsoCodesValidatorBundle;
use SLLH\IsoCodesValidator\Bridge\Symfony\DependencyInjection\Compiler\TranslationPass;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class SLLHIsoCodesValidatorBundleTest extends AbstractContainerBuilderTestCase
{
    /**
     * @var SLLHIsoCodesValidatorBundle
     */
    protected $bundle;

    protected function setUp()
    {
        parent::setUp();

        $this->bundle = new SLLHIsoCodesValidatorBundle();
    }

    public function testBuild()
    {
        $this->bundle->build($this->container);

        $passes = $this->container->getCompilerPassConfig()->getPasses();

        $this->assertCount(7, $passes, 'Bundle must contains a TranslationPass instance.');
        $this->assertInstanceOf(
            'SLLH\IsoCodesValidator\Bridge\Symfony\DependencyInjection\Compiler\TranslationPass',
            $passes[4],
            'Bundle must contains a TranslationPass instance.'
        );
    }
}
