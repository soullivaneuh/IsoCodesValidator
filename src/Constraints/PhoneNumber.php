<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class PhoneNumber extends Constraint
{
    const ALL       = 'all';

    public $country = self::ALL;

    public $message = 'This value is not a valid phone number.';
}
