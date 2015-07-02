<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\IsoCodesGenericValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Blank;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest as BaseAbstractConstraintValidatorTest;
use Symfony\Component\Validator\Validation;

abstract class AbstractConstraintValidatorTest extends BaseAbstractConstraintValidatorTest
{
    /**
     * @var Constraint
     */
    protected $srcConstraint;

    protected function setUp()
    {
        parent::setUp();

        $this->srcConstraint = $this->createConstraint();
    }

    protected function getApiVersion()
    {
        return Validation::API_VERSION_2_5;
    }

    public function testUnexpectedConstraintException()
    {
        $this->setExpectedException('Symfony\Component\Validator\Exception\UnexpectedTypeException');

        $this->validator->validate(null, new Blank());
    }

    public function testNullIsValid()
    {
        $this->validator->validate(null, $this->createConstraint());

        $this->assertNoViolation();
    }

    public function testEmptyStringIsValid()
    {
        $this->validator->validate('', $this->createConstraint());

        $this->assertNoViolation();
    }

    protected function createValidator()
    {
        return new IsoCodesGenericValidator();
    }


    abstract protected function createConstraint();
}
