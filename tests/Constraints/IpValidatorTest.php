<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use SLLH\IsoCodesValidator\Constraints\IpValidator;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class IpValidatorTest extends AbstractGenericConstraintValidatorTest
{
    /**
     * {@inheritdoc}
     */
    protected function createValidator()
    {
        return new IpValidator();
    }

    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['93.184.220.20'],
            ['161.148.172.130'],
            ['161.148.172.130'],
            ['73.194.66.94'],
            ['60.92.167.193'],
            ['92.168.1.1'],
            ['0.0.0.0'],
            ['55.255.255.255'],
            ['2001:0db8:0000:85a3:0000:0000:ac1f:8001'],
            ['2001:db8:0:85a3:0:0:ac1f:8001'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['000.000.000.000'],
            ['256.255.255.255'],
            ['0db8:0000:85a3:0000:0000:ac1f:8001'],
            ['2001:0db8:0000:85a3:0000:0000:ac1f'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid IP address.';
    }
}
