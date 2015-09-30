<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Bban;
use SLLH\IsoCodesValidator\Constraints\Cif;
use SLLH\IsoCodesValidator\Constraints\Iban;
use SLLH\IsoCodesValidator\Constraints\IsoCodesGeneric;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class IsoCodeGenericTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getGenericConstraints
     *
     * @param IsoCodesGeneric $constraint
     * @param                 $validatorName
     */
    public function testValidatorName(IsoCodesGeneric $constraint)
    {
        $this->assertSame('SLLH\IsoCodesValidator\Constraints\IsoCodesGenericValidator', $constraint->validatedBy());
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
