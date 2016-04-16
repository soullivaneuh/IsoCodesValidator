<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Isbn;
use SLLH\IsoCodesValidator\Constraints\IsbnValidator;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class IsbnValidatorTest extends AbstractConstraintValidatorTest
{
    /**
     * @dataProvider getValidValues
     *
     * @param mixed    $value
     * @param int|null $type
     */
    public function testValidValues($value, $type = null)
    {
        $this->validator->validate($value, new Isbn($type));
        $this->assertNoViolation();
    }

    /**
     * @dataProvider getInvalidValues
     *
     * @param mixed    $value
     * @param int|null $type
     */
    public function testInvalidValues($value, $type = null)
    {
        $this->validator->validate($value, new Isbn($type));

        $this->buildViolation($this->getInvalidMessage())
            ->assertRaised();
    }

    /**
     * {@inheritdoc}
     */
    protected function createValidator()
    {
        return new IsbnValidator();
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid ISBN.';
    }
}
