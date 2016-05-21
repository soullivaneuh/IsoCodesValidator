<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use IsoCodes\Tests\AbstractIsoCodeTest;
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
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return $this->filterEmptyValues($this->getIsoCodesTestInstance()->getValidValues());
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return $this->filterEmptyValues($this->getIsoCodesTestInstance()->getInvalidValues());
    }

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
    protected function getIsoCodesTestClass()
    {
        $validatorTestClassTab = explode('\\', get_class($this));

        return str_replace('ValidatorTest', '', end($validatorTestClassTab)).'Test';
    }

    /**
     * @return string
     */
    abstract protected function getInvalidMessage();

    /**
     * @param array[] $values
     *
     * @return array[]
     */
    private function filterEmptyValues($values)
    {
        foreach ($values as $v => $value) {
            if (empty($value[0])) {
                unset($values[$v]);
            }
        }

        return $values;
    }

    /**
     * @return AbstractIsoCodeTest
     */
    private function getIsoCodesTestInstance()
    {
        // Test classes seems not be autoloaded by default.
        require_once __DIR__.'/../../vendor/ronanguilloux/isocodes/tests/IsoCodes/Tests/AbstractIsoCodeTest.php';
        require_once __DIR__.'/../../vendor/ronanguilloux/isocodes/tests/IsoCodes/Tests/AbstractIsoCodeInterfaceTest.php';

        $isoCodesTestClass = $this->getIsoCodesTestClass();
        $isoCodesTestFQNC = '\IsoCodes\\Tests\\'.$isoCodesTestClass;

        require_once __DIR__.'/../../vendor/ronanguilloux/isocodes/tests/IsoCodes/Tests/'.$isoCodesTestClass.'.php';

        return new $isoCodesTestFQNC();
    }
}
