<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraints\Blank;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest;
use Symfony\Component\Validator\Validation;

class BbanValidatorTest extends AbstractConstraintValidatorTest
{
    protected function getApiVersion()
    {
        return Validation::API_VERSION_2_5_BC;
    }

    protected function createValidator()
    {
        return new BbanValidator();
    }

    public function testUnexpectedConstraintException()
    {
        $this->setExpectedException(
            'Symfony\Component\Validator\Exception\UnexpectedTypeException',
            'Expected argument of type "SLLH\IsoCodesValidator\Constraints\Bban", "Symfony\Component\Validator\Constraints\Blank" given'
        );

        $this->validator->validate(null, new Blank());
    }

    public function testNullIsValid()
    {
        $this->validator->validate(null, new Bban());

        $this->assertNoViolation();
    }

    public function testEmptyStringIsValid()
    {
        $this->validator->validate('', new Bban());

        $this->assertNoViolation();
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($value)
    {
        $this->validator->validate($value, new Bban());
        $this->assertNoViolation();
    }

    public function getValidValues()
    {
        return array(
            array('15459450000411700920U62'),
            array('10207000260402601177083')
        );
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value)
    {
        $this->validator->validate($value, new Bban());

        $this->buildViolation('This Bban code is not valid.')
            ->assertRaised();
    }

    public function getInvalidValues()
    {
        return array(
            array(10207000260402601177083),
            array('15459 45000 0411700920U 62'),
            array('10207000260402601177084'),
            array(10207000260402601177084),
            array(' '),
        );
    }
}
