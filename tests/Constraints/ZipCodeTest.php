<?php

namespace SLLH\IsoCodesValidator\tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\ZipCode;

class ZipCodeTest extends \PHPUnit_Framework_TestCase
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
     * @expectedException \Symfony\Component\Validator\Exception\ConstraintDefinitionException
     */
    public function testInvalidCountries($country)
    {
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
