<?php

namespace SLLH\IsoCodesValidator\Constraints;

class BbanTest extends \PHPUnit_Framework_TestCase
{
    public function testBbanMessages()
    {
        $constraint = new Bban();

        $this->assertEquals($constraint->message, 'This Bban code is not valid.');
    }
}
