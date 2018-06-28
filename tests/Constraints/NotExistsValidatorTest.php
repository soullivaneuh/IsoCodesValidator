<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\IsoCodesGenericValidator;
use SLLH\IsoCodesValidator\Exception\ValidatorNotExistsException;
use SLLH\IsoCodesValidator\Tests\Fixtures\Constraints\NotExists;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

/**
 * Special validator to test ValidatorNotExistsException.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class NotExistsValidatorTest extends ConstraintValidatorTestCase
{
    public function testExceptionIsThrown()
    {
        $constraint = new NotExists();

        $this->expectException(ValidatorNotExistsException::class);
        $this->expectExceptionMessage('The IsoCodes\NotExists class does not exist.'
            .' This class is available since version 42.13.37 of IsoCodes library.'
            .' Please consider upgrading.');

        $this->validator->validate('fake', $constraint);
    }

    protected function createValidator()
    {
        return new IsoCodesGenericValidator();
    }
}
