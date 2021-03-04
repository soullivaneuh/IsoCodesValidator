<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use PHPUnit\Framework\TestCase;
use SLLH\IsoCodesValidator\Constraints\Isbn;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

final class IsbnTest extends TestCase
{
    /**
     * @dataProvider getValidTypes
     */
    public function testValidTypes($type)
    {
        $isbn = new Isbn(['type' => $type]);

        $this->assertSame($type, $isbn->type);
    }

    public function getValidTypes()
    {
        return [
            [10],
            [13],
            [null],
        ];
    }

    /**
     * @dataProvider getInvalidTypes
     */
    public function testInvalidTypes($type)
    {
        $this->expectException(ConstraintDefinitionException::class);
        $isbn = new Isbn(['type' => $type]);
    }

    public function getInvalidTypes()
    {
        return [
            [4],
            [0],
            ['test'],
        ];
    }
}
