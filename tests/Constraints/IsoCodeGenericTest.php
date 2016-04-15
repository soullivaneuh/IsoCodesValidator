<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\AbstractIsoCodesGenericConstraint;
use SLLH\IsoCodesValidator\Constraints\IsoCodesGeneric;
use SLLH\IsoCodesValidator\Constraints\IsoCodesGenericValidator;
use SLLH\IsoCodesValidator\Tests\Fixtures\Constraints\LegacyFake;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 * @group legacy
 */
class IsoCodeGenericTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getLegacyGenericConstraints
     *
     * @param IsoCodesGeneric|AbstractIsoCodesGenericConstraint $constraint
     */
    public function testValidatorName($constraint)
    {
        $this->assertSame(IsoCodesGenericValidator::class, $constraint->validatedBy());
    }

    public function getLegacyGenericConstraints()
    {
        return [
            [new LegacyFake()],
        ];
    }
}
