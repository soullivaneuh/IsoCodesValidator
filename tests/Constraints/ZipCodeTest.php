<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use PHPUnit\Framework\TestCase;
use SLLH\IsoCodesValidator\Constraints\ZipCode;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

final class ZipCodeTest extends TestCase
{
    /**
     * @dataProvider getValidCountries
     */
    public function testValidCountries($country)
    {
        $zipCode = new ZipCode(['country' => $country]);

        $this->assertSame($country, $zipCode->country);
    }

    public function getValidCountries()
    {
        return [
            ['CA'],
            ['FR'],
            ['NL'],
            ['US'],
        ];
    }

    /**
     * @dataProvider getInvalidCountries
     */
    public function testInvalidCountries($country)
    {
        $this->expectException(ConstraintDefinitionException::class);
        new ZipCode(['country' => $country]);
    }

    public function getInvalidCountries()
    {
        return [
            ['TL'],
            [42],
            ['Liberlands'],
            ['France'],
            ['us'],
            ['uS'],
            ['Us'],
            ['qwertyuiop'],
        ];
    }
}
