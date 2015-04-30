<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

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
            ['Canada'],
            ['France'],
            ['Netherlands'],
            ['US'],
        ];
    }

    /**
     * @dataProvider getInvalidCountries
     * @expectedException Symfony\Component\Validator\Exception\ConstraintDefinitionException
     */
    public function testInvalidCountries($country)
    {
        $zipCode = new ZipCode(['country' => $country]);
    }

    public function getInvalidCountries()
    {
        return [
            ['canada'],
            ['CANADA'],
            ['caNada'],
            ['france'],
            ['FRANCE'],
            ['frAnce'],
            ['netherlands'],
            ['NETHERLANDS'],
            ['neTherlands'],
            ['us'],
            ['uS'],
            ['Us'],
            ['qwertyuiop']
        ];
    }
}
