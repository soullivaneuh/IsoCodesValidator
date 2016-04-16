<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\ZipCode;
use SLLH\IsoCodesValidator\Constraints\ZipCodeValidator;

final class ZipCodeValidatorTest extends AbstractConstraintValidatorTest
{
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

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value, $country)
    {
        $this->validator->validate($value, new ZipCode([
            'country' => $country,
        ]));

        $this->buildViolation($this->getInvalidMessage())
            ->assertRaised();
    }

    /**
     * {@inheritdoc}
     */
    protected function createValidator()
    {
        return new ZipCodeValidator();
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid ZIP code.';
    }
}
