<?php

namespace SLLH\IsoCodesValidator\Constraints;

class ZipCodeValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new ZipCodeValidator();
    }

    protected function createConstraint()
    {
        return new ZipCode();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value, $country)
    {
        $this->validator->validate($value, new ZipCode(array(
            'country' => $country,
        )));
        $this->assertNoViolation();
        $this->validator->validate($value, new ZipCode());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return array(
            array('A0A 1A0', 'Canada'),
            array('A0A1A0', 'Canada'),
            array('H0H 0H0', 'Canada'),
            array('A0A 1A0', 'Canada'),
            array('06000', 'France'),
            array('56000', 'France'),
            array('56420', 'France'),
            array('20000', 'France'),
            array('97114', 'France'),
            array('99999', 'France'),
            array('99123', 'France'),
            array('98000', 'France'),
            array('00100', 'France'),
            array('01000', 'France'),
            array('1234AA', 'Netherlands'),
            array('1234 AA', 'Netherlands'),
            array('1023 AA', 'Netherlands'),
            array('99801', 'US'),
            array('02115', 'US'),
            array('10001', 'US'),
            array('20008', 'US'),
            array('99950', 'US'),
        );
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value, $country)
    {
        $this->validator->validate($value, new ZipCode(array(
            'country' => $country,
        )));

        $this->buildViolation('This value is not a valid ZIP code.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return array(
            array('560', 'Canada'),
            array('5600', 'Canada'),
            array('560000', 'Canada'),
            array('A56000', 'Canada'),
            array('A5600', 'Canada'),
            array('56000A', 'Canada'),
            array('A5600A', 'Canada'),
            array('AAA', 'Canada'),
            array('AAAA', 'Canada'),
            array('AAAAA', 'Canada'),
            array('A 0A1A0', 'Canada'),
            array('A0 A1A0', 'Canada'),
            array('A0A1 A0', 'Canada'),
            array('A0A1A 0', 'Canada'),
            array('A0A1a0', 'Canada'),
            array('a0a1a0', 'Canada'),
            array('2A004', 'France'),
            array('560', 'France'),
            array('5600', 'France'),
            array('560000', 'France'),
            array('A56000', 'France'),
            array('A5600', 'France'),
            array('56000A', 'France'),
            array('A5600A', 'France'),
            array('AAA', 'France'),
            array('AAAA', 'France'),
            array('AAAAA', 'France'),
            array('1234', 'Netherlands'),
            array('1234A', 'Netherlands'),
            array('AA1234', 'Netherlands'),
            array('A1234A', 'Netherlands'),
            array('1A2A3A', 'Netherlands'),
            array('1234ABC', 'Netherlands'),
            array('123AB', 'Netherlands'),
            array('123456', 'Netherlands'),
            array('AAAA', 'Netherlands'),
            array('ABCD12', 'Netherlands'),
            array('1234 ABC', 'Netherlands'),
            array('12345A', 'Netherlands'),
            array('1234 5A', 'Netherlands'),
            array('0123 AA', 'Netherlands'),
            array('1234aa', 'Netherlands'),
            array('5600', 'US'),
            array('560000', 'US'),
            array('A56000', 'US'),
            array('A5600', 'US'),
            array('56000A', 'US'),
            array('A5600A', 'US'),
            array('AAA', 'US'),
            array('AAAA', 'US'),
            array('AAAAA', 'US'),
            array('A 0A1A0', 'US'),
            array('A0 A1A0', 'US'),
            array('A0A1 A0', 'US'),
            array('A0A1A 0', 'US'),
            array('A0A1a0', 'US'),
            array('a0a1a0', 'US'),
            array('AAA', 'all'),
            array('AAAA', 'all'),
            array('AAAAA', 'all'),
            array('Lorem Ipsum', 'all'),
            array('LOREM IPSUM', 'all'),
            array('lorem ipsum', 'all'),
            array(' ', 'all'),
        );
    }
}
