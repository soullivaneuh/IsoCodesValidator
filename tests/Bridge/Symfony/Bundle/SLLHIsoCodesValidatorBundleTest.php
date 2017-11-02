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

        $passClasses = array_map(function (CompilerPassInterface $compilerPass) {
            return get_class($compilerPass);
        }, $this->container->getCompilerPassConfig()->getPasses());
        $this->assertContains(
            TranslationPass::class,
            $passClasses,
            'Bundle must contains a TranslationPass instance.'
        );
    }
}
