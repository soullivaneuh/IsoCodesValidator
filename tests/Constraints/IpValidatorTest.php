<?php

namespace SLLH\IsoCodesValidator\Tests\Constraints;

use IsoCodes\IP;
use IsoCodes\Tests\IPTest;
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
    public function getInvalidValues()
    {
        $values = parent::getInvalidValues();

        // Validator check both Ip v4 and v6. Valid ip with wrong type should not be tested here.
        foreach ($values as $v => $value) {
            if ((6 === $value[1] && IP::validate($value[0])) || (4 === $value[1] && IP::validateIPV6($value[0]))) {
                unset($values[$v]);
            }
        }

        return $values;
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidMessage()
    {
        return 'This value is not a valid IP address.';
    }

    /**
     * {@inheritdoc}
     */
    protected function getIsoCodesTestInstance()
    {
        return new IPTest();
    }
}
