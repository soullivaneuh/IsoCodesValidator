<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\PhoneNumber;
use SLLH\IsoCodesValidator\Constraints\PhoneNumberValidator;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class PhoneNumberValidatorTest extends AbstractConstraintValidatorTest
{
    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value, $country)
    {
        $this->validator->validate($value, new PhoneNumber([
            'country' => !$country ? PhoneNumber::ANY : $country,
        ]));
        $this->assertNoViolation();
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value, $country)
    {
        $this->validator->validate($value, new PhoneNumber([
            'country' => !$country ? PhoneNumber::ANY : $country,
        ]));

        $this->buildViolation($this->getInvalidMessage())
            ->assertRaised();
    }

    /**
     * {@inheritdoc}
     */
    protected function createValidator()
    {
        return new PhoneNumberValidator();
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid phone number.';
    }
}
