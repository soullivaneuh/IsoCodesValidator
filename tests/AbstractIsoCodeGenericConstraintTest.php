<?php

namespace SLLH\IsoCodesValidator\Tests;

use PHPUnit\Framework\TestCase;
use SLLH\IsoCodesValidator\AbstractIsoCodesGenericConstraint;
use SLLH\IsoCodesValidator\Constraints\Bban;
use SLLH\IsoCodesValidator\Constraints\Cif;
use SLLH\IsoCodesValidator\Constraints\Iban;
use SLLH\IsoCodesValidator\Constraints\IsoCodesGenericValidator;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class AbstractIsoCodeGenericConstraintTest extends TestCase
{
    /**
     * @dataProvider getGenericConstraints
     *
     * @param AbstractIsoCodesGenericConstraint $constraint
     */
    public function testValidatorName($constraint)
    {
        $this->assertSame(IsoCodesGenericValidator::class, $constraint->validatedBy());
    }

    public function getGenericConstraints()
    {
        return [
            [new Bban()],
            [new Cif()],
            [new Iban()],
        ];
    }
}
