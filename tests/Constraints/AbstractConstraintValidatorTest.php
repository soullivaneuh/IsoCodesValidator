<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\AbstractConstraint;
use SLLH\IsoCodesValidator\ConstraintInterface;
use SLLH\IsoCodesValidator\Constraints\IsoCodesGenericValidator;
use Symfony\Component\Validator\Constraints\Blank;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest as BaseAbstractConstraintValidatorTest;
use Symfony\Component\Validator\Validation;

abstract class AbstractConstraintValidatorTest extends BaseAbstractConstraintValidatorTest
{
    /**
     * @var ConstraintInterface
     */
    protected $srcConstraint;

    protected function setUp()
    {
        parent::setUp();

        $this->srcConstraint = $this->createConstraint();

        if (!class_exists($this->srcConstraint->getIsoCodesClass())) {
            $this->markTestSkipped('The '.$this->srcConstraint->getIsoCodesClass().' validator final class does not exists.');
        }
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

    public function testBlankButNotEmptyStringIsInvalid()
    {
        $this->validator->validate(' ', $this->createConstraint());

        $this->buildViolation($this->getInvalidMessage())
            ->assertRaised();
    }

    public function testItImplementsInterface()
    {
        $this->assertInstanceOf(ConstraintInterface::class, $this->srcConstraint);
    }

    public function testItProvidesAnIsoCodesVersion()
    {
        $this->assertStringMatchesFormat(
            '%d.%d.%d',
            $this->srcConstraint->getIsoCodesVersion(),
            'You should provide a proper version of IsoCodes library.'
        );
    }

    /**
     * @return array[]
     */
    abstract public function getValidValues();

    /**
     * @return array[]
     */
    abstract public function getInvalidValues();

    protected function createValidator()
    {
        return new IsoCodesGenericValidator();
    }

    /**
     * @return AbstractConstraint
     */
    protected function createConstraint()
    {
        $validatorTestClassTab = explode('\\', get_class($this));
        $constraintClass = 'SLLH\\IsoCodesValidator\\Constraints\\'
            .str_replace('ValidatorTest', '', end($validatorTestClassTab));

        return new $constraintClass();
    }

    /**
     * @return string
     */
    abstract protected function getInvalidMessage();
}
