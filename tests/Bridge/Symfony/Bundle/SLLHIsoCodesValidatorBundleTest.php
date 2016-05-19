<?php

namespace SLLH\IsoCodesValidator\Tests\Bridge\Symfony\Bundle;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractContainerBuilderTestCase;
use SLLH\IsoCodesValidator\Bridge\Symfony\Bundle\SLLHIsoCodesValidatorBundle;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class SLLHIsoCodesValidatorBundleTest extends AbstractContainerBuilderTestCase
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
        $this->assertCount(2, $passes, 'Bundle must contains a TranslationPass instance.');
        $this->assertInstanceOf(
            'SLLH\IsoCodesValidator\Bridge\Symfony\DependencyInjection\Compiler\TranslationPass',
            $passes[1],
            'Bundle must contains a TranslationPass instance.'
        );
    }
}
