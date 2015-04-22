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
        $zipCode = new ZipCode(array('country' => $country));

        $this->assertSame($country, $zipCode->country);
    }

    public function getValidCountries()
    {
        return array(
            array('Canada'),
            array('France'),
            array('Netherlands'),
            array('US'),
        );
    }

    /**
     * @dataProvider getInvalidCountries
     * @expectedException Symfony\Component\Validator\Exception\ConstraintDefinitionException
     */
    public function testInvalidCountries($country)
    {
        $zipCode = new ZipCode(array('country' => $country));
    }

    public function getInvalidCountries()
    {
        return array(
            array('canada'),
            array('CANADA'),
            array('caNada'),
            array('france'),
            array('FRANCE'),
            array('frAnce'),
            array('netherlands'),
            array('NETHERLANDS'),
            array('neTherlands'),
            array('us'),
            array('uS'),
            array('Us'),
            array('qwertyuiop')
        );
    }
}
