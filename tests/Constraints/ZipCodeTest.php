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
            ['CA'],
            ['FR'],
            ['NL'],
            ['US'],
        ];
    }

    /**
     * 1.0 BC.
     *
     * @dataProvider getLegacyValidCountries
     */
    public function testLegacyValidCountries($country)
    {
        $zipCode = new ZipCode(['country' => $country]);

        // 1.0 BC
        $deprecatedOptionsBridge = [
            'Canada'        => 'CA',
            'France'        => 'FR',
            'Netherlands'   => 'NL',
        ];

        $this->assertSame($deprecatedOptionsBridge[$country], $zipCode->country);
    }

    public function getLegacyValidCountries()
    {
        return [
            ['Canada'],
            ['France'],
            ['Netherlands'],
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
            // 1.0 BC Test
            ['canada'],
            ['CANADA'],
            ['caNada'],
            ['france'],
            ['FRANCE'],
            ['frAnce'],
            ['netherlands'],
            ['NETHERLANDS'],
            ['neTherlands'],
            // END 1.0 BC Test
            ['us'],
            ['uS'],
            ['Us'],
            ['qwertyuiop'],
        ];
    }
}
