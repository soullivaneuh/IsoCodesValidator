<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use PHPUnit\Framework\TestCase;
use SLLH\IsoCodesValidator\Constraints\Isbn;

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
     * @expectedException \Symfony\Component\Validator\Exception\ConstraintDefinitionException
     */
    public function testInvalidTypes($type)
    {
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
