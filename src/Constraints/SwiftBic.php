<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class SwiftBic
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class SwiftBic extends Constraint
{
    public $message = 'This value is not a valid SWIFT.';
}
