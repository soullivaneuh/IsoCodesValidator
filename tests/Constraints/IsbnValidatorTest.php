<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\Isbn;
use SLLH\IsoCodesValidator\Constraints\IsbnValidator;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class IsbnValidatorTest extends AbstractConstraintValidatorTest
{
    protected function createValidator()
    {
        return new IsbnValidator();
    }

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
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['8881837188', 10],
            ['2266111566', 10],
            ['2123456802', 10],
            ['888 18 3 7 1-88', 10],
            ['2-7605-1028-X', 10],
            ['978-88-8183-718-2', 13],
            ['978-2-266-11156-0', 13],
            ['978-2-12-345680-3', 13],
            ['978-88-8183-718-2', 13],
            ['978-2-7605-1028-9', 13],
            ['2112345678900', 13],
            ['8881837188'],
            ['2266111566'],
            ['2123456802'],
            ['888 18 3 7 1-88'],
            ['2-7605-1028-X'],
            ['978-88-8183-718-2'],
            ['978-2-266-11156-0'],
            ['978-2-12-345680-3'],
            ['978-88-8183-718-2'],
            ['978-2-7605-1028-9'],
            ['2112345678900'],
        ];
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
    public function getInvalidValues()
    {
        return [
            ['8881837187'],
            ['888183718A'],
            ['stringof10'],
            [888183718],
            [88818371880],
            ['88818371880'],
            ['8881837188A'],
            ['8881837189'],
            ['8881837188', 13],
            ['2266111566', 13],
            ['2123456802', 13],
            ['888 18 3 7 1-88', 13],
            ['2-7605-1328-X', 13],
            ['978-88-8183-718-2', 10],
            ['978-2-266-11156-0', 10],
            ['978-2-12-345680-3', 10],
            ['978-88-8183-718-2', 10],
            ['978-2-7605-1028-9', 10],
            ['2112345678900', 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid ISBN.';
    }
}
