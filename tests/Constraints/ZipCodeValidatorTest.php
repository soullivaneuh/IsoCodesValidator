<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\ZipCode;
use SLLH\IsoCodesValidator\Constraints\ZipCodeValidator;

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
        $this->validator->validate($value, new ZipCode([
            'country' => $country,
        ]));
        $this->assertNoViolation();
        $this->validator->validate($value, new ZipCode());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return [
            ['A0A 1A0', 'CA'],
            ['A0A1A0', 'CA'],
            ['H0H 0H0', 'CA'],
            ['A0A 1A0', 'CA'],
            ['06000', 'FR'],
            ['56000', 'FR'],
            ['56420', 'FR'],
            ['20000', 'FR'],
            ['97114', 'FR'],
            ['99999', 'FR'],
            ['99123', 'FR'],
            ['98000', 'FR'],
            ['00100', 'FR'],
            ['01000', 'FR'],
            ['1234AA', 'NL'],
            ['1234 AA', 'NL'],
            ['1023 AA', 'NL'],
            ['99801', 'US'],
            ['02115', 'US'],
            ['10001', 'US'],
            ['20008', 'US'],
            ['99950', 'US'],
        ];
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value, $country)
    {
        $this->validator->validate($value, new ZipCode([
            'country' => $country,
        ]));

        $this->buildViolation('This value is not a valid ZIP code.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return [
            ['560', 'CA'],
            ['5600', 'CA'],
            ['560000', 'CA'],
            ['A56000', 'CA'],
            ['A5600', 'CA'],
            ['56000A', 'CA'],
            ['A5600A', 'CA'],
            ['AAA', 'CA'],
            ['AAAA', 'CA'],
            ['AAAAA', 'CA'],
            ['A 0A1A0', 'CA'],
            ['A0 A1A0', 'CA'],
            ['A0A1 A0', 'CA'],
            ['A0A1A 0', 'CA'],
            ['A0A1a0', 'CA'],
            ['a0a1a0', 'CA'],
            ['2A004', 'FR'],
            ['560', 'FR'],
            ['5600', 'FR'],
            ['560000', 'FR'],
            ['A56000', 'FR'],
            ['A5600', 'FR'],
            ['56000A', 'FR'],
            ['A5600A', 'FR'],
            ['AAA', 'FR'],
            ['AAAA', 'FR'],
            ['AAAAA', 'FR'],
            ['1234', 'NL'],
            ['1234A', 'NL'],
            ['AA1234', 'NL'],
            ['A1234A', 'NL'],
            ['1A2A3A', 'NL'],
            ['1234ABC', 'NL'],
            ['123AB', 'NL'],
            ['123456', 'NL'],
            ['AAAA', 'NL'],
            ['ABCD12', 'NL'],
            ['1234 ABC', 'NL'],
            ['12345A', 'NL'],
            ['1234 5A', 'NL'],
            ['0123 AA', 'NL'],
            ['1234aa', 'NL'],
            ['5600', 'US'],
            ['560000', 'US'],
            ['A56000', 'US'],
            ['A5600', 'US'],
            ['56000A', 'US'],
            ['A5600A', 'US'],
            ['AAA', 'US'],
            ['AAAA', 'US'],
            ['AAAAA', 'US'],
            ['A 0A1A0', 'US'],
            ['A0 A1A0', 'US'],
            ['A0A1 A0', 'US'],
            ['A0A1A 0', 'US'],
            ['A0A1a0', 'US'],
            ['a0a1a0', 'US'],
            ['AAA', 'all'],
            ['AAAAA', 'all'],
            ['Lorem Ipsum', 'all'],
            ['LOREM IPSUM', 'all'],
            ['lorem ipsum', 'all'],
            [' ', 'all'],
        ];
    }
}
